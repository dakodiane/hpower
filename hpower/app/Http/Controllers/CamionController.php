<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Models\Produit;
use App\Models\Camion;
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

                return view('Admin/tableaudebord', compact('totaltoday', 'totalmonth', 'user'));
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

        $camions = Approvisionnement::where('destination', $user->ville)
            ->whereHas('utilisateur', function ($query) {
                $query->where('role', 'fournisseur');
            })
            ->whereNull('numerodebord')
            ->get();

        return view('Users/listecamionsave', compact('camions'));
    }
}
