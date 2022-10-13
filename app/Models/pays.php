<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pays extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'code',
        'alpha2',
        'alpha3',
        'nom_en_gb',
        'intitule',
        'tva'
    ];
    protected $dates=['created_at', 'updated_at'];
}
