<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mode_reglement extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'intitule'
    ];
    protected $dates = ['created_at', 'updated_at'];
}
