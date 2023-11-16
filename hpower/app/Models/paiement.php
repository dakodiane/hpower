<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paiement extends Model
{
    protected $table = 'paiements'; // Nom de la table dans la base de données
    protected $primaryKey = 'paie_id'; // Remplacez par le nom de votre colonne de clé primaire

    protected $fillable = [
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
    ];

}



