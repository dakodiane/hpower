<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings'; // Nom de la table dans la base de données
    protected $primaryKey = 'id_booking'; // Remplacez par le nom de votre colonne de clé primaire

    protected $fillable = [
        'ref_booking',
        'compagnie_maritime',
        'shipper',
        'date_emission' ,
        'nom_navire',
        'port',
        'destination',
        'nombre_cts_20' ,
        'nombre_cts_40' ,
        'nombre_total', 
        'id_client' , 
        'id_user' ,
    ];


    public function chargements()
    {
        return $this->hasMany(Loading::class);
    }

}
