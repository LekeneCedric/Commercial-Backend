<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class utilisateur extends Model
{
    use HasFactory,Notifiable,HasApiTokens;

    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'email',
        'password',
        'telephone',
        'date_enregistrement',
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    public function commercial(){
        return $this->hasOne(commercial::class);
    }
    
    public function media(){
        return $this->hasMany(media::class);
    }
}
