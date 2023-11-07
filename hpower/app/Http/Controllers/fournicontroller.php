<?php
namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Camion;

use Illuminate\Http\Request;



class fournicontroller extends Controller
{

    //
    public function create()
    {
        $produits = Produit::all();
        return view('fourni/enregistcamion', ['produits' => $produits]);
    }

    
    public function store(Request $request)
    {
        $data = $request->all();
  //dd($data);
        $lastCamion = Camion::orderBy('cam_id', 'desc')->first();
        if ($lastCamion) {
            $lastNumBordereau = $lastCamion->num_bordereau;
            $lastNumBordereau = substr($lastNumBordereau, 2); 
            $newNumBordereau = 'HP' . str_pad(($lastNumBordereau + 1), 4, '0', STR_PAD_LEFT);
        } else {
            $newNumBordereau = 'HP0001';
        }
    
        if ($request->hasFile('cam_photo')) {
            $photoPath = $request->file('cam_photo')->store('photo_immat');
            $data['cam_photo'] = $photoPath;
        }
    

        $data['num_bordereau'] = $newNumBordereau;
    
        $camion = new Camion();

        $camion->fill($data);
    
        $camion->save();
    
        return redirect()->route('fourni.create')->with('success', 'Camion enregistré avec succès.');
    }
    
 
    
    


}
