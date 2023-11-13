<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;


class semencesController extends Controller
{
    public function display()
   {
          $produits = Produit::all();
        return view("services_semence.semence", ['produits' => $produits]);
   }

   public function paiement()
   {
        return view("services_semence.paiement");
   }
   
   public function paie(Request $request){
     $data = $request->validate([
          'semence'=>'required',
          'ql'=> 'required|decimal:0,2',
          'qv'=>'required|decimal:0,2',
          'nature'=>'required',
          'magasin'=>'required',
          'lieu'=>'required',
          'fournisseur'=>'required',          
          'pvf'=>'required|numeric',
          'phpg'=>'required|numeric',          
          'recette'=>'numeric'
     ]);

     $newProd = new Produit();
     $newProd->prod_nom=$request->semence;
     $newProd->prod_qtelivree=$request->ql;
     $newProd->prod_qtevendue=$request->qv;
     $newProd->prod_nat=$request->nature;
     $newProd->prod_magasin=$request->magasin;
     $newProd->prod_lieuprod=$request->lieu;
     $res = $newProd->save();
      if($res){
        return redirect()->route('dashboard');
      }else{
           return back()->with('fail','Erreur');
     }

   }

}
