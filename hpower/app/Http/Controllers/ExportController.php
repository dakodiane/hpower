<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Loading;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{
    //
    public function createexport()
    {
        $users = User::where('role', 'client')->get();
        return view('Export/createbook', ['users' => $users]);
    }

    

}
