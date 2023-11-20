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
        "date_paie",
        "paie_prixlivraison",
        "prix_tp",
        "prix_HPG",
        "montant_tp",
        "montant_HPG",
        "prod_magasin",
        "prod_lieuprod",
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'util_id');
    }
}
