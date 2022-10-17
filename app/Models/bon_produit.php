<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bon_produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_bon_commande',
        'id_bon_livraison',
        'iddevis',
        'idretour',
        'idfacture',
        'idproduit',
        'idservice',
        'idsortiem',
        'unite',
        'quantite',
        'prix_unitaire',
        'remise',
        'total',
        'tva',
        'total_tt',
        'quantite_livree',
        'observations',
        'dateajout'
    ];
    public $timestamps = false;

    public function article(){
        return $this->belongsTo(article::class,'idproduit');
    }
}
