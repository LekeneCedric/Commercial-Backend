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
        'menu_id'
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    
    public function menu(){
        return $this->belongsTo(menu::class,'menu_id');
    }
}
