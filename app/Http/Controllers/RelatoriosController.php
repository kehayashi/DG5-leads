<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RelatoriosController;
use Request;
use DB;
use App\Lead;
use App\Proposta;
use App\Pesquisa_satisfacao;
use App\Pesquisa_satisfacao_reprovada;

Class RelatoriosController extends Controller {

	public function form(){

		$nLeads = DB::table('lead')->count();

		$avgP1 = DB::table('Pesquisa_satisfacao')->avg('pergunta1');
		$avgP2 = DB::table('Pesquisa_satisfacao')->avg('pergunta2');
		$avgP3 = DB::table('Pesquisa_satisfacao')->avg('pergunta3');
		$avgP4 = DB::table('Pesquisa_satisfacao')->avg('pergunta4');
		$avgP5 = DB::table('Pesquisa_satisfacao')->avg('pergunta5');
		$avgP6 = DB::table('Pesquisa_satisfacao')->avg('pergunta6');
		$avgP7 = DB::table('Pesquisa_satisfacao')->avg('pergunta7');
		$avgP8 = DB::table('Pesquisa_satisfacao')->avg('pergunta8');
		$avgP9 = DB::table('Pesquisa_satisfacao')->avg('pergunta9');
		$avgP10 = DB::table('Pesquisa_satisfacao')->avg('pergunta10');
		$avgP11 = DB::table('Pesquisa_satisfacao')->avg('pergunta11');
		$avgP12 = DB::table('Pesquisa_satisfacao')->avg('pergunta12');
		$avgP13 = DB::table('Pesquisa_satisfacao')->avg('pergunta13');

		$total = ($avgP1 + $avgP2 + $avgP3 + $avgP4 + $avgP5 + $avgP6 + $avgP7
		+ $avgP8 + $avgP9 + $avgP10 + $avgP11 + $avgP12 + $avgP13) / 13;

		$mediaGeral = (100 * $total) / 5;

		$npropostas = DB::table('proposta')
					->where('proposta_enviada', '=', 'sim')
					->count('proposta_enviada');

		return view('info_relatorios')
					->with('nleads', $nLeads)
					->with('npropostas', $npropostas)
					->with('mediageral', $mediaGeral);
	}

	public function relatorio_pesquisas(){

		$avgP1 = DB::table('Pesquisa_satisfacao')
					->avg('pergunta1');
		$avgP2 = DB::table('Pesquisa_satisfacao')
					->avg('pergunta2');
		$avgAtendimento = ($avgP1 + $avgP2) / 2;
		$mediaAtendimento = (100 * $avgAtendimento) / 5;

		$avgP3 = DB::table('Pesquisa_satisfacao')
					->avg('pergunta3');
		$avgP4 = DB::table('Pesquisa_satisfacao')
					->avg('pergunta4');
		$avgProfissionais = ($avgP3 + $avgP4) / 2;
		$mediaProfissionais = (100 * $avgProfissionais) / 5;

		$avgP5 = DB::table('Pesquisa_satisfacao')
					->avg('pergunta5');
		$avgP6 = DB::table('Pesquisa_satisfacao')
					->avg('pergunta6');
		$avgServiços = ($avgP5 + $avgP6) / 2;
		$mediaServicos = (100 * $avgServiços) / 5;

		$avgP7 = DB::table('Pesquisa_satisfacao')
					->avg('pergunta7');
		$avgP8 = DB::table('Pesquisa_satisfacao')
					->avg('pergunta8');
		$avgMetodologia = ($avgP7 + $avgP8) / 2;
		$mediaMetodologia = (100 * $avgMetodologia) / 5;

		$avgP9 = DB::table('Pesquisa_satisfacao')
					->avg('pergunta9');
		$avgP10 = DB::table('Pesquisa_satisfacao')
					->avg('pergunta10');
		$avgResultados = ($avgP9 + $avgP10) / 2;
		$mediaResultados = (100 * $avgResultados) / 5;

		$avgP11 = DB::table('Pesquisa_satisfacao')
					->avg('pergunta11');
		$avgP12 = DB::table('Pesquisa_satisfacao')
					->avg('pergunta12');
		$avgSatisfação = ($avgP11 + $avgP12) / 2;
		$mediaSatisfacao = (100 * $avgSatisfação) / 5;

		$countP14 = DB::table('Pesquisa_satisfacao')
					->count('pergunta14');
		$countP14_1 = DB::table('Pesquisa_satisfacao')
					->where('pergunta14', '=', '1')
					->count('pergunta14');
		$avgP14_1 = (100 * $countP14_1) / $countP14;

		$countP14_2 = DB::table('Pesquisa_satisfacao')
					->where('pergunta14', '=', '2')
					->count('pergunta14');
		$avgP14_2 = (100 * $countP14_2) / $countP14;

		$countP14_3 = DB::table('Pesquisa_satisfacao')
					->where('pergunta14', '=', '3')
					->count('pergunta14');
		$avgP14_3 = (100 * $countP14_3) / $countP14;

		$countP14_4 = DB::table('Pesquisa_satisfacao')
					->where('pergunta14', '=', '4')
					->count('pergunta14');
		$avgP14_4 = (100 * $countP14_4) / $countP14;

		$countP14_5 = DB::table('Pesquisa_satisfacao')
					->where('pergunta14', '=', '5')
					->count('pergunta14');
		$avgP14_5 = (100 * $countP14_5) / $countP14;

		$countP14_6 = DB::table('Pesquisa_satisfacao')
					->where('pergunta14', '=', '6')
					->count('pergunta14');
		$avgP14_6 = (100 * $countP14_6) / $countP14;

		$pesquisas = new Pesquisa_satisfacao();
		$pesquisas = DB::table('Pesquisa_satisfacao')
					->select('Pesquisa_satisfacao.*')
					->orderBy('data', 'DESC')
					->get();

		return view('info_relatorios_pesquisa')
					->with('mediaAtendimento', $mediaAtendimento)
					->with('mediaProfissionais', $mediaProfissionais)
					->with('mediaServicos', $mediaServicos)
					->with('mediaMetodologia', $mediaMetodologia)
					->with('mediaResultados', $mediaResultados)
					->with('mediaSatisfacao', $mediaSatisfacao)
					->with('avgP14_1', $avgP14_1)
					->with('avgP14_2', $avgP14_2)
					->with('avgP14_3', $avgP14_3)
					->with('avgP14_4', $avgP14_4)
					->with('avgP14_5', $avgP14_5)
					->with('avgP14_6', $avgP14_6)
					->with('pesquisas', $pesquisas);
	}

	public function relatorio_leads(){
		$lead = Lead::all();

		return view('info_relatorios_leads')
					->with('lead', $lead);
	}

	public function relatorio_propostas_enviadas(){
		$propostas = DB::select('SELECT  nome_empresa, proposta.proposta_id, titulo, data_emissao, situacao,
									SUM(CASE WHEN situacao_item = "Aprovado" THEN valor ELSE 0 END) valor_total_aprovado,
									SUM(valor) valor_total
									FROM proposta, lead, item, proposta_item
									WHERE lead.lead_id = proposta.lead_id
									AND proposta.proposta_id = proposta_item.proposta_id
									AND proposta_item.item_id = item.item_id
									AND proposta.proposta_enviada = "sim"
									GROUP BY nome_empresa, proposta.proposta_id, titulo, data_emissao, situacao');

		$nPropostas = DB::table('proposta')->count();
		$nPropostasAprovadas = DB::table('proposta')
					->where('situacao', '=', 'Aprovada')
					->count('situacao');
		$nPropostasReprovadas = DB::table('proposta')
					->where('situacao', '=', 'Reprovada')
					->count('situacao');

		$percentualAprovadas = ($nPropostasAprovadas * 100) / $nPropostas;
		$percentualReprovadas = ($nPropostasReprovadas * 100) / $nPropostas;

		$comentarios = Pesquisa_satisfacao_reprovada::all();

		return view('info_relatorios_propostas')
					->with('propostas', $propostas)
					->with('aprovadas', $percentualAprovadas)
					->with('reprovadas', $percentualReprovadas)
					->with('comentarios', $comentarios);
	}


}
