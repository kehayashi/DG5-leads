<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead_Contato extends Model {

	protected $table = 'lead_contato';

	public $timestamps = false;

	protected $fillable = array(
				'lead_id',
				'contato_id');
}
