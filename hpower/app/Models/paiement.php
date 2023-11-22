<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $table = 'paiement'; 
    protected $primaryKey = 'paie_id';

    protected $fillable = [
        "paie_prixlivraison",
        "prix_tp",
        "prix_HPG",
        "montant_tp",
        "montant_HPG",
        "prod_magasin",
        "prod_lieuprod",
    ];
}
