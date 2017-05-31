<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PecaController;
use Request;
use Auth;
use App\Peca;
use App\Produto_lead;
use DB;
use App\Http\Requests\PecaRequest;

Class PecaController extends Controller {

	public function lista(){
		$peca = Peca::all();
		$produto_lead = Produto_lead::all();

		return view('lista_peca')
					->with('peca', $peca)
	  			->with('produto_lead', $produto_lead);
	}

	public function cadastraPeca(PecaRequest $request){
		$peca = new Peca();
		$peca->produto_lead_id = $request->produto_lead_id;
		$peca->nome = $request->nome;
		$peca->descricao = $request->descricao;
		$preco = strtr($request->valor, array(',' => '', '.' => ''));
		$peca->valor = $preco;
		$peca->save();
		$cadastrado = true;

		return redirect('/peca')
					->withInput();
	}

	public function deletaPeca($peca_id){
		$peca_id = REQUEST::route('peca_id');
    $peca = Peca::find($peca_id);
    $peca->delete();
    $peca = Peca::all();
    $deletado = true;

		$produto_lead = Produto_lead::all();

		return view('lista_peca')
					->with('peca', $peca)
					->with('deletado', $deletado)
					->with('produto_lead', $produto_lead);
	}

	public function atualizaPeca(PecaRequest $request){
    $id_peca = $request->peca_id;
    $peca = Peca::find($id_peca);
    $peca->descricao = $request->descricao;
    $peca->save();
		$peca = Peca::all();
		$atualizado = true;

		return view('lista_peca')
					->with('peca', $peca)
					->with('atualizado', $atualizado);
	}

	public function cadastrarFormProposta(PecaRequest $request){
		$peca = new Peca();
		$peca->produto_lead_id = $request->produto_lead_id;
		$peca->descricao = $request->descricao;
		$preco = strtr($request->valor, array(',' => '', '.' => ''));
		$peca->valor = $preco;
		$peca->save();

		return redirect('/proposta');
	}

	public function listaAjax(){
		header('Content-Type: application/json');

		$produto_lead_id = $_GET['produto_lead_id'];
		$produto_lead_id = $_REQUEST['produto_lead_id'];

		$peca = new Peca();
		$peca = DB::table('peca')->where('peca.produto_lead_id', '=', $produto_lead_id)->select('peca.*')->get();

		echo json_encode($peca);
	}

	public function getPecaAjax(){
		header('Content-Type: application/json');

		$peca_id = $_GET['peca_id'];
		$peca_id = $_REQUEST['peca_id'];

		$peca2 = new Peca();
		//$peca = Peca::find($peca_id);
		$peca2 = Peca::find($peca_id);

		echo json_encode($peca2);
	}

}
