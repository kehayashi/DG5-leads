<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OrigemController;
use Request;
use Auth;
use App\Origem;
use App\Http\Requests\OrigemRequest;

Class OrigemController extends Controller {

	public function lista(){
		$origem = Origem::all();

		return view('lista_origem')->with('origem', $origem);
	}

	public function cadastraOrigem(OrigemRequest $request){
		Origem::create($request->all());
		$cadastrado = true;

		return redirect('/origem')
					->withInput();
	}

	public function deletaOrigem($origem_id){
		$origem_id = REQUEST::route('origem_id');
    $origem = Origem::find($origem_id);
    $origem->delete();
    $origem = Origem::all();
    $deletado = true;

	  return view('lista_origem')
					->with('origem', $origem)
					->with('deletado', $deletado);
	}


	public function atualizaOrigem(OrigemRequest $request){
    $id_origem = $request->origem_id;
    $origem = Origem::find($id_origem);
   	$origem->descricao = $request->descricao;
    $origem->save();
		$origem = Origem::all();
		$atualizado = true;

		return view('lista_origem')
					->with('origem', $origem)
					->with('atualizado', $atualizado);
	}

	public function cadastrarFormLead(OrigemRequest $request){
		Origem::create($request->all());

		return redirect('/lead');
	}

}
