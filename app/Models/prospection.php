<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prospection extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nomPdv',
        'nom',
        'telephone',
        'categorie',
        'quartier',
        'zone',
        'zone',
        'observations',
        'idcommerciaux',
    ];
    protected $dates = ['created_at', 'updated_at'];
}
