<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContatosController;
use App\Contato;
use App\Lead_Contato;
use App\Http\Requests\ContatoRequest;
use App\Lead;
use Session;
use DB;
use Request;
use Auth;

Class ContatosController extends Controller {

	public function listaContatosSelect(){
		header('Content-Type: application/json');

		$lead_id = $_GET['lead_id'];
		$lead_id = $_REQUEST['lead_id'];

		$contatos = new Contato();
		$contatos = DB::table('lead')
					->join('lead_contato', 'lead.lead_id', '=', 'lead_contato.lead_id')
					->join('contato', 'lead_contato.contato_id', '=', 'contato.contato_id')
					->select('contato.contato_id', 'nome', 'telefone1', 'telefone2', 'cargo', 'email')
					->get();

		echo json_encode($contatos);
	}
}
