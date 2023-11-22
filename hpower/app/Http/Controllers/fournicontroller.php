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

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $user = Auth::user(); // Récupère l'utilisateur connecté

        $villeProvenance = $user->ville;

        $lastFournisseur = Fournisseur::orderBy('fournisseur_id', 'desc')->first();

        // Vérifier si un enregistrement avec le même numéro d'immatriculation a été effectué dans les dernières 24 heures
        $existingFournisseur = Fournisseur::where('num_immatriculation', $request->input('num_immatriculation'))
            ->where('created_at', '>', Carbon::now()->subDay())
            ->first();
// ...

            if ($existingFournisseur) {
                $errorMessage = 'Un enregistrement avec le numéro d\'immatriculation ' . $request->input('num_immatriculation') . ' a déjà été effectué dans les dernières 24 heures. Veuillez revenir après 24 heures.';
                return redirect()->back()->withErrors(['num_immatriculation' => $errorMessage])->withInput();
            }


        // Le reste de votre code...

        return redirect()->route('Consultcam.show')->with('success', 'Enregistrement effectué avec succès.');
    }


    
public function show()
{
    // Récupérer l'utilisateur connecté
    $user = Auth::user();

    // Récupérer les camions de l'utilisateur connecté
    $fournisseurs = Fournisseur::where('util_id', $user->id)->get();

    return view('fourni/consultation', compact('fournisseurs'));
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
