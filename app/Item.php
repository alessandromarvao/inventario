<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
		protected $table = "itens";
		public $timestamps = false;
		protected $fillable = [
			'id',
			'descricao',
			'descricao_sugerida',
			'inventario',
			'tombamento',
			'num_serie',
			'valor_inicial',
			'valor_contabil',
			'estado',
			'responsavel',
			'particular',
			'localizado',
			'observacao'
		];

		public function sala(){
			return $this->belongsTo('App\Sala');
		}
}
