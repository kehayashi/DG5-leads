<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Produto_leadController;
use Request;
use Auth;
use App\Produto_lead;
use App\Http\Requests\Produto_leadRequest;

Class Produto_leadController extends Controller {

	public function lista(){
		$produto_lead = Produto_lead::all();
		return view('lista_produto_lead')
					->with('produto', $produto_lead);
	}

	public function cadastraProdutoLead(Produto_leadRequest $request){
		Produto_lead::create($request->all());
		$cadastrado = true;
		return redirect('/produto_lead')
					->withInput();
	}

	public function deletaProdutoLead($produto_lead_id){
		$produto_lead_id = REQUEST::route('produto_lead_id');
    $produto_lead = Produto_lead::find($produto_lead_id);
    $produto_lead->delete();
    $produto_lead = Produto_lead::all();
    $deletado = true;
    return view('lista_produto_lead')
					->with('produto', $produto_lead)
					->with('deletado', $deletado);
	}

	public function atualizaProdutoLead(Produto_leadRequest $request){
    $produto_lead_id = $request->produto_lead_id;
    $produto_lead = Produto_lead::find($produto_lead_id);
    $produto_lead->descricao = $request->descricao;
    $produto_lead->save();
		$produto_lead = Produto_lead::all();
		$atualizado = true;
		return view('lista_produto_lead')
					->with('produto', $produto_lead)
					->with('atualizado', $atualizado);
	}

	public function cadastrarFormLead(Produto_leadRequest $request){
		Produto_lead::create($request->all());
		return redirect('/lead');
	}

	public function cadastrarFormProposta(Produto_leadRequest $request){
		Produto_lead::create($request->all());
		return redirect('/proposta');
	}

	public function listaAjax(){
		header('Content-Type: application/json');

		$produto_lead = new Produto_lead();
		$produto_lead = Produto_lead::all();

		echo json_encode($produto_lead);
	}

}
