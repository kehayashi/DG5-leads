<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peca extends Model {

	protected $table = 'peca';

	protected $primaryKey = 'peca_id';

	public $timestamps = false;

	protected $fillable = array('produto_lead_id', 'descricao', 'valor');

}
