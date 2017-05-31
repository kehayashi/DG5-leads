<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PropostaController;
use App\Lead;
use App\Equipe;
use App\Produto_lead;
use App\Peca;
use App\Motivo;
use App\Proposta;
use App\Item;
use Session;
use DB;
use Request;
use Auth;
use App\Http\Requests\PropostaRequest;

Class PropostaController extends Controller {

	public function form() {
		$equipe = new Equipe();
		$equipe = Equipe::all();

		$produto_lead = new Produto_lead();
		$produto_lead = Produto_lead::all();

		$peca = new Peca();
		$peca = Peca::all();

		$motivo = new Motivo();
		$motivo = Motivo::all();

		return view('form_cadastro_proposta')
					->with('equipe', $equipe)
					->with('produto_lead', $produto_lead)
					->with('peca', $peca)
					->with('motivo', $motivo);
	}

	public function cadastraProposta(PropostaRequest $request) {
		DB::beginTransaction();

		Proposta::create($request->all());

		$proposta = new Proposta();
		$proposta = Proposta::all();
		$idproposta = $proposta->last()->proposta_id;

		$nItens = count($request->item);
		for ($i=0; $i < $nItens; $i++) {
			$item = new Item();
			$item->produto_lead_id = $request->produto_lead_id[$i];
			$item->peca_id = $request->peca_id[$i];
			$item->item = $request->item[$i];
			$item->descricao = $request->descricao[$i];
			$item->valor = $request->valor[$i];
			$item->situacao_item = $request->situacao_item[$i];
			$item->prazo = $request->prazo[$i];
			$item->save();

			$item = new Item();
			$item = Item::all();
			$iditem = $item->last()->item_id;

			DB::table('proposta_item')
						->insert(['proposta_id' => $idproposta, 'item_id' => $iditem]);

			$item2 = new Item();
			$item2 = Item::find($iditem);


			DB::table('peca_item')
						->insert(['peca_id' => $item2->peca_id, 'item_id' => $item2->item_id]);
		}

		DB::commit();

		return redirect('/proposta/lista')
					->withInput();

	}

	public function info(){
		$proposta = DB::select('SELECT  nome_empresa, proposta.proposta_id, titulo, data_emissao, situacao, proposta.proposta_enviada, proposta.pesquisa_enviada,
									SUM(CASE WHEN situacao_item = "Aprovado" THEN valor ELSE 0 END) valor_total_aprovado,
									SUM(valor) valor_total
									FROM proposta, lead, item, proposta_item
									WHERE lead.lead_id = proposta.lead_id
									AND proposta.proposta_id = proposta_item.proposta_id
									AND proposta_item.item_id = item.item_id
									GROUP BY nome_empresa, proposta.proposta_id, titulo, data_emissao, situacao, proposta.proposta_enviada, proposta.pesquisa_enviada');

		return view('lista_propostas')
					->with('proposta', $proposta);
	}

}
