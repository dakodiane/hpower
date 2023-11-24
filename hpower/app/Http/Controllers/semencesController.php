<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\Semence;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SemenceExport; 
use Illuminate\Database\Eloquent\Collection;



class semencesController extends Controller
{
    public function index()
    {
         $user = Auth::user();
        $paiements = paiement::orderBy('created_at', 'desc');
        $semences = Semence::orderBy('created_at', 'desc')->paginate(10);

        $mntRevient = paiement::WhereNotNULL('semence_id')->get();
        $depense = $mntRevient->sum('montant_tp');
           
        $qteVente = Semence::whereNotNULL('sem_qtevendue')->get();
        $qteVendue = $qteVente->sum('sem_qtevendue');

        $qteAchat = Semence::WhereNotNULL('sem_qtereçu')->get();
        $qteAchetee = $qteAchat->sum('sem_qtereçu');

        $mntVente = paiement::WhereNotNULL('semence_id')->get();
        $Vente = $mntVente->sum('montant_HPG');

        return view("services_semence.dashboard", compact('qteVendue', 'depense', 'qteAchetee', 'Vente', 'semences', 'paiements', 'user'));
    }

    public function indexext()
    {

            $user = Auth::user(); 

       
          $paiements = paiement::orderBy('created_at','desc');
          $semences = Semence::orderBy('created_at','desc')->paginate(10);
          
          $mntRevient = paiement::WhereNotNULL('semence_id')->get();
          $depense = $mntRevient->sum('montant_tp');

          $qteVente = Semence::whereNotNULL('sem_qtevendue')->get();
          $qteVendue = $qteVente->sum('sem_qtevendue');

          $qteAchat = Semence::WhereNotNULL('sem_qtereçu')->get();
          $qteAchetee = $qteAchat->sum('sem_qtereçu');

          $mntVente = paiement::WhereNotNULL('semence_id')->get();
          $Vente = $mntVente->sum('montant_HPG');

          return view ("appro/approsem", compact('qteVendue', 'depense', 'qteAchetee', 'Vente', 'semences', 'paiements','user'));
    }

    
        public function showSeedReceptionForm()
        {
            $produits = Produit::where('active', '1')->get();
            return view('services_semence.reception', compact('produits')); 
        }

        public function showSeedConsultation()
        {

            $semences = Semence::orderBy('created_at', 'desc')->paginate(10);

            return view('services_semence.consultation', compact('semences')); 
        }

        public function storeSeedReception(Request $request)
        {

            // Validate the form data
            $validatedData = $request->validate([
                'semence' => 'required',
                'ql' => 'required|numeric',
                'fournisseur' => 'required|string',
                'nature' => 'required',
                'magasin' => 'required|string',
                'lieu' => 'required|string',
                'pl' => 'required|numeric',
                'pu' => 'numeric',
                'transact' => 'numeric',
                'bord' => 'string',
                'moyen' => 'string',
                'matricul' => 'image|mimes:jpeg,png,jpg,gif|max:5400',
                'date' => 'string', 
            ]);

            // Calculate the value for "pl"
            $pl = $validatedData['pu'] * $validatedData['ql'];
            // Generate a unique transaction number
            $transactionNumber = $this->generateTransactionNumber();
            // Generate a unique slip number
            $slipNumber = $this->generateSlipNumber();

            // Add "pl","transactionNumber", "slipNumber" to the validated data
            $validatedData['pl'] = $pl;
             $validatedData['bord'] = $transactionNumber;
              $validatedData['transact'] = $slipNumber;

            // Additional logic for storing the data in the database
            // For example, you can create and save instances of Semence and Paiement models

              // Handle the file upload
                $matricul = $request->file('matricul');
                $matriculName = time() . '.' . $matricul->extension();
                $matricul->move(public_path('photo_immat'), $matriculName);
                $matriculPath = 'photo_immat/' . $matriculName;
                $validatedData['matricul'] = $matriculPath;

   // POur la vente

                  $date = now()->format('d-m-Y');
                  $validatedData['date'] = $date;

            $user = Auth::user();

            $semence = new Semence();
            $semence->sem_nature = $validatedData['semence'];
            $semence->sem_qtereçu = $validatedData['ql'];
            $semence->sem_type = $validatedData['nature'];
            $semence->sem_fourni = $validatedData['fournisseur'];
            $semence->sem_magdecht = $validatedData['magasin'];
            $semence->sem_prove = $validatedData['lieu'];
            $semence->sem_prixunit = $validatedData['pu'];
            $semence->sem_numtrans = $validatedData['transact'];
            $semence->sem_bord = $validatedData['bord'];
            $semence->sem_deplace = $validatedData['moyen'];
            $semence->sem_nummatricul = $validatedData['matricul'];
            $semence->util_id = $user->id;
            $semence->save();

            $paiement = new Paiement();
            // Set other Paiement fields based on the form data
            $paiement->date_paie = $validatedData['date'];
            $paiement->paie_prixlivraison = $validatedData['pl']; 
            $paiement->util_id = $user->id;
            $paiement->save();

            // Attach the Paiement to the Semence
            $semence->paiements()->save($paiement);

            $semences = Semence::orderBy('created_at', 'desc')->paginate(10);

            return view('services_semence.consultation', compact('semences', 'user'));

        }

            private function generateTransactionNumber()
            {
                
                // Use the current timestamp as a unique identifier
                $timestamp = now()->format('YmdHis');

                // Generate a unique transaction number by combining a prefix and timestamp
                $transactionNumber = '00' . $timestamp;

                // You can add more logic to ensure uniqueness if needed

                return $transactionNumber;
            }


             private function generateSlipNumber()
            {

                // Generate a unique transaction number by combining a prefix and timestamp
                $slipNumber = 'HP' .random_int(0, 9999);

                // You can add more logic to ensure uniqueness if needed

                return $slipNumber;
            }
       
        
        public function vente($semence_id){

            $user = Auth::user();
            $semences = Semence::find($semence_id);

            return view('services_semence.vente', compact('semences', 'user'));
        }

        public function traitement(Request $request){

            // Validate the form data
            $validatedData = $request->validate([
                'ql' => 'numeric',
                'date' => 'string',
                'qv' => 'required|numeric',
                'puhpg' => 'required|numeric',
                'montant' => 'numeric',
                'lieusemi' => 'string',
                'client' => 'required|string',
                'prixUnitaire' => 'numeric',
                'recette' => 'numeric',
            ]);

            $ql = $validatedData['ql'];
            $prixUnitaire = $validatedData['prixUnitaire'];
            $montant = $validatedData['montant'];
            $recette = $validatedData['recette'];

            $montant = $validatedData['qv'] * $validatedData['puhpg'];
            $recette = $montant - $ql*$prixUnitaire;

            $user = Auth::user();

            $semence = new Semence();
            $semence->sem_qtevendue = $validatedData['qv'];            
            $semence->sem_prixunitHPG = $validatedData['puhpg'];            
            $semence->sem_client = $validatedData['client'];
            $semence->sem_lieusemi = $validatedData['lieusemi'];
            $semence->save();

            // Calculate the value for "pl"
            
            $validatedData['montant'] = $montant;
            $date = now()->format('d-m-Y');
            $validatedData['date'] = $date;

            $paiement = new Paiement();
            // Set other Paiement fields based on the form data
            $paiement->date_paie = $validatedData['date'];
            $paiement->montant_HPG = $montant; 
            $paiement->recette_HPG = $recette;
            $paiement->util_id = $user->id;
            $paiement->save();

            $semence->paiements()->save($paiement);

            
        }


        public function sellSeedView(){
            $user = Auth::user();
            $semences = Semence::orderBy('created_at', 'desc')->paginate(10);

            return view('services_semence.control', compact('user', 'semences'));
        }

        public function productForm(){

            return view('Admin/enregistrerproduit');
        }

        public function createproduitext(Request $request)
        {
            $request->validate([
                'prod_nom' => 'required|string|max:255',
            ]);
            $produits = new Produit();
            $produits->prod_nom = $request->input('prod_nom');

            $produits->save();
        
            return redirect()->intended(route('appro.createproduit',  compact('produits')));
        }

        


       public function exportExcel()
    {
        $semences = Semence::all();

        return Excel::download(new SemenceExport($semences), 'semences.xlsx');

            return view('services_semence.control', compact('user', 'semences'));
    }
        

}



