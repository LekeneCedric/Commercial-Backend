<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'email',
        'telephone',
        'adresse',
        'domaine_activite',
        'dateajout'
    ];
    protected $dates = ['created_at', 'updated_at'];
    
    public function article(){
        return $this->hasMany(article::class);
    }
}
