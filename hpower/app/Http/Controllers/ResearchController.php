<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function search(){
        return view("services_semence.search");
    }

    // public fonction result(Request $request)
    // {
    //     $data = hpowercamp::select('')
    // }
}
