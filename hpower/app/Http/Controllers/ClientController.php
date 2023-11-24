<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Loading;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LoadingUpdated;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    //

    public function loadingclient()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role == 'Client') {
                $loadings = Loading::with('booking')
                    ->join('bookings', 'loadings.id_booking', '=', 'bookings.id_booking')
                    ->where('bookings.id_client', '=', $user->id)
                    ->get();

                return view('Client/loading', compact('user', 'loadings'));
            } else {
                return redirect()->route('connexion');
            }
        }
    }


    public function edit($id_loading)
    {
        // Récupérez le loading que vous souhaitez éditer
        $loadings = Loading::find($id_loading);
        $totalContainers = $loadings->booking->nombre_total;
        return view('Client/edit', compact('loadings','totalContainers'));
    }
 

    public function update(Request $request, $id_loading)
    {
        $data = $request->all();
      
            $loading = Loading::find($id_loading);
    
            $loading->nom_enleveur = $data['nom_enleveur'];
            $loading->lieu_chargement = $data['lieu_chargement'];
            $loading->produit = $data['produit'];
    
            $loading->num_cts = $data["num_cts"];
            $loading->num_seal = $data["num_seal"];
            $loading->nombre_sac = $data["nombre_sac"];
            $loading->poids_cts_vide = $data["poids_cts_vide"];
            $loading->poids_cts_charge = $data["poids_cts_charge"];
            $loading->poids_vgm = $data["poids_vgm"];
        
    
            $poidsCharge = $loading->poids_cts_charge;
            $poidsVide = $loading->poids_cts_vide;
            $loading->poids_cts_net = $poidsCharge - $poidsVide;
    
    
            $loading->save();
            session()->flash('success', 'L\'enregistrement a été modifié avec succès!');
            $exportUsers = User::where('role', 'export')->get();
            Notification::send($exportUsers, new LoadingUpdated($loading));
            

        return redirect()->route('loadingclient');
    }
    
}
