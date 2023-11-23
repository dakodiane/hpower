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
    public function createbook()
    {

        $users = User::where('role', 'Client')->get();
        return view('Export/createbook', ['users' => $users]);
    }

    public function listbooking()
    {
        $bookings = Booking::all();
        return view('Export/listbooking', compact('bookings'));
    }

    public function tableaudebord()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'export') {

            return view('Export/tableaudebord', compact('user'));
        } else {
            return redirect()->route('connexion');
        }
    }
        //  compact('camionsAujourdhui', 'camionsCeMois', 'user'

    }
    
    

    public function listloading()
    {
        $loadings = Loading::all();
        return view('Export/listloading', compact('loadings'));
    }

    public function rechercherClient(Request $request)
    {
        $resultats = User::where('name', 'like', $request->input('term') . '%')
            ->where('role', 'Client')
            ->get();

        return response()->json($resultats);
    }
    public function storebooking(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();

        $cts_20 = $request->input('nombre_cts_20');
        $cts_40 = $request->input('nombre_cts_40');
        $total = $cts_20 + $cts_40;

        $data['nombre_total'] = $total;
        $data['id_user'] = $user->id;
        $booking = new Booking();

        $booking->fill($data);

        $booking->save();
        //dd($bookings);
        $bookings = Booking::all();

        return view('Export.listbooking', ['bookings' => $bookings]);
    }

    public function createloading($id_booking)
    {
        $bookings = Booking::find($id_booking);

        return view('Export/createload', compact('bookings'));
    }

    public function storeloading(Request $request, $id_booking)
    {
        $data = $request->all();
        $totalContainers = (int) $data['total_containers'];
        $loadings = [];

        for ($i = 1; $i <= $totalContainers; $i++) {
            $loading = new Loading();
            $loading->id_booking = $id_booking;
            $loading->nom_enleveur = $data['nom_enleveur'];
            $loading->lieu_chargement = $data['lieu_chargement'];
            $loading->produit = $data['produit'];

            $loading->num_cts = $data["num_cts_$i"];
            $loading->num_seal = $data["num_seal_$i"];
            $loading->nombre_sac = $data["nombre_sac_$i"];
            $loading->poids_cts_vide = $data["poids_cts_vide_$i"];
            $loading->poids_cts_charge = $data["poids_cts_charge_$i"];
            $loading->poids_vgm = $data["poids_vgm_$i"];
            $loading->date_chargement = $data["date_chargement_$i"];
            $loading->date_port = $data["date_port_$i"];

            $poidsCharge = $loading->poids_cts_charge;
            $poidsVide = $loading->poids_cts_vide;
            $loading->poids_cts_net = $poidsCharge - $poidsVide;

            if ($request->hasFile("ticket_container_$i")) {
                $photoPath = $request->file("ticket_container_$i")->store('tickets', 'public');
                $loading->ticket_container = $photoPath;
            }

            if ($request->hasFile("ticket_2_$i")) {
                $photoPath = $request->file("ticket_2_$i")->store('tickets', 'public');
                $loading->ticket_2 = $photoPath;
            }

            $loading->save();
            $loadings[] = $loading;
        }

        $bookings = Booking::all();
        $loadings = Loading::all();
        return view('Export/listloading', compact('loadings', 'bookings'));
    }


    ///////




    public function listbookingT()
    {
        $bookings = Booking::all();
        return view('serv_eva/listbookingext', compact('bookings'));
    }

    public function listloadingT()
    {
        $loadings = Loading::all();
        return view('serv_eva/listloadingext', compact('loadings'));
    }

}
