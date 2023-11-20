<?php

namespace App\Http\Controllers;
use App\Models\Camion;
namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Transport;
use App\Models\paiement;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Response;

use Barryvdh\DomPDF\Facade\Pdf;

class ServicetransController extends Controller
{

    
    public function show()
    {
        $user = Auth::user();
    
        // Récupérer les transports sans paiements associés
        $transports = Transport::doesntHave('paiements')->get();
    
        return view('servicetrans/servconsultation', compact('transports', 'user'));
    }
    

    

public function statistiquesCamions()
{
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role == 'servicetransport') {

            $aujourdHui = Carbon::now();
            $ceMois = Carbon::now()->startOfMonth();

            $transportsAujourdhui = DB::table('transports')
                ->whereDate('created_at', $aujourdHui->toDateString())
                ->count();

            $transportsCeMois = DB::table('transports')
                ->whereYear('created_at', $ceMois->year)
                ->whereMonth('created_at', $ceMois->month)
                ->count();

            // Récupérer les statistiques par provenance
            $sumPoidsParProvenance = DB::table('transports')
                ->select('provenance', DB::raw('SUM(poids_net) as poids_total'))
                ->groupBy('provenance')
                ->get();

            return view('servicetrans/tableaudebord', compact('transportsAujourdhui', 'transportsCeMois', 'sumPoidsParProvenance', 'user'));
        } else {
            return redirect()->route('connexion');
        }
    } else {
        return redirect()->route('connexion');
    }
}

        
    public function paiement($transport_id)
    {
        $user = Auth::user();
        $transports = Transport::find($transport_id);

        return view('servicetrans/servpaiement', compact('transports','user'));
    }
    /*public function paiement(Request $request, $transport_id)
    {
        $user = Auth::user();
    
        // Récupérer les données du formulaire
        $data = $request->all();
    
        // Récupérer le transport
        $transports = Transport::findOrFail($transport_id);
    
        // Récupérer les paiements associés au transport
        $paiements = $transports->paiements;
    
        // Enregistrer les données du formulaire dans la base de données
        $paiement = new Paiement();
        $paiement->fill($data);
        $paiement->util_id = $user->id; // Ajouter l'utilisateur au paiement si nécessaire
        $transports->paiements()->save($paiement);
    
        // Retourner la vue avec les paiements
        return view('servicetrans/servpaiement', compact('transports', 'paiements'));
    }
*/
  

    public function storepaie(Request $request, $transport_id)
{
    $user = Auth::user();
    // Récupérer le transport
    $transports = Transport::findOrFail($transport_id);
    if ($transports->paiements()->exists()) {
        // Gérer l'erreur ici, par exemple, en redirigeant avec un message d'erreur
        return redirect()->back()->withErrors(['error' => 'Un paiement existe déjà pour ce transport.']);
    }

    // Récupérer les données du formulaire
    $data = $request->all();

    // Calculs pour le modèle Paiement
    $poidsNet = $transports->poids_net; // Assurez-vous que le champ existe dans le modèle Transport

    $prix_tp = $request->input('prix_tp');
    $prix_HPG = $request->input('prix_HPG');
    $rest_paie = $request->input('rest_paie');



    $montant_tp = $poidsNet * $prix_tp;
    $montant_HPG = $poidsNet * $prix_HPG;
    $recette_HPG = $montant_tp - $montant_HPG;
    $solde = $montant_HPG - $transports->avancepaye; // Assurez-vous que le champ existe dans le modèle Transport
    $paietotal= $solde - $rest_paie;
    
    $paiement = new Paiement();
    $paiement->fill($data);
    $paiement->montant_tp = $montant_tp;
    $paiement->montant_HPG = $montant_HPG;
    $paiement->recette_HPG = $recette_HPG;
    $paiement->solde = $solde;
    $paiement->rest_paie = $rest_paie;
    $paiement->paietotal = $paietotal;
    
    // Vérifier le statut du paiement
    $paiement->statut_paie = ($paietotal == 0) ? 'effectué' : 'en attente';
    $paiement->util_id = $user->id;
    // Enregistrer le paiement en le liant au transport
    $transports->paiements()->save($paiement);

    // Rediriger vers la page appropriée

    return redirect()->intended(route('Servicetrans.viewfin', ['transport_id' => $transports->id]))
    ->with(['transports' => $transports, 'paiements' => $paiement, 'success' => 'Paiement enregistré avec succès.']);

}



public function viewfin()
{
    try {
        $user = Auth::user();

        // Récupérer les transports avec paiements associés ayant recette_HPG non égal à zéro
        $transports = Transport::with(['paiements' => function ($query) {
            $query->where('recette_HPG', '!=', 0);
        }])
        ->whereHas('paiements', function ($query) {
            $query->where('recette_HPG', '!=', 0);
        })
        ->get();

        // Calculer la somme des poids_net par provenance
        $sumPoidsParProvenance = Transport::select('provenance', DB::raw('SUM(poids_net) as poids_total'))
            ->groupBy('provenance')
            ->get();

        return view('servicetrans.servconsultationfin', [
            'transports' => $transports,
            'user' => $user,
            'sumPoidsParProvenance' => $sumPoidsParProvenance,
        ]);
    } catch (\Exception $e) {
        // Gérer l'erreur, par exemple, en enregistrant le message d'erreur ou en renvoyant une réponse appropriée
        return back()->withError('Une erreur s\'est produite lors de la récupération des données.');
    }
        }


        public function GeneratePDF()
        {
            // Configuration de DomPDF
            PDF::setOptions([
                "defaultFont" => "Courier",
                "defaultPaperSize" => "a4",
                "orientation" => "landscape", // Portrait plutôt que paysage
                "dpi" => 130
            ]);

                // Récupération des données
            $user = Auth::user();
            $transports = Transport::all();

            // Rendre la vue actuelle en tant que HTML
            $html = View::make('templates.servicetrans')->render();

            // Génération du PDF
            $pdf = PDF::loadHTML($html);

            // Téléchargement du PDF
            return $pdf->download('transports.pdf');
        }






} 

