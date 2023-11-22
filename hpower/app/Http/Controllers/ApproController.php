<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Approvisionnement;
use App\Models\Produit;
use App\Models\paiement;
use App\Models\Semence;
use App\Models\Camion;
use App\Models\Fournisseur;
use App\Models\Transport;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
          $user = Auth::user();
         return view('appro.hpg', compact('user'));
    }

    public function paie(Request $request){
     $user = Auth::user();

      $data = $request->all();
     $data = $request->validate([
          'nom'=>'required',
          'tel'=> 'required',
          'heure'=>'required',
          'image'=>'required|Image|mimes:jpeg,png,jpg,gif|max:5120',
          'provenance'=>'String|required',
          'qte'=>'required',
          'prix'=>'required',
          'obs'=>'String',               
     ]); 

     // $path = request('image')->store('images');    

     $newApro = new Approvisionnement();

     $newApro->cam_nomchauf=$request->nom;
     $newApro->tel_conducteur=$request->tel;
     $newApro->heure_arrive=$request->heure;
     $data['provenance'] = $user->ville;
     $newApro->provenance=$request->provenance;
     $newApro->qte_charge=$request->qte;
     $newApro->prix_cession=$request->prix;
     $newApro->observation=$request->obs;

     $image = $request->file('image');
     $imageName = time() . '.' . $image->extension();
     $image->move(public_path('photo_immat'),$imageName);
     $newApro->num_immatriculation = $request->image;

     $lastAppro = Approvisionnement::orderBy('appro_id', 'desc')->first();
     if ($lastAppro) {
         $lastNumBordereau = $lastAppro->num_bordereau;
         $lastNumBordereau = substr($lastNumBordereau, 2);
         $newNumBordereau = 'HP' . str_pad(($lastNumBordereau + 1), 4, '0', STR_PAD_LEFT);
     } else {
         $newNumBordereau = 'HP0001';
     }
     $data['num_bordereau'] = $newNumBordereau;

     
     // Approvisionnement::where('appro_id', $appro_id)->update([
     //      'cam_photo'=>$imageName,
     // ]);    
          $newApro->fill($data);     
        $res = $newApro->save();

           if($res){
             return redirect()->route('affichage');
           }else{
                return back()->with('fail','Erreur');
          }

      }
}
