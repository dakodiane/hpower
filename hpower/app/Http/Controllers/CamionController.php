<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Camion;

use Illuminate\Http\Request;

class CamionController extends Controller
{
    //
    public function create()
    {
        $produits = Produit::all();
        return view('Users/enregistrercamion', ['produits' => $produits]);
    }

    public function store(Request $request)
    {
        
        $data = $request->all();
  
        $lastCamion = Camion::orderBy('cam_id', 'desc')->first();
        if ($lastCamion) {
            $lastNumBordereau = $lastCamion->num_bordereau;
            $lastNumBordereau = substr($lastNumBordereau, 2); 
            $newNumBordereau = 'HP' . str_pad(($lastNumBordereau + 1), 4, '0', STR_PAD_LEFT);
        } else {
            $newNumBordereau = 'HP0001';
        }
    
        if ($request->hasFile('cam_photo')) {
            $photoPath = $request->file('cam_photo')->store('public/photo_immat');
            $data['cam_photo'] = $photoPath;
        }
    

        $data['num_bordereau'] = $newNumBordereau;
    
        $camion = new Camion();

        $camion->fill($data);
    
        $camion->save();
    
        // dd($camion);
    
        return redirect()->route('camion.create')->with('success', 'Camion enregistré avec succès.');
    }
    
}
