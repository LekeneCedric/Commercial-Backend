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
        'facture_id',
        'article_id'
    ];

    protected $dates = ['created_at', 'updated_at'];
    public function article(){
        return $this->belongsTo(article::class, 'article_id');
    }
    public function facture(){
        return $this->belongsTo(facture::class,'facture_id');
    }

}
