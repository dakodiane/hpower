<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Camion;
use App\Models\Semence;
use App\Models\Fournisseur;
use App\Models\Transport;
use App\Models\Approvisionnement;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AfficheFourniController extends Controller
{
    public function fournisseur(){
        $user = Auth::user();
        $camions = Fournisseur::orderBy('created_at','desc')->paginate(10);
        return view('appro.founisseurs', compact('camions'));
    }
}
