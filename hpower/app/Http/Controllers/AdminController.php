<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Models\Booking;
use App\Models\Produit;
use App\Models\Camion;
use App\Models\Loading;
use App\Models\Paiement;
use App\Models\Semence;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //


    public function produit()
    {
        $produits = Produit::all();

        return view('Admin/createproduit', compact('produits'));
    }


    public function produitext()
    {
        $produits = Produit::all();
     
        return view('services_semence.listprod', compact('produits'));
    }
    
        
    public function createproduit(Request $request)
    {
        $request->validate([
            'prod_nom' => 'required|string|max:255',
        ]);
        $produits = new Produit();
        $produits->prod_nom = $request->input('prod_nom');

        $produits->save();

        return redirect()->intended(route('createproduit',  compact('produits')));
    }


    public function fournilist()
    {
        $users = User::where('role', 'fournisseur')
            ->get();

        return view('Admin/fournisseur', compact('users'));
    }

    public function paiements()
    {
        $paiements = Paiement::all();

        return view('Admin/paiement', compact('paiements'));
    }

    public function userlist()
    {
        $users = User::all();
        // ('last_activity', '>', now()->subMinutes(10))
        //  ->whereIn('id', Cache::get('user-online', []))
        //  ->get();
        return view('Admin/userlist', compact('users'));
    }

    public function camions(Request $request)
    {

        $semences = Semence::all();
        $approvisionnements = Approvisionnement::whereNotNull('heure_arrive')->get();
        $transports = Transport::whereNotNull('heure_arrive')->get();
        return view('Admin/allcamion', compact('semences', 'approvisionnements', 'transports'));
    }
    public function activate($id)
    {
        $users = User::find($id);
        $users->active = 1;
        $users->save();

        return redirect()->back(); // Redirigez l'utilisateur vers la page précédente
    }

    public function deactivate($id)
    {
        $users = User::find($id);
        $users->active = 0;
        $users->save();

        return redirect()->back(); // Redirigez l'utilisateur vers la page précédente
    }

    public function servicetransport()
    {

        // Récupérer les transports avec paiements associés ayant recette_HPG non égal à zéro
        $transports = Transport::with(['paiements' => function ($query) {
            $query->where('recette_HPG', '!=', 0);
        }])
            ->whereHas('paiements', function ($query) {
                $query->where('recette_HPG', '!=', 0);
            })
            ->get();

        // Calculer la somme des poids_net par provenance
        $sumPoidsParProvenance = Transport::select('provenance', DB::raw('SUM(poids_net) as poids_total'))
            ->groupBy('provenance')
            ->get();

        return view('Admin.servicetransport', [
            'transports' => $transports,
            'sumPoidsParProvenance' => $sumPoidsParProvenance,
        ]);
    }

    public function servicesemence()
    {
        $semences = Semence::orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.servicesemence', compact('semences'));
    }

    public function serviceapprovisionnement()
    {
        $user = Auth::user();
        $paiements = paiement::all();
        $semences = Semence::all();
        $appro = Approvisionnement::orderBy('created_at', 'desc')->paginate(10);

        $sttatt =   Approvisionnement::Where('statut_paiement', 'En attente')->get();
        $stat = $sttatt->count('statut_paiement');

        $statpaye = Approvisionnement::Where('statut_paiement', 'effectué')->get();
        $statt = $statpaye->count('statut_paiement');

        $mntRevient = paiement::WhereNotNULL('semence_id')->get();
        $depense = $mntRevient->sum('montant_tp');

        $qteVente = Semence::whereNotNULL('sem_qtevendue')->get();
        $qteVendue = $qteVente->sum('sem_qtevendue');

        $qteAchat = Semence::WhereNotNULL('sem_qtereçu')->get();
        $qteAchetee = $qteAchat->sum('sem_qtereçu');

        $mntVente = paiement::WhereNotNULL('semence_id')->get();
        $Vente = $mntVente->sum('montant_HPG');
        return view("Admin.serviceapprovisionnement", compact('qteVendue', 'depense', 'qteAchetee', 'Vente', 'semences', 'paiements', 'stat', 'statt', 'user', 'appro'));
    }



    //////////////////////////////evaluation 

    public function serviceapprovisionnementE()
    {
        $user = Auth::user();
        $paiements = paiement::all();
        $semences = Semence::all();
        $appro = Approvisionnement::orderBy('created_at', 'desc')->paginate(10);

        $sttatt =   Approvisionnement::Where('statut_paiement', 'En attente')->get();
        $stat = $sttatt->count('statut_paiement');

        $statpaye = Approvisionnement::Where('statut_paiement', 'effectué')->get();
        $statt = $statpaye->count('statut_paiement');

        $mntRevient = paiement::WhereNotNULL('semence_id')->get();
        $depense = $mntRevient->sum('montant_tp');

        $qteVente = Semence::whereNotNULL('sem_qtevendue')->get();
        $qteVendue = $qteVente->sum('sem_qtevendue');

        $qteAchat = Semence::WhereNotNULL('sem_qtereçu')->get();
        $qteAchetee = $qteAchat->sum('sem_qtereçu');

        $mntVente = paiement::WhereNotNULL('semence_id')->get();
        $Vente = $mntVente->sum('montant_HPG');
        return view("serv_eva.serviceapprovisionnementext", compact('qteVendue', 'depense', 'qteAchetee', 'Vente', 'semences', 'paiements', 'stat', 'statt', 'user', 'appro'));
    }

    public function servicesemenceE()
    {
        
        $semences = Semence::orderBy('created_at', 'desc')->paginate(10);
        return view('serv_eva.servicesemenceext', compact('semences'));
    }



    public function camionsT(Request $request)
    {

        $semences = Semence::all();
        $approvisionnements = Approvisionnement::whereNotNull('heure_arrive')->get();
        $transports = Transport::whereNotNull('heure_arrive')->get();
        return view('serv_eva/allcamionext', compact('semences', 'approvisionnements', 'transports'));
    }

    
    public function servicetransportE()
    {

        // Récupérer les transports avec paiements associés ayant recette_HPG non égal à zéro
        $transports = Transport::with(['paiements' => function ($query) {
            $query->where('recette_HPG', '!=', 0);
        }])
            ->whereHas('paiements', function ($query) {
                $query->where('recette_HPG', '!=', 0);
            })
            ->get();

        // Calculer la somme des poids_net par provenance
        $sumPoidsParProvenance = Transport::select('provenance', DB::raw('SUM(poids_net) as poids_total'))
            ->groupBy('provenance')
            ->get();

        return view('serv_eva.servicetransportext', [
            'transports' => $transports,
            'sumPoidsParProvenance' => $sumPoidsParProvenance,
        ]);
    }

    public function statistiquesCamionsT()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'servicevalutation') {

                $aujourdHui = Carbon::now();
                $ceMois = Carbon::now()->startOfMonth();

                $transportsAujourdhui = DB::table('transports')
                    ->whereDate('created_at', $aujourdHui->toDateString())
                    ->count();

                $transportsCeMois = DB::table('transports')
                    ->whereYear('created_at', $ceMois->year)
                    ->whereMonth('created_at', $ceMois->month)
                    ->count();

                // Récupérer les statistiques par provenance
                $sumPoidsParProvenance = DB::table('transports')
                    ->select('provenance', DB::raw('SUM(poids_net) as poids_total'))
                    ->groupBy('provenance')
                    ->get();

                return view('serv_eva/tableaudebordext', compact('transportsAujourdhui', 'transportsCeMois', 'sumPoidsParProvenance', 'user'));
            } else {
                return redirect()->route('connexion');
            }
        } else {
            return redirect()->route('connexion');
        }
    }
    public function bookingadmin()
    {
        $bookings = Booking::all();
        return view('Admin/listbooking', compact('bookings'));
    }
    public function loadingadmin()
    {
        $loadings = Loading::all();
        return view('Admin/listloading', compact('loadings'));
    }


}
