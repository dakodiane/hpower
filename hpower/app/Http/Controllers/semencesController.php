<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\Semence;
use App\Models\User;
use Illuminate\Http\Request;
<<<<<<< HEAD
use PDF;
use Illuminate\Support\Facades\Auth;
=======
use Illuminate\Support\Facades\Auth;
use  PDF;
use Maatwebsite\Excel\Facades\Excel;


>>>>>>> c4a4b9bf3f5a8057824b9efea00f9419dc145ffa

class semencesController extends Controller
{
    public function index()
    {
        $paiements = paiement::orderBy('created_at', 'desc')->paginate(10);
        $semences = Semence::orderBy('created_at', 'desc');

<<<<<<< HEAD
        $mntRevient = paiement::WhereNotNULL('semence_id')->get();
        $depense = $mntRevient->sum('montant_tp');
=======
            $user = Auth::user(); 
       
          $paiements = paiement::orderBy('created_at','desc');
          $semences = Semence::orderBy('created_at','desc')->paginate(10);
          
          $mntRevient = paiement::WhereNotNULL('semence_id')->get();
          $depense = $mntRevient->sum('montant_tp');
>>>>>>> c4a4b9bf3f5a8057824b9efea00f9419dc145ffa

        $qteVente = Semence::whereNotNULL('sem_qtevendue')->get();
        $qteVendue = $qteVente->sum('sem_qtevendue');

        $qteAchat = Semence::WhereNotNULL('sem_qtereçu')->get();
        $qteAchetee = $qteAchat->sum('sem_qtereçu');

        $mntVente = paiement::WhereNotNULL('semence_id')->get();
        $Vente = $mntVente->sum('montant_HPG');

<<<<<<< HEAD
        return view("services_semence.dashboard", compact('qteVendue', 'depense', 'qteAchetee', 'Vente', 'semences', 'paiements'));
    }

   

    public function reception()
    {
        return view("services_semence.reception");
    }
=======
          return view ("services_semence.dashboard", compact('qteVendue', 'depense', 'qteAchetee', 'Vente', 'semences', 'paiements','user'));
    }

    public function indexext()
    {

            $user = Auth::user(); 
       
          $paiements = paiement::orderBy('created_at','desc');
          $semences = Semence::orderBy('created_at','desc')->paginate(10);
          
          $mntRevient = paiement::WhereNotNULL('semence_id')->get();
          $depense = $mntRevient->sum('montant_tp');

          $qteVente = Semence::whereNotNULL('sem_qtevendue')->get();
          $qteVendue = $qteVente->sum('sem_qtevendue');

          $qteAchat = Semence::WhereNotNULL('sem_qtereçu')->get();
          $qteAchetee = $qteAchat->sum('sem_qtereçu');

          $mntVente = paiement::WhereNotNULL('semence_id')->get();
          $Vente = $mntVente->sum('montant_HPG');

          return view ("appro/approsem", compact('qteVendue', 'depense', 'qteAchetee', 'Vente', 'semences', 'paiements','user'));
    }

    // Pour la réception     

   public function reception()
   {
        $user = Auth::user();  
        return view("services_semence.reception", compact('user'));
   }

   
   public function analyse (Request $request){
     $user = Auth::user();
     $data = $request->validate([
          'semence'=>'required',
          'ql'=> 'required|decimal:0,2',
          'fournisseur'=>'String|required',
          'nature'=>'required',
          'magasin'=>'String|required',
          'lieu'=>'String|required',
          'pl'=>'Numeric|required',
          'pu'=>'Numeric',     
          'transact'=>'Numeric', 
          'bord'=>'Numeric',
          'moyen'=>'String',
          'matricul'=>'Image',
          // 'qv'=>'required|decimal: 0,2',
          // 'puhpg'=>'numeric',
          // 'montant'=>'numeric',
          // 'client'=>'String',
          // 'lieusemi'=>'String'
          
     ]);

     $montant_tp = $request->input('pu') * $request->input('ql');
     
>>>>>>> c4a4b9bf3f5a8057824b9efea00f9419dc145ffa

    public function show()
    {
        $user = Auth::user();

<<<<<<< HEAD
        // Récupérer les semences sans paiements associés
        $semences = Semence::doesntHave('paiements')->get();

        return view('services_semence.consultation', compact('semences', 'user'));
    }
=======
     $newSemence->sem_numtrans=$request->transact;
     $newSemence->sem_nummatricul=$request->matricul;
     $newSemence->sem_fourni=$request->fournisseur;
     $newSemence->sem_type=$request->nature;
     $paiement->montant_tp=$montant_tp;
     $newSemence->sem_prixunit=$request->pu;
     $newSemence->sem_qtereçu=$request->ql;
     $newSemence->sem_magdecht=$request->magasin;
     $newSemence->sem_nature=$request->semence;
     $newSemence->sem_deplace=$request->moyen;
     $newSemence->sem_bord=$request->bord;
     $newSemence->sem_prove=$request->lieu;
     // $newSemence->sem_
     
     $paiement->util_id = $user->id;
     $paiement->save();
     $res = $newSemence->save();
      if($res){
        return redirect()->route('dashboard', compact('montant_tp', 'user'));
      }else{
           return back()->with('fail','Erreur');
     }
>>>>>>> c4a4b9bf3f5a8057824b9efea00f9419dc145ffa

    public function vente($semence_id)
    {
        $user = Auth::user();
        $semence = Semence::find($semence_id);
        $paiement = $semence->paiements->paie_prixlivraison; // Récupérer le premier paiement associé à la semence
      
        return view('services_semence.vente', compact('semence', 'user', 'paiement'));
    }

<<<<<<< HEAD
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
=======
   // POur la vente


   public function vente()
   {
        $user = Auth::user();
        return view("services_semence.vente", compact('user'));
   }

    public function traitement(Request $request){
      $user = Auth::user();
      
      $newSemence = new Semence();
      $paiement = new paiement();


      $data = $request->validate([
          'qv'=>'required|decimal: 0,2',
          'puhpg'=>'numeric',
          'montant'=>'numeric',
          'client'=>'String',
          'lieusemi'=>'String',
          'pl'=>'Numeric'
          
     ]);

     $newSemence->sem_qtevendue=$request->qv;
     $newSemence->sem_prixunitHPG=$request->puhpg;
     $paiement->montant_HPG=$request->montant;
     $newSemence->sem_client=$request->client;
     $newSemence->sem_lieusemi=$request->lieusemi;


      $montant_HPG = $request->input('puhpg') * $request->input('qv');
      $recette = $request->input('pl') - $montant_HPG;
      $paiement->util_id = $user->id;
      $paiement->solde = $recette;
        $paiement->save();

        $res = $newSemence->save();
      if($res){
        return redirect()->route('dashboard', compact('montant_HPG', 'user'));
      }else{
           return back()->with('fail','Erreur');
     }
      

   }  

   // public function exportExcel()
   // {
   //     try {
           
   //      $semences = Semence::all();

   //         return Excel::download(new semencesExport($semences), 'semences.xlsx');
   //     } catch (\Exception $e) {
   //         // Gérer l'erreur, par exemple, en enregistrant le message d'erreur ou en renvoyant une réponse appropriée
   //         return back()->withError('Une erreur s\'est produite lors de la récupération des données pour l\'export Excel.');
   //     }
   // }

    public function storepaie(Request $request, $semence_id)
{
    $user = Auth::user();
    // Récupérer les données de la table semences
    $semences = Semence::findOrFail($semence_id);
    if ($semences->paiements()->exists()) {
        // Gérer l'erreur ici, par exemple, en redirigeant avec un message d'erreur
        return redirect()->back()->withErrors(['error' => 'Un paiement existe déjà pour cette semence.']);
    }

    // Récupérer les données du formulaire de vente
    $data = $request->all();

    // Calculs pour le modèle Paiement
    //$recette_HPG = $montant_HPG-$montant_tp;
    // Formules de calculs à,partir des variables du formulaire

    $semence = $semences->sem_nature;
    
    $recette = $request->input('recette');
    $montantHPG = $request->input('montant');
    $qv = $request->input('qv');
    $puhpg = $request->input('puhpg');



    $montantHPG = $puhpg * $qv;
    $recette = $montant_HPG - $paiements->montant_tp;
    
    $paiement = new Paiement();
    $paiement->fill($data);
    $paiement->montant_HPG = $montant_HPG;
    $paiement->recette_HPG = $recette_HPG;
    
    // Vérifier le statut du paiement
    $paiement->statut_paie = ($recette_HPG <= 0) ? 'effectué' : 'en attente';
    $paiement->util_id = $user->id;
    // Enregistrer le paiement en le liant au transport
    $semences->paiements()->save($paiement);

    // Rediriger vers la page appropriée

    return redirect()->intended(route('semencesController.viewfin', ['semence_id' => $semences->id]))
    ->with(['semences' => $semences, 'paiements' => $paiement, 'success' => 'Paiement enregistré avec succès.']);

}

    public function viewfin()
    {
        try {
            $user = Auth::user();

            // Récupérer les semences avec paiements associés ayant recette_HPG non égal à zéro
            $semences = Semences::with(['paiements' => function ($query) {
                $query->where('recette_HPG', '!=', 0);
            }])
            ->whereHas('paiements', function ($query) {
                $query->where('recette_HPG', '!=', 0);
            })
            ->get();

            return view('services_semence.consultation', [
                'transports' => $transports,
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            // Gérer l'erreur, par exemple, en enregistrant le message d'erreur ou en renvoyant une réponse appropriée
            return back()->withError('Une erreur s\'est produite lors de la récupération des données.');
        }
            }
 
>>>>>>> c4a4b9bf3f5a8057824b9efea00f9419dc145ffa

}
