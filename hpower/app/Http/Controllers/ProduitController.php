<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Camion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProduitController extends Controller
{
   
public function activate($id)
{
    $produit = Produit::find($id);
    $produit->active = 1;
    $produit->save();

    return redirect()->back(); // Redirigez l'utilisateur vers la page précédente
}

public function deactivate($id)
{
    $produit = Produit::find($id);
    $produit->active = 0;
    $produit->save();

    return redirect()->back(); // Redirigez l'utilisateur vers la page précédente
}
}