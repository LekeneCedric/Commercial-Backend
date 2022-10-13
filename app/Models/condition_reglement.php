<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class condition_reglement extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'intitule',
        'duree',
        'frequence',
        'id_agent'
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function agent(){
        return $this->belongsTo(Agent::class,'id_agent');
    }
}
