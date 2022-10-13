<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monnaie extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'intitule',
        'sigle'
    ];

    protected $dates = ['created_at', 'updated_at'];
}
