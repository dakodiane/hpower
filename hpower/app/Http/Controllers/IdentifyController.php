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
          return back()->with('success','Enregistrement effectué avec succès');
     }else{
          return back()->with('fail','Erreur');
     }

   }

   public function loginUser(Request $request){

     $email = $request->email;
     $password = $request->password;

         $user = User::where('email', "=", $email)->first();

     if (Auth::attempt(['email' => $email, 'password' => $password])) {
         if ($user) {

             if ($user->role == 'fournisseur') {
               $request->session()->regenerate();
                
                return view('Users/tableaudebord');
               
             } elseif ($user->role == 'directeur') {

                 $request->session()->regenerate();
                
                  return view('Admin/tableaudebord');
             } 
                 elseif ($user->role == 'rapporteur') {
                 $request->session()->regenerate();

                 return view('Users/tableaudebord');             }
             elseif ($user->role == 'servicesemence') {
               $request->session()->regenerate();

               return view('Users/tableaudebord');
           }
           elseif ($user->role == 'servicetransport') {
               $request->session()->regenerate();

               return view('Users/tableaudebord');
           }
         }
       
     }
     elseif (!$user) {
         return redirect()->back()->withErrors(['email' => 'Adresse Email ou Mot de passe incorrect'])->withInput();
     }

     if (!Hash::check($password, $user->password)) {
         return redirect()->back()->withErrors(['password' => 'Adresse Email ou Mot de passe incorrect'])->withInput();
     }}
     
}
