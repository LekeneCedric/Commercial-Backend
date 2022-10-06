<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commercial extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'commission',
        'user_id'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function facture(){
        return $this->hasMany(facture::class);
    }
    public function client(){
        return $this->hasMany(client::class);
    }
    public function utilisateur(){
        return $this->belongsTo(utilisateur::class,'user_id');
    }
    public function suggestion(){
        return $this->hasMany(suggestion::class);
    }
    public function retour(){
        return $this->hasMany(retour::class);
    }
}
