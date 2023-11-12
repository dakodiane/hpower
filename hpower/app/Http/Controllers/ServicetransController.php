<?php

namespace App\Http\Controllers;
use App\Models\Camion;
namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Camion;
use App\Models\paiement;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServicetransController extends Controller
{
    public function show()
    {
        $camions = Camion::all();
       
        return view('servicetrans/servconsultation', compact('camions'));
        
    }

    
    public function statistiquesCamions()
    {
        $aujourdHui = Carbon::now();
        $ceMois = Carbon::now()->startOfMonth();
    
        $camionsAujourdhui = DB::table('camions')
            ->whereDate('created_at', $aujourdHui->toDateString())
            ->count();
    
        $camionsCeMois = DB::table('camions')
            ->whereYear('created_at', $ceMois->year)
            ->whereMonth('created_at', $ceMois->month)
            ->count();
    
        return view('servicetrans/tableaudebord', compact('camionsAujourdhui', 'camionsCeMois'));
    }

    
    public function paiement($cam_id)
    {
        $camions = Camion::find($cam_id);
        $paiements = $camions->paiements;
        
        return view('servicetrans/servpaiement', compact('camions', 'paiements'));
    }
    
    
    public function paiefin($cam_id)
    {
        $paiements = paiement::find($cam_id);
    
        return view('servicetrans/servconsultationfin', compact('paiement'));
    }

            public function viewfin(Request $request)
        {
            $paiements = paiement::all();
            return view('servicetrans/servconsultationfin', compact('paiements'));
        }


        public function storepaie(Request $request, $cam_id)
        {
            
           
            $camions = Camion::findOrfail($cam_id);

            $data = $request->all();
                
        
        
            // Créez un nouveau paiement associé au camion
            $paiement = new Paiement();
            $paiement->fill($data);
        
            // Enregistrez le paiement en le liant au camion
            $camions->paiements()->save($paiement);
        
            // Redirigez vers la page appropriée
            return redirect()->route('servicetrans.servconsultationfin', ['cam_id' => $camions->id])
                ->with('success', 'Paiement enregistré avec succès.');
        }
        
        
}
