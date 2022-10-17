<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'titre',
        'menu',
        'idparent'
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    public function article(){
        return $this->hasMany(article::class,'idcategorie');
    }

}
