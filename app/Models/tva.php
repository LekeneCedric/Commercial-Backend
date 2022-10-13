<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tva extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'valeur',
        'idpays'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function pays(){
        return $this->belongsTo(Pays::class,'idpays');
    }
}
