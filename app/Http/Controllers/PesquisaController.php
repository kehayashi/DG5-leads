<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PesquisaController;
use Request;
use DB;
use App\Motivo;
use App\Pesquisa_satisfacao;
use App\Pesquisa_satisfacao_reprovada;
use App\Http\Requests\PesquisaRequest;
use App\Http\Requests\PesquisaReprovadaRequest;

Class PesquisaController extends Controller {

	public function formPesquisaAprovada(){
		$motivo = new Motivo();
		$motivo = Motivo::all();

		return view('form_pesquisa_aprovada')
					->with('motivo', $motivo);
	}

	public function formPesquisaReprovada(){
		$motivo = new Motivo();
		$motivo = Motivo::all();

		return view('form_pesquisa_reprovada')
					->with('motivo', $motivo);
	}

	public function cadastraPesquisaAprovada(PesquisaRequest $request){
		date_default_timezone_set('America/Sao_Paulo');
		$data_pesquisa = date('Y-m-d H:i:s');

		Pesquisa_satisfacao::create($request->all());

		return view('info_end_pesquisa');
	}

	public function cadastraPesquisaReprovada(PesquisaReprovadaRequest $request){
		date_default_timezone_set('America/Sao_Paulo');
		$data_pesquisa = date('Y-m-d H:i:s');

		Pesquisa_satisfacao_reprovada::create($request->all());

		return view('info_end_pesquisa');
	}

}
