<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prospect extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'type',
        'nom',
        'email',
        'password',
        'telephone',
        'adresse',
        'siteweb',
        'etat',
        'evenement',
        'num_contri',
        'registre',
        'isclient',
        'idpays',
        'idcategorie',
        'idprospecteur'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function pays(){
        return $this->belongsTo(pays::class,'idpays');
    }

    public function categorie(){
        return $this->belongsTo(categorie::class,'idcategorie');
    }

    public function prospecteur(){
        return $this->belongsTo(prospecteur::class,'idprospecteur');
    }
    
}
