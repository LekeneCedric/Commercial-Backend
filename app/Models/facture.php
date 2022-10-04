<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'etat',
        'description',
        'lieu',
        'delaipayement',
        'id_commercial',
        'id_client'
        
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function facturedetail(){
        return $this->hasMany(facturedetail::class);
    }
    public function commercial(){
        return $this->belongsTo(commercial::class);
    }
    public function client(){
        return $this->belongsTo(client::class);
    }
}
