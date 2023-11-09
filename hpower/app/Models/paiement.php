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
        'util_id',
        'cam_id',
        'date_paiement',
        'created_at',
        'updated_at',
        'Prix_SIPI',
        'Prix_HPG',
        'Montant_SIPI',
        'Montant_HPG',
        'Recette_HPG',
    ];

}
