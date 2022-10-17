<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'remise',
        'etat',
        'montant_totalHT',
        'montant_totalTT',
        'montant_tva',
        'montant_autre',
        'montant_remise',
        'description',
        'dateenvoie',
        'lieu_livraison',
        'delai_paiement',
        'idproformat',
        'id_bon_livraison',
        'id_bon_commande',
        'idclient',
        'id_mode_reglement',
        'idmonnaie',
        'idtva',
        'idcommerciaux',
        'idutilisateur',
        'idagence'
        
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function proformat(){
        return $this->belongsTo(Proformat::class,'idproformat');
    }
    public function bon_livraison(){
        return $this->belongsTo(bon_livraison::class,'id_bon_livraison');
    }
    public function bon_commande(){
        return $this->belongsTo(bon_commande::class,'id_bon_commande');
    }
    public function client(){
        return $this->belongsTo(client::class,'idclient');
    }
    public function mode_reglement(){
        return $this->belongsTo(mode_reglement::class,'id_mode_reglement');
    }
    public function monnaie(){
        return $this->belongsTo(monnaie::class,'id_monnaie');
    }
    public function tva(){
        return $this->belongsTo(tva::class,'idtva');
    }
    public function commerciaux(){
        return $this->belongsTo(commerciaux::class,'idcommerciaux');
    }
    public function utilisateur(){
        return $this->belongsTo(utilisateur::class,'idutilisateur');
    }
    public function agence(){
        return $this->belongsTo(agence::class,'idagence');
    }
    
}
