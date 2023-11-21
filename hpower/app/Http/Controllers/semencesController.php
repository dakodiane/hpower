<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\Semence;
use Illuminate\Http\Request;
use  PDF;



class semencesController extends Controller
{
    public function index()
    {

          $paiements = paiement::orderBy('created_at','desc')->paginate(10);
          $semences = Semence::orderBy('created_at','desc');
          
          $mntRevient = paiement::WhereNotNULL('semence_id')->get();
          $depense = $mntRevient->sum('montant_tp');

          $qteVente = Semence::whereNotNULL('sem_qtevendue')->get();
          $qteVendue = $qteVente->sum('sem_qtevendue');

          $qteAchat = Semence::WhereNotNULL('sem_qtereçu')->get();
          $qteAchetee = $qteAchat->sum('sem_qtereçu');

          $mntVente = paiement::WhereNotNULL('semence_id')->get();
          $Vente = $mntVente->sum('montant_HPG');

          return view ("services_semence.dashboard", compact('qteVendue', 'depense', 'qteAchetee', 'Vente', 'semences', 'paiements'));
    }
     public function vente()
   {
          
        return view("services_semence.vente");
   }

   public function reception()
   {
        return view("services_semence.reception");
   }
   
   public function paie(Request $request){
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
          'qv'=>'required|decimal: 0,2',
          'puhpg'=>'numeric',
          'montant'=>'numeric',
          'client'=>'String',
          'lieusemi'=>'String'
          
     ]);

     $montant_tp = $request->input('pu') * $request->input('ql');
     $montant_HPG = $request->input('puhpg') * $request->input('qv');
     $recette_HPG = $montant_HPG-$montant_tp;

     $newSemence = new Semence();
     $paiement = new paiement();

     $newSemence->sem_numtrans=$request->transact;
     $newSemence->sem_nummatricul=$request->matricul;
     $newSemence->sem_fourn=$request->fournisseur;
     $newSemence->sem_type=$request->nature;
     $paiement->montant_tp=$montant_tp;
     $newSemence->sem_prixunit=$request->pu;
     $newSemence->sem_qtereçu=$request->ql;
     $newSemence->sem_magdecht=$request->magasin;
     $newSemence->sem_nature=$request->semence;
     $newSemence->sem_deplace=$request->moyen;
     $newSemence->sem_bord=$request->bord;
     $newSemence->sem_prove=$request->lieu;
     $newSemence->sem_qtevendue=$request->qv;
     $newSemence->sem_prixunitHPG=$request->puhpg;
     $paiement->montant_HPG=$request->montant;
     $newSemence->sem_client=$request->client;
     $newSemence->sem_lieusemi=$request->lieusemi;

     $paiement->save();
     $res = $newSemence->save();
      if($res){
        return redirect()->route('dashboard', compact('montant_tp', 'montant_HPG', 'recette_HPG'));
      }else{
           return back()->with('fail','Erreur');
     }

   }


  
}
 
