<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semence extends Model
{
    protected $table = 'semences'; // Nom de la table dans la base de données
    protected $primaryKey = 'semence_id'; // Remplacez par le nom de votre colonne de clé primaire

    protected $fillable = [
        'sem_numtrans',
        'numerodebord',
        'sem_nummatricul',
        'sem_client',
        'sem_type',
        'sem_qtereçu',
        'sem_qtevendue',
        'sem_prixunitHPG',
        'sem_lieusemi',
        'util_id',
        'sem_magdecht',
        'sem_nature',
        'sem_deplace',
        'sem_bord',
        'sem_prove',
        'sem_fourni',
        'statut_paiement',
        'created_at',
        'updated_at',
        'sem_prixunit',
        
    ];


            // Dans le modèle Camion
       // Dans le modèle Semence
            public function paiements()
            {
                return $this->hasMany(Paiement::class, 'semence_id');
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
        return $this->count() === 0;
    }

}
