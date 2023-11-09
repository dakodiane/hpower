<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Camion;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //
 

    public function produit()
    {
        $produits = Produit::all();
        foreach ($produits as $produit) {
            $totalPoidsNet = Camion::where('type_produit', $produit->prod_nom)->sum('poids_net');
            $produit->totalPoidsNet = $totalPoidsNet;
        }
        return view('Admin.createproduit', compact('produits'));
    }
    
        
    public function createproduit(Request $request)
    {
        $request->validate([
            'prod_nom' => 'required|string|max:255',
        ]);
        $produit = new Produit();
        $produit->prod_nom = $request->input('prod_nom');

        $produit->save();
    
        return view('Admin/createproduit'); 
    }
    

    public function fournilist()
{
    $users = User::where('role','fournisseur');

    return view('Admin/fournisseur', compact('users'));
}


public function userlist()
{
    $usersOnline = User::where('last_activity', '>', now()->subMinutes(10))
    ->whereIn('id', Cache::get('user-online', []))
    ->get();
    return view('Admin/userlist', compact('usersOnline'));
}

public function camions(Request $request)
{
  
    $camions = Camion::whereNotNull('heure_arrive')
        ->get();

    return view('Admin/allcamion', compact('camions'));
}



}
