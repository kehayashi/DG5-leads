<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model {

	protected $table = 'agenda';

	protected $primaryKey = 'agenda_id';

	public $timestamps = false;

	protected $fillable = array(
				'lead_id',
				'equipe_id',
				'data_inicio',
				'data_fim',
				'hora_inicio',
				'hora_fim',
				'titulo',
        'descricao',
        'cor',
				'tipo_plataforma',
				'numero_evento'
      );
}
