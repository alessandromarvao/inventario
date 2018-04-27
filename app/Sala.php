<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = "salas";
	public $incrementing = "false";
	public $timestamps = "false";
	protected $fillable = [
		'id',
		'sala',
		'predio'
	];

	public function itens(){
		return $this->hasMany('App\Item');
	}
}
