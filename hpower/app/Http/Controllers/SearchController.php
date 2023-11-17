<?php

namespace App\Http\Controllers;
use App\Models\Camion;
namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Transport;
use App\Models\paiement;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
{
    
    public function search(Request $request)
    {
        $user = Auth::user();
        // Récupérez le terme de recherche depuis la requête
        $searchTerm = $request->input('search');

        // Exemple de recherche sur le nom du chauffeur
        $results = Transport::where('cam_nomchauf', 'like', '%' . $searchTerm . '%')->get();

        // Vous pouvez ajouter des conditions supplémentaires pour d'autres critères de recherche

        // Retournez les résultats sous forme de réponse JSON
        return response()->json($results);
    }


}
