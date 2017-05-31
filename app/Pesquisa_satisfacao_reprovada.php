<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesquisa_satisfacao_reprovada extends Model {

	protected $table = 'pesquisa_satisfacao_reprovada';

	protected $primaryKey = 'pesquisa_id';

  public $timestamps = false;

  protected $fillable = array(
				'data',
				'motivo',
				'comentarios_sugestoes');
}
