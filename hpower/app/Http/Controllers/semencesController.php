<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class semencesController extends Controller
{
    public function affichage()
   {
        return view("services_semence.semence");
   }

   public function paiement()
   {
        return view("services_semence.paie");
   }

}
