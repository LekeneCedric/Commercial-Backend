<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'id',
        'filePath',
        'extension',
        'fileName',
        'id_article',
        'id_client',
        'id_utilisateur'

    ];
}
