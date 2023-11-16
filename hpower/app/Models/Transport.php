<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $table = 'transports';
    protected $primaryKey = 'transport_id';

    protected $fillable = [
        'num_bordereau',
        'numerodebord',
        'num_immatriculation',
        'cam_nomchauf',
        'type_produit',
        'heure_depart', // Si ce champ existe dans votre base de données
        'heure_arrive',
        'observation',
        'observation1',
        'poids_vide',
        'poids_charge',
        'poids_net',
        'avance_recue',
        'solde', // Si ce champ existe dans votre base de données
        'cam_photo',
        'cam_photo1',
        'cam_photo2',
        'provenance',
        'destination',
        'util_id',
        'statut_dechargement',
        'nombre_sac',
        'statut_paiement',
        'tel_conducteur',
        'nombre_sacs',
        'bordereauchargement',
        'avancepaye',
        'entreprise_benef',
        'qte_charge',
    ];
    

    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'transport_id');
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'util_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isEmpty()
    {
        return !$this->exists;
    }
}
