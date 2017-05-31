<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MercadoController;
use Request;
use Auth;
use App\Mercado;
use App\Http\Requests\MercadoRequest;

Class MercadoController extends Controller {

	public function lista(){
		$mercado = Mercado::all();
		return view('lista_mercado')
				->with('mercado', $mercado);
	}

	public function cadastraMercado(MercadoRequest $request){
		Mercado::create($request->all());
		$cadastrado = true;
		return redirect('/mercado')
					->withInput();
	}

	public function deletaMercado($mercado_id){
		$mercado_id = REQUEST::route('mercado_id');
        $mercado = Mercado::find($mercado_id);
        $mercado->delete();
        $mercado = Mercado::all();
        $deletado = true;
        return view('lista_mercado')
							->with('mercado', $mercado)
							->with('deletado', $deletado);
	}

	public function atualizaMercado(MercadoRequest $request){
        $mercado_id = $request->mercado_id;
       	$mercado = Mercado::find($mercado_id);
        $mercado->descricao = $request->descricao;
        $mercado->save();
				$mercado = Mercado::all();
				$atualizado = true;
				return view('lista_mercado')
							->with('mercado', $mercado)
							->with('atualizado', $atualizado);
	}

	public function cadastrarFormLead(MercadoRequest $request){
		Mercado::create($request->all());
		return redirect('/lead');
	}

}
