<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApproController extends Controller
{
    public function affichage()
    {
         return view("appro.apboard");
    }
}
