<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mercado extends Model {

	protected $table = 'mercado';

	protected $primaryKey = 'mercado_id';

	public $timestamps = false;

	protected $fillable = array('descricao');

}
