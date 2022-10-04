<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commercial extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'email',
        'phone',
        'id_user'
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function client(){
        return $this->hasMany(client::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
    public function suggestion(){
        return $this->hasMany(suggestion::class);
    }
    public function retour(){
        return $this->hasMany(retour::class);
    }
}
