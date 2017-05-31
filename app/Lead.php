<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model {

	protected $table = 'lead';

	protected $primaryKey = 'lead_id';

	public $timestamps = false;

	protected $fillable = array(
				'equipe_id',
				'origem_id',
				'mercado_id',
				'produto_lead_id',
				'venda_id',
				'rede_social_id',
				'rede_social_endereco',
				'nome_empresa',
				'CNPJ_CPF',
				'telefone1_empresa',
				'telefone2_empresa',
				'site',
				'rua',
				'logradouro',
				'complemento',
				'pais',
				'estado',
				'cidade',
				'CEP',
				'data_entrada',
				'data_ultima_atualizacao',
				'observacoes',
				'etapa_atual',
				'filtro1',
				'filtro2');
}
