<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    protected $table = 'camions'; // Nom de la table dans la base de données
    protected $primaryKey = 'cam_id'; // Remplacez par le nom de votre colonne de clé primaire

    protected $fillable = [
        'num_bordereau',
        'num_immatriculation',
        'cam_nomchauf',
        'type_produit',
        'heure_depart',
        'heure_arrive',
        'observation',
        'observation1',
        'poids_vide',
        'poids_charge',
        'poids_net',
        'prix_CIPI',
        'prix_HPG',
        'avance_recue',
        'solde',
        'cam_photo',
        'cam_photo1',
        'provenance',
        'destination',
        'util_id',
        'statut_dechargement',
        'nombre_sac',
        'statut_paiement',
        'tel_conducteur',
    ];


            // Dans le modèle Camion
        public function paiements()
        {
            return $this->hasMany(Paiement::class, 'cam_id');
        }


}
