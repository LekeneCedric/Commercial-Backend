<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'idparent',
        'titre',
        'lien',
        'ordre'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function categorie(){
        return $this->hasMany(categorie::class);
    }
}
