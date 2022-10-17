<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'email',
        'telephone',
        'adresse',
        'domaine_activite',
        'dateajout'
    ];
    
    public function article(){
        return $this->hasMany(article::class,'idfournisseur');
    }
}
