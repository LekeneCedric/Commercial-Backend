<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commerciaux extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'nom',
        'prenom',
        'email',
        'telephone',
        'idagence',
        'idutilisateur'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function agence(){
        return $this->belongsTo(agence::class,'idagence');
    }
    public function utilisateur(){
        return $this->belongsTo(utilisateur::class,'idutilisateur');
    }
}
