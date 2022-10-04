<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suggestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'intitule',
        'description',
        'ancien_prix',
        'prix_suggere',
        'id_article',
        'id_client',
        'id_commercial'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function commercial(){
        return $this->belongsTo(commercial::class);
    }
    public function client(){
        return $this->belongsTo(client::class);
    }
    public function article(){
        return $this->belongsTo(article::class);
    }
}
