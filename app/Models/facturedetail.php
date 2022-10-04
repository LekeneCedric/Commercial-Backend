<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturedetail extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'quantite',
        'prixUnitaire',
        'total',
        'id_facture',
        'id_article'
    ];

    protected $dates = ['created_at', 'updated_at'];
    public function article(){
        return $this->belongsTo(article::class);
    }
    public function facture(){
        return $this->belongsTo(facture::class);
    }

}
