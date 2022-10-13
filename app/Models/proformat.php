<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proformat extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'remise',
        'envoye',
        'montant_totalHT',
        'montant_totalHTA',
        'montant_totalTT',
        'montant_remise',
        'montant_tva',
        'description',
        'lieu_livraison',
        'delai_livraison',
        'idutilisateur',
        'idagence',
        'idclient',
        'id_mode_reglement',
        'idcondition',
        'idtva',
        'idmonnaie'
    ];
    protected $dates = ['created_at', 'updated_at'];
    
    public function utilisateur(){
        return $this->belongsTo(utilisateur::class,'idutilisateur');
    }
    public function agence(){
        return $this->belongsTo(agence::class,'idagence');
    }
    public function client(){
        return $this->belongsTo(client::class,'idclient');
    }
    public function mode_reglement(){
        return $this->belongsTo(mode_reglement::class,'id_mode_reglement');
    }
    public function condition(){
        return $this->belongsTo(condition::class,'idcondition');
    }
    public function tva(){
        return $this->belongsTo(tva::class,'idtva');
    }
    public function monnaie(){
        return $this->belongsTo(monnaie::class,'idmonnaie');
    }
}
