<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class retour extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'intitule',
        'description',
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
