<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\Semence;
use Illuminate\Http\Request;
use  PDF;



class semencesController extends Controller
{
    

             
   public function telecharger(){

        $paiements = paiement::all();
        $semences = Semence::all(); 
        $pdf = PDF::loadView('services_semence.dashboard');  
        return $pdf->download('document.pdf');
   }
 

}
 
