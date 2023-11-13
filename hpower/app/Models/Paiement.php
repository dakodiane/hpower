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
        "prod_nom",
        "prod_qtelivree",
        "prod_qtevendue",
        "prod_nat",
        "prod_magasin",
        "prod_lieuprod",
    ];
}
