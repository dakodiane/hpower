<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\Semence;
use Illuminate\Http\Request;
use  PDF;



class DownloadController extends Controller
{
     public function show($semence_id)
   {
        $invoice = Semence::find($semence_id);
        return view('services_semence.pdf', ['invoice'=>$invoice]);
   }

             
   public function telecharger(){

        $paiements = paiement::all();
        $semences = Semence::all();
         
        $pdf = PDF::loadView('services_semence.pdf');  
        return $pdf->download('document.pdf');
   }
 

}
 
