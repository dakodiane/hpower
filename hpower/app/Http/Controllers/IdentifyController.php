<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class IdentifyController extends Controller
{
    public function connexion()
    {
        return view("iden.connexion");
    }

    public function inscription()
    {
        return view("iden.inscription");
    }
    public function client()
    {
        return view("iden.client");
    }

    public function registerUser(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
            'telephone' => 'required',
            'role' => 'required',
            'ville' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->telephone = $request->telephone;
        $user->role = $request->role;
        $user->ville = $request->ville;
        $res = $user->save();
        if ($res) {
            return redirect()->route('connexion');
        } else {
            return back()->with('fail', 'Erreur');
        }
    }


    public function registerClient(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
            'telephone' => 'required',
            'nom_entreprise' => 'required',
            'adresse' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->telephone = $request->telephone;
        $user->role = 'Client';
        $user->nom_entreprise = $request->nom_entreprise;
        $user->adresse = $request->adresse;

        $latestUser = User::latest('id')->first();
        $num = $latestUser ? (int)substr($latestUser->num_enregistrement, -3) + 1 : 1;
        $user->num_enregistrement = 'HPG-C' . str_pad($num, 3, '0', STR_PAD_LEFT);

        $res = $user->save();

        if ($res) {
            return redirect()->route('connexion');
        } else {
            return back()->with('fail', 'Erreur');
        }
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->only('telephone', 'password');
    
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
    
            if ($user) {
                // Vérifie si le champ 'active' est égal à 1
                if ($user->active == 1) {
                    Cache::put('user-online-' . $user->id, true, now()->addMinutes(1));
    
                    // Votre code actuel pour les redirections
                    if ($user->role == 'fournisseur') {
                        $request->session()->regenerate();
                        return redirect('fourni');
                    } elseif ($user->role == 'directeur') {
                        $request->session()->regenerate();
                        return redirect()->intended('admin');
                    } elseif ($user->role == 'rapporteur') {
                        $request->session()->regenerate();
                        return redirect()->intended('user');
                    } elseif ($user->role == 'servicesemence') {
                        $request->session()->regenerate();
                        return redirect('semences');
                    } elseif ($user->role == 'servicetransport') {
                        $request->session()->regenerate();
                        return redirect('servicetrans');
                    } elseif ($user->role == 'serviceappro') {
                        $request->session()->regenerate();
                        return redirect('approvisionnement');
                    } elseif ($user->role == 'export') {
                        $request->session()->regenerate();
                        return redirect('export');
                    } else {
                        return redirect()->back()->withErrors(['role' => 'Rôle non reconnu'])->withInput();
                    }
                } else {
                    // Si le champ 'active' n'est pas égal à 1, l'utilisateur n'est pas autorisé
                    return redirect()->back()->withErrors(['active' => 'Votre compte n\'est pas actif. Veuillez contacter l\'administrateur.'])->withInput();
                }
            }
        }
    
        // L'authentification a échoué, retournez les erreurs
        return redirect()->back()->withErrors(['email' => 'Adresse Email ou Mot de passe incorrect'])->withInput();
    }
    
    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            Cache::forget('user-online-' . $user->id);
        }
        Auth::logout();
        Cache::forget('user-online-' . Auth::id());
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('connexion');
    }
    
}

