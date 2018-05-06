<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'predio'
    ];

    public function salas(){
        return $this->hasMany('App\Sala');
    }
}
