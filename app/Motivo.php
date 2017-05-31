<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model {

	protected $table = 'Motivo';

	protected $primaryKey = 'motivo_id';

	public $timestamps = false;

	protected $fillable = array('descricao');

}
