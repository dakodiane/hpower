<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Models\Produit;
use App\Models\Camion;
use App\Models\Paiement;
use App\Models\Semence;
use App\Models\Transport;
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
     
        return view('Admin/createproduit', compact('produits'));
    }

    public function produitext()
    {
        $produits = Produit::all();
     
        return view('services_semence.listprod', compact('produits'));
    }
    
        
    public function createproduit(Request $request)
    {
        $request->validate([
            'prod_nom' => 'required|string|max:255',
        ]);
        $produits = new Produit();
        $produits->prod_nom = $request->input('prod_nom');

        $produits->save();
    
        return redirect()->intended(route('createproduit',  compact('produits')));
    }
     

    public function fournilist()
{
    $users = User::where('role','fournisseur')
    ->get();

    return view('Admin/fournisseur', compact('users'));
}

public function paiements()
{
    $paiements = Paiement::all();
 
    return view('Admin/paiement', compact('paiements'));
}

public function userlist()
{
    $users = User::all();
   // ('last_activity', '>', now()->subMinutes(10))
  //  ->whereIn('id', Cache::get('user-online', []))
  //  ->get();
    return view('Admin/userlist', compact('users'));
}

public function camions(Request $request)
{
  
    $semences= Semence::all();
    $approvisionnements= Approvisionnement::whereNotNull('heure_arrive')->get();
    $transports= Transport::whereNotNull('heure_arrive')->get();
    


    return view('Admin/allcamion', compact('semences','approvisionnements','transports'));
}
public function activate($id)
{
    $users = User::find($id);
    $users->active = 1;
    $users->save();

    return redirect()->back(); // Redirigez l'utilisateur vers la page précédente
}

public function deactivate($id)
{
    $users = User::find($id);
    $users->active = 0;
    $users->save();

    return redirect()->back(); // Redirigez l'utilisateur vers la page précédente
}


}
