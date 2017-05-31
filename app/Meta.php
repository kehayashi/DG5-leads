<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model {


	protected $table = 'meta';

	protected $primaryKey = 'meta_id';

	public $timestamps = false;

	protected $fillable = array('equipe_id', 'meta', 'data_inicio', 'data_fim');

}
