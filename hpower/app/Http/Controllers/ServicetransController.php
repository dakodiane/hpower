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
use Illuminate\Support\Facades\Auth;
class ServicetransController extends Controller
{
    public function show()
    {
        $user = Auth::user();
    
        // Récupérer tous les camions avec Recette_HPG vide
        $camions = Camion::whereDoesntHave('paiements', function ($query) {
            $query->whereNull('Recette_HPG');
        })->get();
    
        return view('servicetrans/servconsultation', compact('camions', 'user'));
    }
    

    
    public function statistiquesCamions()
    {
        $user = Auth::user();

        $aujourdHui = Carbon::now();
        $ceMois = Carbon::now()->startOfMonth();
    
        $camionsAujourdhui = DB::table('camions')
            ->whereDate('created_at', $aujourdHui->toDateString())
            ->count();
    
        $camionsCeMois = DB::table('camions')
            ->whereYear('created_at', $ceMois->year)
            ->whereMonth('created_at', $ceMois->month)
            ->count();
    
        return view('servicetrans/tableaudebord', compact('camionsAujourdhui', 'camionsCeMois','user'));
    }

    
    public function paiement(Request $request, $cam_id)
{
    $user = Auth::user();

    // Récupérer les données du formulaire
    $data = $request->all();

    // Récupérer le camion
    $camions = Camion::findOrFail($cam_id);

    // Récupérer les paiements associés au camion
    $paiements = $camions->paiements;

    // Enregistrer les données du formulaire dans la base de données
    $paiement = new Paiement();
    $paiement->fill($data);
    $paiement->util_id = $user->id; // Ajouter l'utilisateur au paiement si nécessaire
    $camions->paiements()->save($paiement);

    // Retourner la vue avec les paiements
    return view('servicetrans/servpaiement', compact('camions','paiements'));

}

    
    
  
            public function viewfin(Request $request)
        {
            $user = Auth::user();
              
            $camions = Camion::all();
          
    
        return view('servicetrans/servconsultationfin', compact('camions'));
        }


        public function storepaie(Request $request, $cam_id)
{
    // Récupérer le camion
    $camion = Camion::findOrFail($cam_id);

    // Récupérer les données du formulaire
    $data = $request->all();

    // Calculs pour le modèle Paiement
    $poidsCharge = $request->input('poids_charge');
    $poidsVide = $request->input('poids_vide');
    $poidsNet = $poidsCharge - $poidsVide;
   

   
    // Créer un nouveau paiement associé au camion
    $paiement = new Paiement();
    $paiement->fill($data);

    // Enregistrer le paiement en le liant au camion
    $camion->paiements()->save($paiement);

    // Rediriger vers la page appropriée
    return redirect()->route('servicetrans.servconsultationfin', ['cam_id' => $camion->id])
        ->with('success', 'Paiement enregistré avec succès.');
}

        
}
