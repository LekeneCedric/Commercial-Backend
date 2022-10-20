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
        'article_id',
        'client_id',
        'commercial_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function commercial(){
        return $this->belongsTo(commercial::class,'commercial_id');
    }
    public function client(){
        return $this->belongsTo(client::class,'client_id');
    }
    public function article(){
        return $this->belongsTo(article::class, 'article_id');
    }
    
}
