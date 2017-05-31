<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AgendaController;
use Request;
use Auth;
use App\Agenda;
use DB;
use App\Http\Requests\AgendaRequest;

Class AgendaController extends Controller {

	public function info(){

		return view('form_agenda');
	}

	public function cadastraEvento(AgendaRequest $request){

		$agenda = new Agenda();
		$agenda->data_inicio = $request->data_inicio;
		$agenda->data_fim = $request->data_fim;
		$agenda->hora_inicio = $request->hora_inicio;
		$agenda->hora_fim = $request->hora_fim;
		$agenda->titulo = $request->titulo;
		$agenda->descricao = $request->descricao;

		$check = $request->checkcor;
		if($check == 1){
			$agenda->cor = $request->cor1;
		}
		if($check == 2){
			$agenda->cor = $request->cor2;
		}
		if($check == 3){
			$agenda->cor = $request->cor3;
		}
		if($check == 4){
			$agenda->cor = $request->cor4;
		}
		if($check == 5){
			$agenda->cor = $request->cor5;
		}
		if($check == 6){
			$agenda->cor = $request->cor6;
		}

		$agenda->save();

		return redirect('/agenda')
					->withInput();
	}

	public function lista(){
		header('Content-Type: application/json');

		$agenda = Agenda::all();

		echo json_encode($agenda);
	}
}
