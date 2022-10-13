<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bon_commande extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'num_bon',
        'delai',
        'envoye',
        'montant_totalHT',
        'montant_totalTT',
        'description',
        'isvalider',
        'isvalider1',
        'isvalider2',
        'motif',
        'motif1',
        'motif2',
        'idutilisateur',
        'idclient',
        'id_mode_reglement',
        'idcondition',
        'idmonnaie',
        'idagence'
    ];
    protected $dates = ['created_at','updated_at'];

    public function utilisateur(){
        return $this->belongsTo(utilisateur::class,'idutilisateur');
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
    public function monnaie(){
        return $this->belongsTo(monnaie::class,'idmonnaie');
    }
    public function agence(){
        return $this->belongsTo(agence::class,'idagence');
    }
}
