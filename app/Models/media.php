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
        'article_id',
        'client_id',
        'utilisateur_id'
    ];
}
