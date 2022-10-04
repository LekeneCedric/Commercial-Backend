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
        'dateajout',
        'stock_securite',
        'stock_restant',
        'stock_realise',
        'id_fournisseur',
        'id_marque',
        'id_categorie'
    ];
    protected $dates = ['created_at', 'updated_at'];
    
    public function facturedetail(){
        return $this->hasMany(facturedetail::class);
    }
    public function suggestion(){
        return $this->hasMany(suggestion::class);
    }
    public function retour(){
        return $this->hasMany(retour::class);
    }
    public function media(){
        return $this->hasMany(media::class);
    }
    public function categorie(){
        return $this->belongsTo(categorie::class);
    }
    public function fournisseur(){
        return $this->belongsTo(fournisseur::class);
    }
    public function marque(){
        return $this->belongsTo(marque::class);
    }
}
