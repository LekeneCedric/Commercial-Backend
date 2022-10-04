<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marque extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'logo'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function article(){
        return $this->hasMany(article::class);
    }
}
