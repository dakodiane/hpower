<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

   public function registerUser(Request $request){

     $request->validate([
          'name'=>'required',
          'email'=>'required|email|unique:users',
          'password'=>'required|min:5|max:12',
          'telephone'=>'required',
          'role'=>'required',
          'ville'=>'required',
     ]);
     $user=new User();
     $user->name=$request->name;
     $user->email=$request->email;
     $user->password=$request->password;
     $user->telephone=$request->telephone;
     $user->role=$request->role;
     $user->ville=$request->ville;
     $res = $user->save();
     if($res){
        return redirect()->route('connexion');
     }else{
          return back()->with('fail','Erreur');
     }

   }


public function loginUser(Request $request) {
    $email = $request->input('nom'); // Assurez-vous que vous utilisez le bon nom de champ
    $password = $request->input('mdp'); // Assurez-vous que vous utilisez le bon nom de champ

    $user = User::where('email', $email)->first();

    if (!$user) {
        return redirect()->back()->withErrors(['nom' => 'Adresse Email ou Mot de passe incorrect'])->withInput();
    }

    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        if ($user->role == 'fournisseur') {
            return redirect()->intended('user'); // Rediriger vers la page d'accueil
           } elseif ($user->role == 'directeur') {
            return redirect()->intended('admin'); // Rediriger vers la page d'accueil
           } elseif ($user->role == 'rapporteur') {
            return redirect()->intended('user'); // Rediriger vers la page d'accueil
           } elseif ($user->role == 'servicesemence') {
            return redirect()->intended('user'); // Rediriger vers la page d'accueil
           } elseif ($user->role == 'servicetransport') {
            return redirect()->intended('user'); // Rediriger vers la page d'accueil
           } else {
               return redirect()->back()->withErrors(['email' => 'Rôle non reconnu'])->withInput();
           } 
    } else {
        return redirect()->back()->withErrors(['nom' => 'Adresse Email ou Mot de passe incorrect'])->withInput();
    }
}

}
