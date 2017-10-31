<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AgendaController;
use Request;
use Auth;
use App\Agenda;
use App\Lead;
use DB;
use Session;
use App\Http\Requests\AgendaRequest;
use App\Http\Requests\EventoRequest;

Class AgendaController extends Controller {

	public function info(){

		$leads = Lead::all();

		return view('form_agenda')
						->with('leads', $leads);
	}

	public function cadastraEvento(AgendaRequest $request){

		$lead_id = $request->lead_id;
		$agenda = new Agenda();
		$agenda->equipe_id = Session::get('id');
		$agenda->data_inicio = $request->data_inicio;
		$agenda->data_fim = $request->data_fim;
		$agenda->hora_inicio = $request->hora_inicio;
		$agenda->hora_fim = $request->hora_fim;
		$agenda->titulo = $request->titulo;
		$agenda->descricao = $request->descricao;
		$agenda->tipo_plataforma = $request->tipo_plataforma;
		$agenda->lead_id = $lead_id;

		$qtdEvento = DB::table('agenda')
					->where('lead_id', '=', $lead_id)
					->count('*');

		if($qtdEvento >= 1){
			$agenda->cor = '#00a65a';
		}
		else{
			$agenda->cor = '#f39c12';
		}

		$novaqtde = $qtdEvento + 1;
		$agenda->numero_evento = $novaqtde;
		$agenda->save();

		return redirect('/agenda')
					->withInput();
	}

	public function lista(){
		header('Content-Type: application/json');

		$agenda = Agenda::all();

		$events = array();
			 foreach ($agenda as $evento) {
					 $events[] = array('id' => $evento['agenda_id'],
					 									 'lead_id' => $evento['lead_id'],
					 									 'start' => $evento['data_inicio'] . " " . $evento['hora_inicio'],
														 'end' => $evento['data_fim'] . " " . $evento['hora_fim'],
														 'overlap' => false,
														 'title' => $evento['titulo'],
														 'color' => $evento['cor'],
														 'url' => '#' . $evento['agenda_id'],
							 						 	 'allDay' => $evento['tododia'],
							  					 	 'description' => $evento['descricao'],
													 	 'type' => $evento['tipo_plataforma']
													 );
			 }

		echo json_encode($events);
	}

	public function excluirEvento(){

		$agenda_id = REQUEST::route('agenda_id');
		$agenda = Agenda::find($agenda_id);
		$agenda->delete();
		$deletado = 'true';
		$leads = Lead::all();

		return view('form_agenda')
						->with('deletado', $deletado)
						->with('leads', $leads);
	}

	public function alterarEvento(EventoRequest $request){
		$agenda_id = REQUEST::route('agenda_id');
		$agenda = Agenda::find($agenda_id);
		$agenda->data_inicio = $request->data_inicio2;
		$agenda->data_fim = $request->data_fim2;
		$agenda->hora_inicio = $request->hora_inicio2;
		$agenda->hora_fim = $request->hora_fim2;
		$agenda->titulo = $request->titulo2;
		$agenda->descricao = $request->descricao2;
		$agenda->tipo_plataforma = $request->tipo_plataforma2;
		$agenda->lead_id = $request->lead_id2;

		$agenda->save();
		$alterado = 'true';
		$leads = Lead::all();

		return view('form_agenda')
						->with('alterado', $alterado)
						->with('leads', $leads);
	}

}
