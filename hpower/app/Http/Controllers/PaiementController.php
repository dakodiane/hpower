<?php

namespace App\Http\Controllers;

use App\Models\Produit;

use App\Models\paiement;

use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function paiecalc(){
        $produits = Produit::all();
        return view ("services_semence.dashboard", ['produits' => $produits]);
    }

    public function paie(Request $request){
        $data = $request->validate([
             'semence'=>'required',
             'ql'=> 'required|decimal:0,2',
             'qv'=>'required|decimal:0,2',
             'nature'=>'required',
             'magasin'=>'required',
             'lieu'=>'required',
             // 'fournisseur'=>'required',          
             
             // 'pvf'=>'required|numeric',
             // 'phpg'=>'required|numeric',
             
             // 'recette'=>'numeric'
        ]);
   
        $newPaie = new paiement();
        $newPaie->paie_prixlivraison=$request->pvf;
        $newPaie->montant_HPG=$request->phpg;
        $newPaie->recette=$request->recette_HPG;
        $res = $newPaie->save();
         if($res){
           return redirect()->route('dashboard');
         }else{
              return back()->with('fail','Erreur');
        }
   
      }
   
}
