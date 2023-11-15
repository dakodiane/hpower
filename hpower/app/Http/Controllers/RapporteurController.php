<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Camion;
use App\Models\Semence;
use App\Models\Fournisseur;
use App\Models\Transport;
use App\Models\Approvisionnement;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapporteurController extends Controller
{
    //
    public function create()
    {
        $produits = Produit::where('active', '1')->get();
        return view('Users/enregistrercamion', ['produits' => $produits]);
    }

    public function createappro()
    {
        $produits = Produit::where('active', '1')->get();
        return view('RapportAppro/enregistrercamion', ['produits' => $produits]);
    }
    public function createtransport()
    {
        $produits = Produit::where('active', '1')->get();
        return view('RapportTransport/enregistrercamion', ['produits' => $produits]);
    }
    public function createsemence()
    {
        $produits = Produit::where('active', '1')->get();
        return view('RapportSemence/enregistrercamion', ['produits' => $produits]);
    }
    public function createhpg()
    {
        $produits = Produit::where('active', '1')->get();
        return view('Hpg/enregistrerhpg', ['produits' => $produits]);
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
    public function storeappro(Request $request)
    {

        $data = $request->all();
        $user = Auth::user();
        $lastCamion = Approvisionnement::orderBy('appro_id', 'desc')->first();
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
        if ($request->hasFile('cam_photo1')) {
            $photoPath = $request->file('cam_photo1')->store('photo_immat', 'public');
            $data['cam_photo1'] = $photoPath;
        }
        $data['num_bordereau'] = $newNumBordereau;

        //    $poidsCharge = $request->input('poids_charge');
        //    $poidsVide = $request->input('poids_vide');
        //   $poidsNet = $poidsCharge - $poidsVide;

        //   $data['poids_net'] = $poidsNet;
        $data['provenance'] = $user->ville;
        $data['util_id'] = $user->id;
        $camion = new Approvisionnement();

        $camion->fill($data);

        $camion->save();

        session()->flash('success', 'L\'enregistrement a été effectué avec succès!');

        return redirect()->route('create.appro')->with('success', 'Camion enregistré avec succès.');
    }

    public function storetransport(Request $request)
    {

        $data = $request->all();
        $user = Auth::user();
        $lastCamion = Transport::orderBy('transport_id', 'desc')->first();
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
        if ($request->hasFile('cam_photo1')) {
            $photoPath = $request->file('cam_photo1')->store('photo_immat', 'public');
            $data['cam_photo1'] = $photoPath;
        }
        $data['num_bordereau'] = $newNumBordereau;

        //    $poidsCharge = $request->input('poids_charge');
        //    $poidsVide = $request->input('poids_vide');
        //   $poidsNet = $poidsCharge - $poidsVide;

        //   $data['poids_net'] = $poidsNet;
        $data['provenance'] = $user->ville;
        $data['util_id'] = $user->id;
        $camion = new Transport();

        $camion->fill($data);

        $camion->save();
        session()->flash('success', 'L\'enregistrement a été effectué avec succès!');
        return redirect()->route('create.transport')->with('success', 'Camion enregistré avec succès.');
    }
    public function storesemence(Request $request)
    {

        $data = $request->all();
        $user = Auth::user();
        $lastCamion = Semence::orderBy('semence_id', 'desc')->first();
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
        if ($request->hasFile('cam_photo1')) {
            $photoPath = $request->file('cam_photo1')->store('photo_immat', 'public');
            $data['cam_photo1'] = $photoPath;
        }
        $data['num_bordereau'] = $newNumBordereau;

        //    $poidsCharge = $request->input('poids_charge');
        //    $poidsVide = $request->input('poids_vide');
        //   $poidsNet = $poidsCharge - $poidsVide;

        //   $data['poids_net'] = $poidsNet;
        $data['provenance'] = $user->ville;
        $data['util_id'] = $user->id;
        $camion = new Semence();

        $camion->fill($data);

        $camion->save();
        session()->flash('success', 'L\'enregistrement a été effectué avec succès!');
        return redirect()->route('create.semence')->with('success', 'Camion enregistré avec succès.');
    }
    public function view()
    {
        $user = Auth::user();
        $camions = Camion::where('util_id', $user->id)
            ->whereNull('numerodebord')
            ->get();
        return view('Users/listecamionsave', compact('camions'));
    }
    public function viewappro()
    {
        $user = Auth::user();
        $camions = Approvisionnement::where('destination',$user->ville)
            ->whereNull('numerodebord')
            ->get();
        return view('RapportAppro/listeapprosave', compact('camions'));
    }

    public function viewtransport()
    {
        $user = Auth::user();
        $camions = Transport::where('destination',$user->ville)
            ->whereNull('numerodebord')
            ->get();
        return view('RapportTransport/listetransportsave', compact('camions'));
    }

    public function viewsemence()
    {
        $user = Auth::user();
        $camions = Semence::where('destination',$user->ville)
            ->whereNull('numerodebord')
            ->get();
        return view('RapportSemence/listesemencesave', compact('camions'));
    }



    public function viewfin(Request $request)
    {
        $user = Auth::user();
        $camions = Camion::where('util_id', $user->id)
            ->whereNotNull('numerodebord')
            ->get();

        return view('Users/listecamionfin', compact('camions', 'user'));
    }

    public function viewfinappro(Request $request)
    {
        $user = Auth::user();
        $camions = Approvisionnement::where('destination', $user->ville)
            ->whereNotNull('numerodebord')
            ->get();

        return view('RapportAppro/listeapprofin', compact('camions', 'user'));
    }

    public function viewfintransport(Request $request)
    {
        $user = Auth::user();
        $camions = Transport::where('destination', $user->ville)
            ->whereNotNull('numerodebord')
            ->get();

        return view('RapportTransport/listetransportfin', compact('camions', 'user'));
    }

    public function viewfinsemence(Request $request)
    {
        $user = Auth::user();
        $camions = Semence::where('destination', $user->ville)      
              ->whereNotNull('numerodebord')
            ->get();

        return view('RapportSemence/listesemencefin', compact('camions', 'user'));
    }



    public function savefin($cam_id)
    {
        $camions = Camion::find($cam_id);

        return view('Users/enregistrerfin', compact('camions'));
    }

    public function savefinappro($approvisionnement_id)
    {
        $camions = Approvisionnement::find($approvisionnement_id);

        return view('RapportAppro/enregistrerfin', compact('camions'));
    }
    public function savefintransport($transport_id)
    {
        $camions = Transport::find($transport_id);

        return view('RapportTransport/enregistrerfin', compact('camions'));
    }
    public function savefinsemence($semence_id)
    {
        $camions = Semence::find($semence_id);

        return view('RapportSemence/enregistrerfin', compact('camions'));
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
    public function storefinappro(Request $request, $approvisionnement_id)
    {
        $user = Auth::user();
        $camions = Approvisionnement::findOrfail($approvisionnement_id);

        $data = $request->all();

        if ($request->hasFile('cam_photo2')) {
            $photoPath = $request->file('cam_photo2')->store('photo_immat', 'public');
            $data['cam_photo2'] = $photoPath;
        }
          $poidsCharge = $request->input('poids_charge');
       $poidsVide = $request->input('poids_vide');
      $poidsNet = $poidsCharge - $poidsVide;

      $data['poids_net'] = $poidsNet;
        $camions->fill($data);
        $camions->save();
        return redirect()->intended(route('appro.viewfin',  compact('camions')));
    }
    public function storefintransport(Request $request, $transport_id)
    {
        $user = Auth::user();
        $camions = Transport::findOrfail($transport_id);

        $data = $request->all();

        if ($request->hasFile('cam_photo2')) {
            $photoPath = $request->file('cam_photo2')->store('photo_immat', 'public');
            $data['cam_photo2'] = $photoPath;
        }
            $poidsCharge = $request->input('poids_charge');
         $poidsVide = $request->input('poids_vide');
        $poidsNet = $poidsCharge - $poidsVide;

        $data['poids_net'] = $poidsNet;
        $camions->fill($data);
        $camions->save();
        return redirect()->intended(route('transport.viewfin',  compact('camions')));
    }
    public function storefinsemence(Request $request, $semence_id)
    {
        $user = Auth::user();
        $camions = Semence::findOrfail($semence_id);

        $data = $request->all();

        if ($request->hasFile('cam_photo2')) {
            $photoPath = $request->file('cam_photo2')->store('photo_immat', 'public');
            $data['cam_photo2'] = $photoPath;
        }
           $poidsCharge = $request->input('poids_charge');
        $poidsVide = $request->input('poids_vide');
       $poidsNet = $poidsCharge - $poidsVide;

       $data['poids_net'] = $poidsNet;
        $camions->fill($data);
        $camions->save();
        return redirect()->intended(route('semence.viewfin',  compact('camions')));
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
