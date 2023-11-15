<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loading extends Model
{
    protected $table = 'loadings';
    protected $primaryKey = 'id_loading'; 

    protected $fillable = [
        'nom_enleveur',
        'produit',
        'id_booking ',
        'nombre_sac' ,
        'num_cts	',
        'num_seal',
        'poids_cts_charge',
        'nombre_cts_20' ,
        'nombre_cts_40' ,
        'nombre_total', 
        'poids_cts_vide' , 
        'poids_cts_net' ,
        'poids_vgm' ,
        'date_chargement' ,
        'date_port' ,
        'ticket_container' ,
        'ticket_2' ,
    ];
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
		
	
		
		
				
		
		
			
		
		
		
		


    public function chargements()
    {
        return $this->hasMany(Loading::class);
    }

}
