<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model {

	protected $table = 'contato';

	protected $primaryKey = 'contato_id';

	public $timestamps = false;

	protected $fillable = array(
				'nome',
				'telefone1',
				'telefone2',
				'cargo',
				'email');
}
