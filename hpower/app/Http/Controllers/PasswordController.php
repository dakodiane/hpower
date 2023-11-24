<?php

namespace App\Http\Controllers;
use App\Http\User;

use Illuminate\Http\Request;
use App\Models\User;
class PasswordController extends Controller
{
    public function showModifyForm()
    {
        
        // Passez l'utilisateur à la vue
        return view('iden.recoverPassword', compact('user'));
    }
    public function treatModifyForm(Request $request)
    {
        $validatedData = $request->validate([
            'telephone' => 'required',
            'mdp' => 'required',
        ]);
    
        $telephone = $request->input('telephone');
        $user = User::where('telephone', $telephone)->first();
    
        if (!$user) {
            return view('iden.recoverPassword')->with('msg', 'Email non reconnu, veuillez réessayer à nouveau');
        }
    
        $user->password = bcrypt($validatedData['mdp']);
        $user->save();
    
        // Utilisez la session flash pour afficher le message de succès
        return redirect()->route('iden.recoverPassword')->with('success', 'Mot de passe réinitialisé avec succès.');
    }
    

}   

