<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rede_social extends Model {

	protected $table = 'rede_social';

	protected $primaryKey = 'rede_social_id';

	public $timestamps = false;

	protected $fillable = array(
				'lead_id',
				'descricao',
				'endereco');
}
