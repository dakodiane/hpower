<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Camion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CamionController extends Controller
{
    //
    public function create()
    {
        $produits = Produit::where('active', '1')->get();
        return view('Users/enregistrercamion', ['produits' => $produits]);
    }


    public function store(Request $request)
    {

        $data = $request->all();
        $user = Auth::user();
        $lastCamion = Camion::orderBy('cam_id', 'desc')->first();
        if ($lastCamion) {
            $lastNumBordereau = $lastCamion->num_bordereau;
            $lastNumBordereau = substr($lastNumBordereau, 2);
            $newNumBordereau = 'HP' . str_pad(($lastNumBordereau + 1), 4, '0', STR_PAD_LEFT);
        } else {
            $newNumBordereau = 'HP0001';
        }
        if ($request->hasFile('cam_photo')) {
            $photoPath = $request->file('cam_photo')->store('photo_immat', 'public');
            $data['cam_photo'] = $photoPath;
        }
        $data['num_bordereau'] = $newNumBordereau;

        //    $poidsCharge = $request->input('poids_charge');
        //    $poidsVide = $request->input('poids_vide');
        //   $poidsNet = $poidsCharge - $poidsVide;

        //   $data['poids_net'] = $poidsNet;
        $data['provenance'] = $user->ville;
        $data['util_id'] = $user->id;
        $camion = new Camion();

        $camion->fill($data);

        $camion->save();
        //dd($camion);
        return redirect()->route('camion.create')->with('success', 'Camion enregistré avec succès.');
    }

    public function view()
    {
        $user = Auth::user();
        $camions = Camion::where('util_id', $user->id)
            ->whereNull('numerodebord')
            ->get();
        return view('Users/listecamionsave', compact('camions'));
    }



    public function viewfin(Request $request)
    {
        $user = Auth::user();
        $camions = Camion::where('util_id', $user->id)
            ->whereNotNull('numerodebord')
            ->get();

        return view('Users/listecamionfin', compact('camions', 'user'));
    }



    public function savefin($cam_id)
    {
        $camions = Camion::find($cam_id);

        return view('Users/enregistrerfin', compact('camions'));
    }


    public function storefin(Request $request, $cam_id)
    {
        $user = Auth::user();
        $camions = Camion::findOrfail($cam_id);

        $data = $request->all();

        if ($request->hasFile('cam_photo1')) {
            $photoPath = $request->file('cam_photo1')->store('photo_immat', 'public');
            $data['cam_photo1'] = $photoPath;
        }
        $camions->fill($data);
        $camions->save();
        return redirect()->intended(route('camion.viewfin',  compact('camions')));
    }


    public function tableaudebord()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'rapporteur') {

                $aujourdHui = Carbon::now();
                $ceMois = Carbon::now()->startOfMonth();

                $camionsAujourdhui = DB::table('camions')
                    ->whereDate('created_at', $aujourdHui->toDateString())
                    ->count();

                $camionsCeMois = DB::table('camions')
                    ->whereYear('created_at', $ceMois->year)
                    ->whereMonth('created_at', $ceMois->month)
                    ->count();

                return view('Users/tableaudebord', compact('camionsAujourdhui', 'camionsCeMois', 'user'));
            } else {
                return redirect()->route('connexion');
            }
        } else {
            return redirect()->route('connexion');
        }
    }



    public function statistiqueCamions()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'directeur') {

                $aujourdHui = Carbon::now();
                $ceMois = Carbon::now()->startOfMonth();

                $camionsAujourdhui = DB::table('camions')
                    ->whereDate('created_at', $aujourdHui->toDateString())
                    ->count();

                $camionsCeMois = DB::table('camions')
                    ->whereYear('created_at', $ceMois->year)
                    ->whereMonth('created_at', $ceMois->month)
                    ->count();

                return view('Admin/tableaudebord', compact('camionsAujourdhui', 'camionsCeMois', 'user'));
            } else {
                return redirect()->route('connexion');
            }
        } else {
            return redirect()->route('connexion');
        }
    }

    public function fournisave()
    {
        $user = Auth::user();

        $camions = Camion::where('destination', $user->ville)
            ->whereHas('utilisateur', function ($query) {
                $query->where('role', 'fournisseur');
            })
            ->whereNull('numerodebord')
            ->get();

        return view('Users/listecamionsave', compact('camions'));
    }
}
