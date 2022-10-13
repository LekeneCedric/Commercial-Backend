<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bon_livraison extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'description',
        'total',
        'statut',
        'motif',
        'isvalider',
        'isvalider1',
        'motif1',
        'isvalider1',
        'motif1',
        'idutilisateur',
        'idclient',
        'id_bon_commande'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function utlisateur(){
        return $this->belongsTo(utilisateur::class,'idutilisateur');
    }
    public function client(){
        return $this->belongsTo(client::class,'idclient');
    }
    public function bon_commande(){
        return $this->belongsTo(bon_commande::class,'id_bon_commande');
    }
}
