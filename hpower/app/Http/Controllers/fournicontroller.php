<?php
namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class fournicontroller extends Controller
{

    //
    public function create()
    {
        
  
        $produits = Produit::all();
        $user = Auth::user(); // Récupère l'utilisateur connecté
        //dd($user);
        return view('fourni/enregistcamion', ['produits' => $produits, 'user' => $user]);
  
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tel_conducteur' => 'required|numeric|digits_between:1,8',
            'num_immatriculation' => 'required|string|max:255',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);
    
        // Si la validation échoue, rediriger avec les erreurs
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $data = $request->all();
        $user = Auth::user(); // Récupère l'utilisateur connecté
    
        // Utiliser le modèle Fournisseur au lieu de Camion
        $lastFournisseur = Fournisseur::orderBy('fournisseur_id', 'desc')->first();
    
        if ($lastFournisseur) {
            $lastNumBordereau = $lastFournisseur->num_bordereau;
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
    
        $poidsCharge = $request->input('poids_charge');
        $poidsVide = $request->input('poids_vide');
        $poidsNet = $poidsCharge - $poidsVide;
    
        $data['poids_net'] = $poidsNet;
        $data['util_id'] = $user->id;
    
        // Utiliser le modèle Fournisseur au lieu de Camion
        $fournisseur = new Fournisseur();
        $fournisseur->fill($data);
        $fournisseur->save();
    
        return redirect()->route('fourni.create')->with('success', 'Fournisseur enregistré avec succès.');
    }
    



    
    

    
    public function statistiqueCamions()
    {
        if (Auth::check()) {
        $user = Auth::user(); // Récupère l'utilisateur connecté
        $aujourdHui = Carbon::now();
        $ceMois = Carbon::now()->startOfMonth();
    
        $camionsAujourdhui = DB::table('fournisseurs')
            ->whereDate('created_at', $aujourdHui->toDateString())
            ->count();
    
        $camionsCeMois = DB::table('fournisseurs')
            ->whereYear('created_at', $ceMois->year)
            ->whereMonth('created_at', $ceMois->month)
            ->count();
    
        return view('fourni/tableaudebord', compact('camionsAujourdhui', 'camionsCeMois','user'));
    }else {
        return redirect()->route('connexion');
    }
    } 






}
