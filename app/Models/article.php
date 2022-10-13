<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'titre',
        'reference',
        'quantite',
        'description',
        'prix',
        'prix_achat',
        'stockable',
        'isnouveau',
        'stock_min',
        'stock_minb',
        'stock_rea',
        'stock_res',
        'idrayon',
        'idmarque',
        'idfournisseur',
        'idcategorie',
    ];
    protected $dates = ['created_at', 'updated_at'];
    
    public function fournisseur(){
        return $this->belongsTo(fournisseur::class,'idfournisseur');
    }
    public function marque(){
        return $this->belongsTo(marque::class,'idmarque');
    }
    public function categorie(){
        return $this->belongsTo(categorie::class,'idcategorie');
    }
    public function rayon(){
        return $this->belongsTo(rayon::class,'idrayon');
    }
}
