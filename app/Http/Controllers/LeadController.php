<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LeadController;
use App\Origem;
use App\Mercado;
use App\Produto_lead;
use App\Equipe;
use App\Contato;
use App\Timeline;
use App\Lead_Contato;
use App\Rede_social;
use App\Http\Requests\LeadRequest;
use App\Http\Requests\ContatoRequest;
use App\Lead;
use Session;
use DB;
use Request;
use Auth;

Class LeadController extends Controller {

	public function form(){
		$origem = new Origem();
		$origem = Origem::all();

		$mercado = new Mercado();
		$mercado = Mercado::all();

		$produto_lead = new Produto_lead();
		$produto_lead = Produto_lead::all();

		$equipe = new Equipe();
		$equipe = Equipe::All();

		$rede_social = new Rede_social();
		$rede_social = Rede_social::all();

		$equipe = Equipe::All();

		return view('form_cadastro_lead')
					->with('origem', $origem)
					->with('mercado', $mercado)
					->with('produto', $produto_lead)
					->with('equipe', $equipe)
					->with('rede_social', $rede_social);
	}

	public function cadastraLead(LeadRequest $request) {
		DB::beginTransaction();

		date_default_timezone_set('America/Sao_Paulo');

		$data_entrada = date('Y-m-d');
		$etapa_atual = 'entrada';

		$lead = new Lead();
		$lead->equipe_id = $request->equipe_id;
		$lead->origem_id = $request->origem_id;
		$lead->mercado_id = $request->mercado_id;
		$lead->produto_lead_id = $request->produto_lead_id;
		$lead->nome_empresa = $request->nome_empresa;
		$lead->CNPJ_CPF = $request->CNPJ_CPF;
		$lead->telefone1_empresa = $request->telefone1_empresa;
		$lead->telefone2_empresa = $request->telefone2_empresa;
		$lead->site = $request->site;
		$lead->rede_social_id = $request->rede_social_id;
		$lead->rede_social_endereco = $request->rede_social_endereco;
		$lead->rua = $request->rua;
		$lead->logradouro = $request->logradouro;
		$lead->complemento = $request->complemento;
		$lead->pais = $request->pais;
		$lead->estado = $request->estado;
		$lead->cidade = $request->cidade;
		$lead->cep = $request->cep;
		$lead->data_entrada = $data_entrada;
		$lead->data_ultima_atualizacao = $data_entrada;
		$lead->observacoes = $request->observacoes;
		$lead->etapa_atual = 'entrada';
		$lead->filtro1 = 'null';
		$lead->filtro2 = 'null';
		$lead->save();

		$lead = Lead::all();
		$idLead = $lead->last()->lead_id;

		$ncontatos = count($request->nome_contato);

		for ($i=0; $i < $ncontatos; $i++) {
			$contato = new Contato();
			$contato->nome =  $request->nome_contato[$i];
			$contato->telefone1 = $request->telefone1_contato[$i];
			$contato->telefone2 = $request->telefone2_contato[$i];
			$contato->cargo = $request->cargo_contato[$i];
			$contato->email = $request->email_contato[$i];
			$contato->save();

			$contato = Contato::all();
			$idContato = $contato->last()->contato_id;

			$lead_contato = new Lead_Contato();
			$lead_contato->lead_id = $idLead;
			$lead_contato->contato_id = $idContato;
			$lead_contato->save();

		}

		DB::commit();

		return redirect('/lead')
					->withInput();

	}

	public function lista(){
		$lead = Lead::all();

		$leadFiltro1 = DB::table('lead')
					->where('filtro1', '=', 'Quente')
					->orWhere('filtro1', '=', 'Frio')
					->orWhere('filtro1', '=', 'Muito quente')
					->orderBy('data_entrada', 'DESC')
					->get();

		$leadFiltro2 = DB::table('lead')
					->where('filtro2', '=', 'Quente')
					->orWhere('filtro2', '=', 'Frio')
					->orWhere('filtro2', '=', 'Muito quente')
					->orderBy('data_entrada', 'DESC')
					->get();

		$leadFiltro3 = DB::table('lead')
					->where('filtro1', '!=', 'Frio')
					->Where('filtro1', '!=', 'null')
					->Where('filtro2', '!=', 'Frio')
					->Where('filtro2', '!=', 'null')
					->orderBy('data_entrada', 'DESC')
					->get();

		$leadProposta = DB::table('proposta')
					->join('lead', 'proposta.lead_id', '=', 'lead.lead_id')
					->select('lead.*' ,'nome_empresa', 'titulo', 'data_emissao', 'situacao')
					->orderBy('data_emissao', 'DESC')
					->get();

		$leadProposta = DB::table('proposta')
						->join('lead', 'proposta.lead_id', '=', 'lead.lead_id')
						->select('lead.*' ,'nome_empresa', 'titulo', 'data_emissao', 'situacao')
						->orderBy('data_emissao', 'DESC')
						->get();

		$leadPesquisa = DB::table('proposta')
						->join('lead', 'proposta.lead_id', '=', 'lead.lead_id')
						->select('lead.*' ,'nome_empresa', 'titulo', 'data_emissao', 'situacao')
						->where('pesquisa_enviada', '=', 'sim')
						->orderBy('data_emissao', 'DESC')
						->get();

		return view('lista_base_leads')
					->with('lead', $lead)
					->with('leadFiltro1', $leadFiltro1)
					->with('leadFiltro2', $leadFiltro2)
					->with('leadFiltro3', $leadFiltro3)
					->with('leadProposta', $leadProposta)
					->with('leadPesquisa', $leadPesquisa);
	}

	public function info($lead_id){
		$lead = Lead::find($lead_id);

		$equipe = new Equipe();
		$equipe = Equipe::find($lead->equipe_id);

		$equipe2 = new Equipe();
		$equipe2 = Equipe::all();

		$origem = new Origem();
		$origem = Origem::find($lead->origem_id);

		$mercado = new Mercado();
		$mercado = Mercado::find($lead->mercado_id);

		$produto_lead = new Produto_lead();
		$produto_lead = Produto_lead::find($lead->produto_lead_id);

		$rede_social = new Rede_social();
		$rede_social = Rede_social::all();

		$timeline = new Timeline();
		$timeline = DB::table('timeline')
					->join('lead', 'timeline.lead_id', '=', 'lead.lead_id')
					->join('equipe', 'timeline.equipe_id', '=', 'equipe.equipe_id')
					->where('lead.lead_id', '=', $lead_id)
					->select('nome', 'sobrenome', 'comentario', 'data')
					->orderBy('data', 'DESC')
					->get();

		$contatos = new Contato();
		$contatos = DB::table('lead')
					->join('lead_contato', 'lead.lead_id', '=', 'lead_contato.lead_id')
					->join('contato', 'lead_contato.contato_id', '=', 'contato.contato_id')
					->where('lead.lead_id', '=', $lead_id)
					->select('contato.contato_id', 'nome', 'telefone1', 'telefone2', 'cargo', 'email')
					->get();

		return view('info_lead')
					->with('lead', $lead)
					->with('origem', $origem)
					->with('produto_lead', $produto_lead)
					->with('mercado', $mercado)
					->with('contatos', $contatos)
					->with('timeline', $timeline)
					->with('rede_social', $rede_social)
					->with('equipe', $equipe)
					->with('equipe2', $equipe2);
	}

	public function cadastraComentario($lead_id){
		date_default_timezone_set('America/Sao_Paulo');

		$data_comentario = date('Y-m-d H:i:s');
		$comentario = Request::input('comentario');

		DB::beginTransaction();

		$timeline =  new Timeline();
		$timeline->lead_id = $lead_id;
		$timeline->comentario = $comentario;
		$timeline->data = $data_comentario;
		$timeline->equipe_id = Session::get('id');
		$timeline->save();

		$lead = Lead::find($lead_id);
		$lead->data_ultima_atualizacao = $data_comentario;
		$lead->save();

		DB::commit();


		$equipe = new Equipe();
		$equipe = Equipe::find($lead->equipe_id);

		$equipe2 = new Equipe();
		$equipe2 = Equipe::all();

		$origem = new Origem();
		$origem = Origem::find($lead->origem_id);

		$mercado = new Mercado();
		$mercado = Mercado::find($lead->mercado_id);

		$produto_lead = new Produto_lead();
		$produto_lead = Produto_lead::find($lead->produto_lead_id);

		$rede_social = new Rede_social();
		$rede_social = Rede_social::all();

		$timeline = new Timeline();
		$timeline = DB::table('timeline')
					->join('lead', 'timeline.lead_id', '=', 'lead.lead_id')
					->join('equipe', 'timeline.equipe_id', '=', 'equipe.equipe_id')
					->where('lead.lead_id', '=', $lead_id)
					->select('nome', 'sobrenome', 'comentario', 'data')
					->orderBy('data', 'DESC')
					->get();

		$contatos = new Contato();
		$contatos = DB::table('lead')
					->join('lead_contato', 'lead.lead_id', '=', 'lead_contato.lead_id')
					->join('contato', 'lead_contato.contato_id', '=', 'contato.contato_id')
					->where('lead.lead_id', '=', $lead_id)
					->select('nome', 'telefone1', 'telefone2', 'cargo', 'email')
					->get();

		return view('info_lead')
					->with('lead', $lead)
					->with('origem', $origem)
					->with('produto_lead', $produto_lead)
					->with('mercado', $mercado)
					->with('contatos', $contatos)
					->with('timeline', $timeline)
					->with('rede_social', $rede_social)
					->with('equipe', $equipe)
					->with('equipe2', $equipe2);
	}

	public function formAtualizaLead($lead_id){
		$lead = Lead::find($lead_id);

		$equipe = new Equipe();
		$equipe = Equipe::find($lead->equipe_id);

		$equipe2 = new Equipe();
		$equipe2 = Equipe::all();

		$origem = new Origem();
		$origem = Origem::find($lead->origem_id);

		$origem2 = new Origem();
		$origem2 = Origem::all();

		$mercado = new Mercado();
		$mercado = Mercado::find($lead->mercado_id);

		$mercado2 = new Mercado();
		$mercado2 = Mercado::all();

		$produto_lead = new Produto_lead();
		$produto_lead = Produto_lead::find($lead->produto_lead_id);

		$produto_lead2 = new Produto_lead();
		$produto_lead2 = Produto_lead::all();

		$rede_social = new Rede_social();
		$rede_social = Rede_social::all();

		$timeline = new Timeline();
		$timeline = DB::table('timeline')
					->join('lead', 'timeline.equipe_id', '=', 'lead.equipe_id')
					->join('equipe', 'lead.equipe_id', '=', 'equipe.equipe_id')
					->where('lead.lead_id', '=', $lead_id)
					->select('nome', 'sobrenome', 'comentario', 'data')
					->orderBy('data', 'DESC')
					->get();

		$contatos = new Contato();
		$contatos = DB::table('lead')
					->join('lead_contato', 'lead.lead_id', '=', 'lead_contato.lead_id')
					->join('contato', 'lead_contato.contato_id', '=', 'contato.contato_id')
					->where('lead.lead_id', '=', $lead_id)
					->select('contato.contato_id','nome', 'telefone1', 'telefone2', 'cargo', 'email')
					->get();

		return view('form_atualiza_lead')
					->with('lead', $lead)
					->with('origem', $origem)
					->with('produto_lead', $produto_lead)
					->with('mercado', $mercado)
					->with('contatos', $contatos)
					->with('timeline', $timeline)
					->with('produto_lead2', $produto_lead2)
					->with('origem2', $origem2)
					->with('mercado2', $mercado2)
					->with('equipe', $equipe)
					->with('equipe2', $equipe2)
					->with('rede_social', $rede_social);
	}

	public function atualizaLead(LeadRequest $request){
		DB::beginTransaction();

		date_default_timezone_set('America/Sao_Paulo');
		$data_ultima_atualizacao = date('Y-m-d H:i:s');

		$lead_id = $request->lead_id;

		$lead = new Lead();
		$lead = Lead::find($lead_id);
		$lead->equipe_id = $request->equipe_id;
		$lead->origem_id = $request->origem_id;
		$lead->mercado_id = $request->mercado_id;
		$lead->produto_lead_id = $request->produto_lead_id;
		$lead->nome_empresa = $request->nome_empresa;
		$lead->CNPJ_CPF = $request->CNPJ_CPF;
		$lead->rede_social_id = $request->rede_social_id;
		$lead->rede_social_endereco = $request->endereco;
		$lead->telefone1_empresa = $request->telefone1_empresa;
		$lead->telefone2_empresa = $request->telefone2_empresa;
		$lead->site = $request->site;
		$lead->rua = $request->rua;
		$lead->logradouro = $request->logradouro;
		$lead->complemento = $request->complemento;
		$lead->pais = $request->pais;
		$lead->estado = $request->estado;
		$lead->cidade = $request->cidade;
		$lead->cep = $request->cep;
		$lead->data_ultima_atualizacao = $data_ultima_atualizacao;
		$lead->observacoes = $request->observacoes;
		$lead->filtro1 = $request->filtro1;
		$lead->filtro2 = $request->filtro2;
		$lead->classificacao_reuniao = $request->classificacao_reuniao;
		$lead->save();

		$numContatos = count($request->contato_id);
		for($i=0; $i<$numContatos; $i++){
			$contato = new Contato();
			$contato = Contato::find($request->contato_id[$i]);
			$contato->nome = $request->nome[$i];
			$contato->telefone1 = $request->telefone1[$i];
			$contato->telefone2 = $request->telefone2[$i];
			$contato->cargo = $request->cargo[$i];
			$contato->email = $request->email[$i];
			$contato->save();
		}

		DB::commit();

		$equipe = new Equipe();
		$equipe = Equipe::find($lead->equipe_id);

		$equipe2 = new Equipe();
		$equipe2 = Equipe::all();

		$origem = new Origem();
		$origem = Origem::find($lead->origem_id);

		$mercado = new Mercado();
		$mercado = Mercado::find($lead->mercado_id);

		$produto_lead = new Produto_lead();
		$produto_lead = Produto_lead::find($lead->produto_lead_id);

		$rede_social = new Rede_social();
		$rede_social = Rede_social::all();

		$timeline = new Timeline();
		$timeline = DB::table('timeline')
					->join('lead', 'timeline.lead_id', '=', 'lead.lead_id')
					->join('equipe', 'timeline.equipe_id', '=', 'equipe.equipe_id')
					->where('lead.lead_id', '=', $lead_id)
					->select('nome', 'sobrenome', 'comentario', 'data')
					->orderBy('data', 'DESC')
					->get();

		$contatos = new Contato();
		$contatos = DB::table('lead')
					->join('lead_contato', 'lead.lead_id', '=', 'lead_contato.lead_id')
					->join('contato', 'lead_contato.contato_id', '=', 'contato.contato_id')
					->where('lead.lead_id', '=', $lead_id)
					->select('contato.contato_id', 'nome', 'telefone1', 'telefone2', 'cargo', 'email')
					->get();

		$atualizado = 'ok';

		return view('info_lead')
					->with('lead', $lead)
					->with('origem', $origem)
					->with('produto_lead', $produto_lead)
					->with('mercado', $mercado)
					->with('contatos', $contatos)
					->with('timeline', $timeline)
					->with('atualizado', $atualizado)
					->with('rede_social', $rede_social)
					->with('equipe', $equipe)
					->with('equipe2', $equipe2);
	}

	public function deletaLead($lead_id){
		DB::beginTransaction();

		$lead_id = REQUEST::route('lead_id');

		$lead = new Lead();
		$lead = Lead::find($lead_id);

		$contatos = new Contato();
		$contatos = DB::table('contato')
					->join('lead_contato', 'contato.contato_id', '=', 'lead_contato.contato_id')
					->join('lead', 'lead_contato.lead_id', '=', 'lead.lead_id')
					->delete();

		$lead_contato = new Lead_Contato();
		$lead_contato = DB::table('lead_contato')
					->join('lead', 'lead.lead_id', '=', 'lead_contato.lead_id')
					->delete();

		$timeline = new Timeline();
		$timeline = DB::table('timeline')
					->join('lead', 'lead.lead_id', '=', 'timeline.lead_id')
					->delete();

		$lead->delete();

		DB::commit();

		$lead = Lead::all();

		$leadFiltro1 = DB::table('lead')
					->where('filtro1', '=', 'Quente')
					->orWhere('filtro1', '=', 'Frio')
					->orWhere('filtro1', '=', 'Muito quente')
					->orderBy('data_entrada', 'DESC')
					->get();

		$leadFiltro2 = DB::table('lead')
					->where('filtro2', '=', 'Quente')
					->orWhere('filtro2', '=', 'Frio')
					->orWhere('filtro2', '=', 'Muito quente')
					->orderBy('data_entrada', 'DESC')
					->get();

		$leadFiltro3 = DB::table('lead')
					->where('filtro1', '!=', 'Frio')
					->Where('filtro1', '!=', 'null')
					->Where('filtro2', '!=', 'Frio')
					->Where('filtro2', '!=', 'null')
					->orderBy('data_entrada', 'DESC')
					->get();

		return view('lista_base_leads')
					->with('lead', $lead)
					->with('leadFiltro1', $leadFiltro1)
					->with('leadFiltro2', $leadFiltro2)
					->with('leadFiltro3', $leadFiltro3);
	}

	public function listaSelect(){
		header('Content-Type: application/json');

		$lead = new Lead();
		$lead = Lead::all();

		echo json_encode($lead);

	}

	public function listaContatosSelect(){
		header('Content-Type: application/json');

		$lead_id = Request::query('lead_id');

		$lead = Lead::find($lead_id);

		$contatos = new Contato();
		$contatos = DB::table('lead')
					->join('lead_contato', 'lead.lead_id', '=', 'lead_contato.lead_id')
					->join('contato', 'lead_contato.contato_id', '=', 'contato.contato_id')
					->where('lead.lead_id', '=', $lead_id)
					->select('contato.contato_id', 'nome', 'telefone1', 'telefone2', 'cargo', 'email')
					->get();

		echo json_encode($contatos);

	}

}
