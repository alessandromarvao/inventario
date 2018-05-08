<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'sala',
		'predio',
		'visitada_em'
	];

	public function itens(){
		return $this->hasMany('App\Item');
	}

	public function predio(){
		return $this->belongsTo('App\Predio');
	}
}
