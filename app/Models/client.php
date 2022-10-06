<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'entreprise',
        'commercial_id'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function facture(){
        return $this->hasMany(facture::class);
    }
    public function commercial(){
        return $this->belongsTo(commercial::class,'commercial_id');
    }
    public function suggestion(){
        return $this->hasMany(suggestion::class);
    }
    public function retour(){
        return $this->hasMany(retour::class);
    }
}
