<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\Semence;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;

class semencesController extends Controller
{
    public function index()
    {
        $paiements = paiement::orderBy('created_at', 'desc')->paginate(10);
        $semences = Semence::orderBy('created_at', 'desc');

        $mntRevient = paiement::WhereNotNULL('semence_id')->get();
        $depense = $mntRevient->sum('montant_tp');

        $qteVente = Semence::whereNotNULL('sem_qtevendue')->get();
        $qteVendue = $qteVente->sum('sem_qtevendue');

        $qteAchat = Semence::WhereNotNULL('sem_qtereçu')->get();
        $qteAchetee = $qteAchat->sum('sem_qtereçu');

        $mntVente = paiement::WhereNotNULL('semence_id')->get();
        $Vente = $mntVente->sum('montant_HPG');

        return view("services_semence.dashboard", compact('qteVendue', 'depense', 'qteAchetee', 'Vente', 'semences', 'paiements'));
    }

   

    public function reception()
    {
        return view("services_semence.reception");
    }

    public function show()
    {
        $user = Auth::user();

        // Récupérer les semences sans paiements associés
        $semences = Semence::doesntHave('paiements')->get();

        return view('services_semence.consultation', compact('semences', 'user'));
    }

    public function vente($semence_id)
    {
        $user = Auth::user();
        $semence = Semence::find($semence_id);
        $paiement = $semence->paiements->paie_prixlivraison; // Récupérer le premier paiement associé à la semence
      
        return view('services_semence.vente', compact('semence', 'user', 'paiement'));
    }

    public function ventefin(Request $request, $semence_id)
    {
        $user = Auth::user();
        // Récupérer le transport
        $semences = Semence::findOrFail($semence_id);
        if ($semences->paiements()->exists()) {
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
    

    
    public function paie(Request $request)
{
    $user = Auth::user();
    $data = $request->validate([
        'semence' => 'required',
        'ql' => 'required|numeric',
        'fournisseur' => 'required|string',
        'nature' => 'required',
        'magasin' => 'required|string',
        'lieu' => 'required|string',
        'pl' => 'required|numeric',
        'pu' => 'numeric',
        'transact' => 'numeric',
        'bord' => 'numeric',
        'moyen' => 'string',
        'matricul' => 'image',
        'date_paie' => 'string',
    ]);

    $semence = new Semence();
    $paiement = new Paiement();

    $semence->sem_numtrans = $request->transact;
    $semence->sem_fourni = $request->fournisseur;
    $semence->sem_type = $request->nature;
    $semence->sem_prixunit = $request->pu;
    $semence->sem_qtereçu = $request->ql;
    $semence->sem_magdecht = $request->magasin;
    $semence->sem_nature = $request->semence;
    $semence->sem_deplace = $request->moyen;
    $semence->sem_prove = $request->lieu;
    $semence->sem_qtevendue = $request->qv;
    $semence->sem_prixunitHPG = $request->puhpg;
    $semence->sem_lieusemi = $request->lieusemi;

    $lastSemence = Semence::orderBy('semence_id', 'desc')->first();
    $newNumBordereau = $this->generateNewNumBordereau($lastSemence);
    $data['sem_bord'] = $newNumBordereau;
    $data['sem_client'] = $newNumBordereau;
    $data['sem_numtrans'] = $newNumBordereau;

    $matricul = $request->file('matricul');
    $matriculName = time() . '.' . $matricul->extension();
    $matricul->move(public_path('photo_immat'), $matriculName);

    $semence->fill($data);
    $semence->sem_nummatricul = $matriculName;
    $semence->util_id = $user->id;
    $paiement->util_id = $user->id; 

    $prixlivraison = $semence->sem_prixunit * $semence->sem_qtereçu;
    $paiement->paie_prixlivraison = $prixlivraison;

    $res = $semence->save();

    if ($res) {
        // Associer le paiement à la semence
        $semence->paiements()->save($paiement);

        return redirect()->route('dashboard');
    } else {
        return back()->with('fail', 'Erreur');
    }
}

private function generateNewNumBordereau($lastSemence)
{
    if ($lastSemence) {
        $lastNumBordereau = $lastSemence->num_bordereau;
        $lastNumBordereau = substr($lastNumBordereau, 2);
        return 'HP' . str_pad((intval($lastNumBordereau) + 1), 4, '0', STR_PAD_LEFT);
    } else {
        return 'HP0001';
    }
}

}
