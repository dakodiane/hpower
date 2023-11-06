<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class camions extends Model
{
   
    protected $table = 'camions';
   

    protected $fillable = [
        'num_bordereau',
        'cam_nomchauf',
        'type_produit',
        'heure_depart',
        'observation',
        'poids_vide',
        'poids_charge',
        'poids_net',
        'cam_photo',
        'statut_dechargement',
        'nombre_sac',
        'ville_depart',
        'name_fourni',
    ];
    
}

