<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camion;

class ConsultcamController extends Controller
{
    
public function show()
{
    $camions = Camion::all();
    return view('fourni/consultation', ['camions' => $camions]);
}

}
