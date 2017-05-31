<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto_lead extends Model {

	protected $table = 'produto_lead';

	protected $primaryKey = 'produto_lead_id';

	public $timestamps = false;

	protected $fillable = array('descricao');

}
