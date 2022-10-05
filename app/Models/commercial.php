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
        'commission',
        'id_user'
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function facture(){
        return $this->hasMany(facture::class);
    }
    public function client(){
        return $this->hasMany(client::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function suggestion(){
        return $this->hasMany(suggestion::class);
    }
    public function retour(){
        return $this->hasMany(retour::class);
    }
}
