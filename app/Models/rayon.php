<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rayon extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'id',
        'intitule'
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function article(){
        return $this->hasMany(article::class);
    }
}

