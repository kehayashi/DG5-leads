<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	protected $table = 'item';

	protected $primaryKey = 'item_id';

	public $timestamps = false;

	protected $fillable = array(
				'produto_lead_id',
				'peca_id',
				'descricao',
				'valor',
				'situacao_item',
				'prazo');
}
