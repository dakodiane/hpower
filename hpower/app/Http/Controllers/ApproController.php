<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approvisionnement;
use App\Models\Produit;
use App\Models\paiement;
use App\Models\Semence;
use App\Models\Camion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ApproController extends Controller
{
    public function affichage()
    {
         $user = Auth::user();
        $paiements = paiement::all();
        $semences = Semence::all();
        $appro = Approvisionnement::all();

        $sttatt =   Approvisionnement::Where('statut_paiement','En attente')->get();
        $stat = $sttatt->count('statut_paiement');

        $statpaye = Approvisionnement::Where('statut_paiement','effectué')->get();
        $statt = $statpaye->count('statut_paiement');

          $mntRevient = paiement::WhereNotNULL('semence_id')->get();
          $depense = $mntRevient->sum('montant_tp');

          $qteVente = Semence::whereNotNULL('sem_qtevendue')->get();
          $qteVendue = $qteVente->sum('sem_qtevendue');

          $qteAchat = Semence::WhereNotNULL('sem_qtereçu')->get();
          $qteAchetee = $qteAchat->sum('sem_qtereçu');

          $mntVente = paiement::WhereNotNULL('semence_id')->get();
          $Vente = $mntVente->sum('montant_HPG');
         return view("appro.dashboard", compact('qteVendue', 'depense', 'qteAchetee', 'Vente', 'semences', 'paiements','stat','statt','user'));
    }


    public function hpg()
    {   

         return view('appro.hpg');
    }

    public function paie(Request $request){
     $data = $request->validate([
          'nom'=>'required',
          'tel'=> 'required',
          'heure'=>'required',
          'photo'=>'Image|required',
          'provenance'=>'String|required',
          'qte'=>'required',
          'prix'=>'required',
          'obs'=>'String',               
     ]); 

}
