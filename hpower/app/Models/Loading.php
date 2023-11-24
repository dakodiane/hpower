<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Loading extends Model
{
    use Notifiable;
    protected $table = 'loadings';
    protected $primaryKey = 'id_loading';
    protected $fillable = [
        'nom_enleveur',
        'produit',
        'lieu_chargement',
        'id_booking',  
        'nombre_sac',
        'num_cts',
        'num_seal',
        'poids_cts_charge',
        'poids_cts_vide',
        'poids_cts_net',
        'poids_vgm',
        'date_chargement',
        'date_port',
        'ticket_container',
        'ticket_2',
    ];
    
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }
    
    public function isEmpty()
    {
        return $this->count() === 0;
    }
		
    public function user()
    {
        return $this->belongsTo(User::class);
    }
		
		
				
		
		
			
		
		
		
		


    public function chargements()
    {
        return $this->hasMany(Loading::class);
    }

}
