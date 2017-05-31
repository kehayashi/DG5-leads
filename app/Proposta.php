<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposta extends Model {

	protected $table = 'proposta';

	protected $primaryKey = 'proposta_id';

	public $timestamps = false;

	protected $fillable = array(
				'lead_id',
				'contato_id',
				'equipe_id',
				'data_emissao',
				'validade',
		 		'titulo',
			  'introducao',
				'observacoes',
				'situacao',
				'motivo_id');
}
