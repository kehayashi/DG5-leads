<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model {

	protected $table = 'equipe';

	protected $primaryKey = 'equipe_id';

	public $timestamps = false;

	protected $fillable = array(
				'nome',
				'sobrenome',
				'email',
				'telefone',
				'cargo',
				'senha');
}
