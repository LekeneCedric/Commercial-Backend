<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class retour extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'intitule',
        'description',
        'idclient',
        'id_facture',
        'idutilisateur'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function client(){
        return $this->belongsTo(client::class,'idclient');
    }
    public function facture(){
        return $this->belongsTo(facture::class,'id_facture');
    }
    public function utilisateur(){
        return $this->belongsTo(utilisateur::class,'idutilisateur');
    }
}
