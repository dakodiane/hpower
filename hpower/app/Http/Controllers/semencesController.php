<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\Semence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  PDF;
use Maatwebsite\Excel\Facades\Excel;



class semencesController extends Controller
{
    public function index()
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
     

     $newSemence = new Semence();
     $paiement = new paiement();

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

   }

   // POur la vente

<<<<<<< HEAD
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
      // $recette_HPG = $montant_HPG-$montant_tp;
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

   public function exportExcel()
   {
       try {
           
        $semences = Semence::all();

           return Excel::download(new semencesExport($semences), 'semences.xlsx');
       } catch (\Exception $e) {
           // Gérer l'erreur, par exemple, en enregistrant le message d'erreur ou en renvoyant une réponse appropriée
           return back()->withError('Une erreur s\'est produite lors de la récupération des données pour l\'export Excel.');
       }
   }
 

=======
  
>>>>>>> 814d4ebd83954415d7a7fa788be83c7d4c94fd2f
}
 
