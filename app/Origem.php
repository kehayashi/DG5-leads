<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origem extends Model {

	protected $table = 'origem';

	protected $primaryKey = 'origem_id';

	public $timestamps = false;

	protected $fillable = array('descricao');

}
