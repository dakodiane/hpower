<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $table = 'paiements'; 
    protected $primaryKey = 'paie_id';

    protected $fillable = [
<<<<<<< HEAD
        "date_paie",
        "paie_prixlivraison",
        "prix_tp",
        "prix_HPG",
        "montant_tp",
        "montant_HPG",
        "prod_magasin",
        "prod_lieuprod",
=======

>>>>>>> 814d4ebd83954415d7a7fa788be83c7d4c94fd2f
        'prix_unit',
        'qte_totale',
         'prix_total',
        'cam_id',
        'date_paiement',
        'created_at',
        'updated_at',
        'prix_tp',
        'prix_HPG',
        'montant_tp',
        'montant_HPG',
        'recette_HPG',
        'solde',
       'entrep_benef',
       'net_paye',
       'rest_paie',
        'paietotal',
        'statut_paie',
<<<<<<< HEAD
        'paie_prixlivraison',
        'prod_magasin',
        'prod_lieuprod',        
       
=======
        'date_paie',
        "paie_prixlivraison",
        "prod_magasin",
        "prod_lieuprod",

>>>>>>> 814d4ebd83954415d7a7fa788be83c7d4c94fd2f
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'util_id');
    }
}
