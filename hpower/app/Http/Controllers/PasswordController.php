<?php

namespace App\Http\Controllers;
use App\Http\User;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
   public function showModifyForm(){

    return view('iden.recoverPassword');
   }

   public function treatModifyForm(){
    $validatedData = $request->validate([
        'telephone' => 'required',
        'mdp' => 'required',
        ]);

    $email = $request->input('telephone');
    // Check if the telephone doesn't exist in the users table
    $telephoneExists = User::where('telephone', $telephone)->exists();

    if (!$telephoneExists) {
        
        return view ('iden.recoverPassword')->with('Email non reconnu, veuillez réésayer à nouveau', 'msg');
    }

    else{
        $user = User::find($id);
        User::where('id', $user_id)->update([
        $user->password = $validatedData['mdp']
    ]);
         $user = $user->fresh();
         Session::flash('success', 'Mot de passe réinitialisé avec succès.');
    }


   }

}   

