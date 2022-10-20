<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ficheSortie extends Model
{
	use HasFactory;
	protected $fillable=[
		'id',
		'idcommercial',
		'idarticle',
		'quantite'
	];
	protected $date = ['created_at','updated_at'];

	public function article(){
        	return $this->belongsTo(article::class,'idarticle');
	}
}
