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
        'idrole',   
        'idagence'
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    public function role(){
        return $this->belongsTo(role::class,'idrole');
    }
    public function agence(){
        return $this->belongsTo(agence::class,'idagence');
    }
    
}
