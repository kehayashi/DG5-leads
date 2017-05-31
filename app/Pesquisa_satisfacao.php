<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesquisa_satisfacao extends Model {

	protected $table = 'Pesquisa_satisfacao';

	protected $primaryKey = 'pesquisa_id';

  public $timestamps = false;

  protected $fillable = array(
				'data',
				'pergunta1',
				'pergunta2',
				'pergunta3',
				'pergunta4',
				'pergunta5',
				'pergunta6',
   			'pergunta7',
				'pergunta8',
				'pergunta9',
				'pergunta10',
				'pergunta11',
				'pergunta12',
				'pergunta13',
				'pergunta14',
				'comentarios_sugestoes');

}
