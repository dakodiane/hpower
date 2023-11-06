<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camions;


class fournicontroller extends Controller
{

    public function create()
    {
        return view('fourni.enregistcamion');
    }

        public function store(Request $request)
        {
          
            $camion = camions::create([
                'num_bordereau' => $request->input('numero_bordereau'),
                'num_ima' => $request->input('numero_imatri'),
                'cam_nomchauf' => $request->input('nom_chauffeur'),
                'type_produit' => $request->input('type_produit'),
                'heure_depart' => $request->input('heure_depart'),
                'observation' => $request->input('observation'),
                'poids_vide' => $request->input('poids_vide'),
                'poids_charge' => $request->input('poids_charge'),
                'poids_net' => $request->input('poids_net'),
                'cam_photo' => $request->input('photo_immatriculation'),
                'statut_dechargement' => $request->input('statutChargement'),
                'nombre_sac' => $request->input('nombre_sacs'),
                'ville_depart' => $request->input('ville_depart'),
                'name_fourni' => $request->input('fournisseur'),
                        dd
                    ]);
                    
    
            return redirect()->back()->with('success', 'Camion enregistré avec succès.');
        }

    


}
