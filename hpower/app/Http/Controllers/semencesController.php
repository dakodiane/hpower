<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\Semence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class semencesController extends Controller
{
    public function index()
    {

        
        $user = Auth::user(); // Récupère l'utilisateur connecté //dd($user);
       
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

          return view ("services_semence.dashboard", compact('qteVendue', 'depense', 'qteAchetee', 'Vente', 'semences', 'paiements','user'));
    }
   //   public function vente()
   // {
          
   //      return view("services_semence.vente");
   // }

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
          // 'qv'=>'required|decimal: 0,2',
          'puhpg'=>'numeric',
          'montant'=>'numeric',
          'client'=>'String',
          'lieusemi'=>'String'
          
     ]);

     $montant_tp = $request->input('pu') * $request->input('ql');
     

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
     

     $paiement->save();
     $res = $newSemence->save();
      if($res){
        return redirect()->route('dashboard', compact('montant_tp', 'montant_HPG', 'recette_HPG','user'));
      }else{
           return back()->with('fail','Erreur');
     }

   }

   
    


   
 

}
 
