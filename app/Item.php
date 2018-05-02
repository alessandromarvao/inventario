<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
		protected $table = "itens";
		public $incrementing = false;
		public $timestamps = false;
		protected $fillable = [
			'id',
			'tombamento',
			'origem',
			'descricao',
			'num_serie',
			'elemento_despesa',
			'empenho',
			'ug_empenho',
			'data_entrada',
			'nota_fiscal',
			'data_nf',
			'valor_inicial',
			'valor_contabil',
			'situacao',
			'estado',
			'responsavel',
			'carga_contabil',
			'status'
		];

		public function sala(){
			return $this->belongsTo('App\Sala');
		}
}
