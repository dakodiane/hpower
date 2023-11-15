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




    public function loginUser(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {

            $user = auth()->user();
            if ($user) {
                Cache::put('user-online-' . $user->id, true, now()->addMinutes(1));
                //dd( $user = Auth::user());
                if ($user->role == 'fournisseur') {
                    $request->session()->regenerate();
                    return redirect('fourni');
                } elseif ($user->role == 'directeur') {
                    $request->session()->regenerate();
                    return redirect()->intended('admin');
                } elseif ($user->role == 'rapporteur') {
                    $request->session()->regenerate();
                    return redirect()->intended('user');
                    return redirect('user');
                } elseif ($user->role == 'servicesemence') {
                    $request->session()->regenerate();
                    return redirect('user');
                } elseif ($user->role == 'servicetransport') {
                    $request->session()->regenerate();
                    return redirect('servicetrans');
                } else {
                    return redirect()->back()->withErrors(['role' => 'Rôle non reconnu'])->withInput();
                }
            } elseif (!$user) {
                // L'utilisateur n'existe pas dans la base de données
                return redirect()->back()->withErrors(['email' => 'Adresse Email ou Mot de passe incorrect'])->withInput();
            }
        }
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

