<?php
namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Camion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
            $photoPath = $request->file('cam_photo')->store('photo_immat','public');
            $data['cam_photo'] = $photoPath;
        }
    

        $data['num_bordereau'] = $newNumBordereau;
        
        $poidsCharge = $request->input('poids_charge');
        $poidsVide = $request->input('poids_vide');
        $poidsNet = $poidsCharge - $poidsVide;
    
        $data['poids_net'] = $poidsNet;
    
        $camion = new Camion();

        $camion->fill($data);
    
        $camion->save();
    
        return redirect()->route('fourni.create')->with('success', 'Camion enregistré avec succès.');
    }
    
 
    
    

    
    public function statistiqueCamions()
    {
        $aujourdHui = Carbon::now();
        $ceMois = Carbon::now()->startOfMonth();
    
        $camionsAujourdhui = DB::table('camions')
            ->whereDate('created_at', $aujourdHui->toDateString())
            ->count();
    
        $camionsCeMois = DB::table('camions')
            ->whereYear('created_at', $ceMois->year)
            ->whereMonth('created_at', $ceMois->month)
            ->count();
    
        return view('fourni/tableaudebord', compact('camionsAujourdhui', 'camionsCeMois'));
    } 






}
