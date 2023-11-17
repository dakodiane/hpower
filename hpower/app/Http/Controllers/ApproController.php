<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApproController extends Controller
{
    public function affichage()
    {
         return view("appro.dashboard");
    }

    public function hpg()
    {
         return view("appro.hpg");
    }
}
