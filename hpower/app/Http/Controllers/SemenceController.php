<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\Semence;
use Illuminate\Http\Request;




class semencesController extends Controller
{      
     public function vente()
   {
        $paiements = paiement::all();
        $semences = Semence::all();
          
        return view("services_semence.vente", compact('paiements', 'semences'));
   }
   
   public function traitement(Request $request){
     $data = $request->validate([
          'qv'=>'required|decimal: 0,2',
          'puhpg'=>'numeric',
          'montant'=>'numeric',
          'client'=>'String',
          'lieusemi'=>'String'
          
     ]);

     $newSemence = new Semence();
     $paiement = new paiement();
     
     $newSemence->sem_qtevendue=$request->qv;
     $newSemence->sem_prixunitHPG=$request->puhpg;
     $paiement->montant_HPG=$request->montant;
     $newSemence->sem_client=$request->client;
     $newSemence->sem_lieusemi=$request->lieusemi;

     $paiement->save();
     $res = $newSemence->save();
      if($res){
        return redirect()->route('dashboard');
      }else{
           return back()->with('fail','Erreur');
     }

   }
 

}
 
