<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prospecteur extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'nom',
        'prenom',
        'telephone',
        'adresse',
        'email'
    ];
    protected $dates = ['created_at','updated_at'];
}
