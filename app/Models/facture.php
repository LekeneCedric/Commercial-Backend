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
        'lieu',
        'delaipayement',
        'commercial_id',
        'client_id'
        
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function facturedetail(){
        return $this->hasMany(facturedetail::class);
    }
    public function commercial(){
        return $this->belongsTo(commercial::class,'commercial_id');
    }
    public function client(){
        return $this->belongsTo(client::class,'client_id');
    }
}
