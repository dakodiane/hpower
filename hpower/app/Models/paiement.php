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
        'prix_unit',
        'qte_totale',
         'prix_total',
        'cam_id',
        'date_paiement',
        'created_at',
        'updated_at',
        'recette_HPG',
        'solde',
       'entrep_benef',
       'net_paye',
       'rest_paie',
        'paietotal',
        'statut_paie',
        'date_paie',
        "paie_prixlivraison",
        "prix_tp",
        "prix_HPG",
        "montant_tp",
        "montant_HPG",
        "prod_magasin",
        "prod_lieuprod",
    ];
}
