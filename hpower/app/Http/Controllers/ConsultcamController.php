<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camion;
use Illuminate\Support\Facades\Auth;
class ConsultcamController extends Controller
{
    
    public function show()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer les camions de l'utilisateur connecté
        $camions = Camion::where('util_id', $user->id)->get();

        return view('fourni/consultation', compact('camions'));
    }




}
