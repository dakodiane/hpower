<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\Semence;
use Illuminate\Http\Request;




class SemenceController extends Controller
{  
    public function traitement(Request $request){
      $newSemence = new Semence();
      $paiement = new paiement();


      $data = $request->validate([
          'qv'=>'required|decimal: 0,2',
          'puhpg'=>'numeric',
          'montant'=>'numeric',
          'client'=>'String',
          'lieusemi'=>'String'
          
     ]);

      $newSemence->sem_qtevendue=$request->qv;
     $newSemence->sem_prixunitHPG=$request->puhpg;
     $paiement->montant_HPG=$request->montant;
     $newSemence->sem_client=$request->client;
     $newSemence->sem_lieusemi=$request->lieusemi;

      $montant_HPG = $request->input('puhpg') * $request->input('qv');
      $recette_HPG = $montant_HPG-$montant_tp;

   }

   public function index(){
      return view('services_semence.vente');
   }    
  
  

   public function telecharger(){
          $pdf = PDF::loadView('services_semence.pdf');  
          return $pdf->download('document.pdf');
   }   
 

}
 
