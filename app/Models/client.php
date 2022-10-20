<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'type',
        'code',
        'password',
        'adresse',
        'ville',
        'siteweb',
        'num_contri',
        'registre',
        'logo',
        'mot_cle',
        'description',
        'domaine_activite',
        'nom',
        'prenom',
        'telephone',
        'email',
        'entreprise',
        'idpays',
        'idcategorie',
        'idcommercial'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function suggestion(){
        return $this->hasMany(suggestion::class);
    }
    public function pays(){
        return $this->belongsTo(pays::class,'idpays');
    }
    public function categorie(){
        return $this->belongsTo(categorie::class,'idcategorie');
    }
    public function commercial(){
        return $this->belongsTo(commerciaux::class,'idcommercial');
    }
}
