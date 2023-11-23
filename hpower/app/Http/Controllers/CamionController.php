<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Models\Produit;
use App\Models\Camion;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CamionController extends Controller
{
    //

    public function tableaudebord()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'rapporteur') {

                $aujourdHui = Carbon::now();
                $ceMois = Carbon::now()->startOfMonth();

                $semencesAujourdhui = DB::table('semences')
                    ->whereDate('created_at', $aujourdHui->toDateString())
                    ->count();

                $approvisionnementsAujourdhui = DB::table('approvisionnements')
                    ->whereDate('created_at', $aujourdHui->toDateString())
                    ->count();

                $transportsAujourdhui = DB::table('transports')
                    ->whereDate('created_at', $aujourdHui->toDateString())
                    ->count();
                $totaltoday = $semencesAujourdhui + $approvisionnementsAujourdhui + $transportsAujourdhui;

                $semencesCeMois = DB::table('semences')
                    ->whereYear('created_at', $ceMois->year)
                    ->whereMonth('created_at', $ceMois->month)
                    ->count();

                $approvisionnementsCeMois = DB::table('approvisionnements')
                    ->whereYear('created_at', $ceMois->year)
                    ->whereMonth('created_at', $ceMois->month)
                    ->count();

                $transportsCeMois = DB::table('transports')
                    ->whereYear('created_at', $ceMois->year)
                    ->whereMonth('created_at', $ceMois->month)
                    ->count();

                $totalmonth =  $semencesCeMois + $approvisionnementsCeMois + $transportsCeMois;

                return view('Users/tableaudebord', compact('totaltoday', 'totalmonth', 'user'));
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

                $semencesAujourdhui = DB::table('semences')
                    ->whereDate('created_at', $aujourdHui->toDateString())
                    ->count();
                $fournisseursAujourdhui = DB::table('fournisseurs')
                    ->whereDate('created_at', $aujourdHui->toDateString())
                    ->count();
                $approvisionnementsAujourdhui = DB::table('approvisionnements')
                    ->whereDate('created_at', $aujourdHui->toDateString())
                    ->count();

                $transportsAujourdhui = DB::table('transports')
                    ->whereDate('created_at', $aujourdHui->toDateString())
                    ->count();
                $totaltoday = $semencesAujourdhui + $approvisionnementsAujourdhui + $transportsAujourdhui + $fournisseursAujourdhui;

                $semencesCeMois = DB::table('semences')
                    ->whereYear('created_at', $ceMois->year)
                    ->whereMonth('created_at', $ceMois->month)
                    ->count();

                $approvisionnementsCeMois = DB::table('approvisionnements')
                    ->whereYear('created_at', $ceMois->year)
                    ->whereMonth('created_at', $ceMois->month)
                    ->count();
                $fournisseursCeMois = DB::table('fournisseurs')
                    ->whereYear('created_at', $ceMois->year)
                    ->whereMonth('created_at', $ceMois->month)
                    ->count();

                $transportsCeMois = DB::table('transports')
                    ->whereYear('created_at', $ceMois->year)
                    ->whereMonth('created_at', $ceMois->month)
                    ->count();

                $totalmonth =  $semencesCeMois + $approvisionnementsCeMois + $transportsCeMois + $fournisseursCeMois;

                $semences = DB::table('semences')
                    ->count();
                $fournisseurs = DB::table('fournisseurs')
                    ->count();
                $approvisionnements = DB::table('approvisionnements')
                    ->count();

                $transports = DB::table('transports')
                    ->count();
                $appro = $approvisionnements + $fournisseurs;
                return view('Admin/tableaudebord', compact('totaltoday', 'totalmonth', 'transportsCeMois', 'approvisionnementsCeMois', 'semencesCeMois', 'user', 'appro', 'transports', 'approvisionnements', 'semences'));
            } else {
                return redirect()->route('connexion');
            }
        } else {
            return redirect()->route('connexion');
        }
    }


    
    public function statistiqueCamionsT()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'directeur') {

                $aujourdHui = Carbon::now();
                $ceMois = Carbon::now()->startOfMonth();

                $semencesAujourdhui = DB::table('semences')
                ->whereDate('created_at', $aujourdHui->toDateString())
                ->count();
            
            $approvisionnementsAujourdhui = DB::table('approvisionnements')
                ->whereDate('created_at', $aujourdHui->toDateString())
                ->count();
            
            $transportsAujourdhui = DB::table('transports')
                ->whereDate('created_at', $aujourdHui->toDateString())
                ->count();
          $totaltoday= $semencesAujourdhui + $approvisionnementsAujourdhui +$transportsAujourdhui;
         
            $semencesCeMois = DB::table('semences')
                ->whereYear('created_at', $ceMois->year)
                ->whereMonth('created_at', $ceMois->month)
                ->count();
            
            $approvisionnementsCeMois = DB::table('approvisionnements')
                ->whereYear('created_at', $ceMois->year)
                ->whereMonth('created_at', $ceMois->month)
                ->count();
            
            $transportsCeMois = DB::table('transports')
                ->whereYear('created_at', $ceMois->year)
                ->whereMonth('created_at', $ceMois->month)
                ->count();
            
                $totalmonth=  $semencesCeMois + $approvisionnementsCeMois + $transportsCeMois;

                return view('serv_eva/tableaudebordext', compact('totaltoday', 'totalmonth', 'user'));
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

        // Récupérer la liste des fournisseurs qui correspondent aux critères
        $camions = Fournisseur::where('destination', $user->ville)
            ->whereHas('utilisateur', function ($query) {
                $query->where('role', 'fournisseur');
            })
            ->whereNull('numerodebord')
            ->get();

        // Créer une collection pour stocker les noms des fournisseurs
        $noms_fournisseurs = collect();

        // Parcourir la liste des fournisseurs pour récupérer les noms
        foreach ($camions as $camion) {
            $noms_fournisseurs->push($camion->utilisateur->name);
        }

        return view('RapportAppro.fournisave', compact('camions', 'noms_fournisseurs'));
    }
}
