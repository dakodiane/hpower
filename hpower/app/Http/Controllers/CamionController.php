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
            $photoPath = $request->file('cam_photo')->store('photo_immat', 'public');
            $data['cam_photo'] = $photoPath;
        }
    
        $data['num_bordereau'] = $newNumBordereau;
    
        $camion = new Camion();

        $camion->fill($data);
    
        $camion->save();
    
        // dd($camion);
    
        return redirect()->route('camion.create')->with('success', 'Camion enregistré avec succès.');
    }
    
    public function view()
{
    $camions = Camion::all(); // Récupérez tous les camions depuis la base de données

    return view('Users/listecamionsave', compact('camions')); // Transmettez les camions à la vue
}

public function viewfin(Request $request)
{
    $camions = Camion::all();;
    return view('Users/listecamionfin', compact('camions'));
}

public function savefin($cam_id)
{
    $camions = Camion::find($cam_id);

    return view('Users/enregistrerfin', compact('camions'));
}

public function storefin(Request $request, $cam_id)
{
    // Récupérer l'camion à partir de l'ID
    $camions = Camion::find($cam_id);


    $data = $request->all();

    if ($request->hasFile('cam_photo1')) {
        $photoPath = $request->file('cam_photo1')->store('photo_immat', 'public');
        $data['cam_photo1'] = $photoPath;
    }

    $camions->fill($data);


    $camions->save();

     return view('Users/listecamionfin', compact('camions'))->with('success', 'Données de l\'camion complétées avec succès');
}

}
