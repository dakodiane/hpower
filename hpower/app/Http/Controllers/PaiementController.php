<?php

namespace App\Http\Controllers;

use App\Models\Produit;

use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function paiecalc(){
        $produits = Produit::all();
        return view ("services_semence.dashboard", ['produits' => $produits]);
    }
}
