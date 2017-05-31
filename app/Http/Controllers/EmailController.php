<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Mail\EMail;
use GuzzleHttp\Client;
use Illuminate\Mail\MailServiceProvider;
use GuzzleHttp\Exception\GuzzleException;
use App\Http\Controllers\PDFController;
use App\Mercado;
use Barryvdh\DomPDF\Facade as PDF;
use DB;
use App\Http\Controllers\PropostaController;
use App\Lead;
use App\Equipe;
use App\Produto_lead;
use App\Peca;
use App\Motivo;
use App\Proposta;
use App\Item;
use Session;
use Auth;
use App\Http\Requests\PropostaRequest;

Class EmailController extends Controller {

	public function enviarProposta($proposta_id){
		date_default_timezone_set('America/Sao_Paulo');
		$data = date('Y-m-d H:i:s');

		$proposta = DB::select('SELECT  nome_empresa, CNPJ_CPF, rua, logradouro, cidade, estado, pais, proposta.proposta_id, titulo, validade, data_emissao, situacao,
							SUM(CASE WHEN situacao_item = "Aprovado" THEN valor ELSE 0 END) valor_total_aprovado,
							SUM(valor) valor_total
							FROM proposta, lead, item, proposta_item
							WHERE lead.lead_id = proposta.lead_id
							AND proposta.proposta_id = proposta_item.proposta_id
							AND proposta_item.item_id = item.item_id
																AND proposta.proposta_id = '.$proposta_id.'
							GROUP BY nome_empresa, CNPJ_CPF, rua, logradouro, cidade, estado, pais, proposta.proposta_id, titulo, validade, data_emissao, situacao');

		$itens = DB::select('SELECT item, valor FROM proposta,item, proposta_item
							where proposta.proposta_id = proposta_item.proposta_id
							AND proposta_item.item_id = item.item_id
																AND proposta.proposta_id = '.$proposta_id);

		$pdf = PDF::loadView('info_PDF', ['proposta' => $proposta, 'data' => $data, 'itens' => $itens])
					->stream();

		try {

			Mail::send('template_email', ['proposta' => $proposta, 'itens' => $itens, 'data' => $data], function ($m) use ($pdf){
				 $m->from('kendyhayashi@gmail.com');
				 $m->to('kehayashi@hotmail.com')->subject('Proposta DG5');
				 $m->attachData($pdf, 'proposta.pdf');
			  });

				$propostaInfo = DB::select('SELECT  nome_empresa, proposta.proposta_id, titulo, data_emissao, situacao,
												SUM(CASE WHEN situacao_item = "Aprovado" THEN valor ELSE 0 END) valor_total_aprovado,
												SUM(valor) valor_total
												FROM proposta, lead, item, proposta_item
												WHERE lead.lead_id = proposta.lead_id
												AND proposta.proposta_id = proposta_item.proposta_id
												AND proposta_item.item_id = item.item_id
												GROUP BY nome_empresa, proposta.proposta_id, titulo, data_emissao, situacao');

			 $enviado = 'ok';
			 return view('lista_propostas')
			 			->with('proposta', $propostaInfo)
						->with('enviado', $enviado);

		} catch (Exception $e) {

				$propostaInfo = DB::select('SELECT  nome_empresa, proposta.proposta_id, titulo, data_emissao, situacao,
												SUM(CASE WHEN situacao_item = "Aprovado" THEN valor ELSE 0 END) valor_total_aprovado,
												SUM(valor) valor_total
												FROM proposta, lead, item, proposta_item
												WHERE lead.lead_id = proposta.lead_id
												AND proposta.proposta_id = proposta_item.proposta_id
												AND proposta_item.item_id = item.item_id
												GROUP BY nome_empresa, proposta.proposta_id, titulo, data_emissao, situacao');

			 $erro = 'false';
			 return view('lista_propostas')
			 			->with('proposta', $propostaInfo)
						->with('erro', $erro);

		}

	}

	public function enviarPesquisa($proposta_id){
		try {

			$pesquisa = 'pesquisa';

			Mail::send('template_email_pesquisa', ['pesquisa' => $pesquisa], function ($m) {
				 $m->from('kendyhayashi@gmail.com');
				 $m->to('kehayashi@hotmail.com')->subject('Pesquisa de satisfação DG5');
			  });

				$propostaInfo = DB::select('SELECT  nome_empresa, proposta.proposta_id, titulo, data_emissao, situacao,
												SUM(CASE WHEN situacao_item = "Aprovado" THEN valor ELSE 0 END) valor_total_aprovado,
												SUM(valor) valor_total
												FROM proposta, lead, item, proposta_item
												WHERE lead.lead_id = proposta.lead_id
												AND proposta.proposta_id = proposta_item.proposta_id
												AND proposta_item.item_id = item.item_id
												GROUP BY nome_empresa, proposta.proposta_id, titulo, data_emissao, situacao');

			 $pesquisa_enviada = 'ok';
			 return view('lista_propostas')
			 			->with('proposta', $propostaInfo)
						->with('pesquisa_enviada', $pesquisa_enviada);

		} catch (Exception $e) {

				$propostaInfo = DB::select('SELECT  nome_empresa, proposta.proposta_id, titulo, data_emissao, situacao,
												SUM(CASE WHEN situacao_item = "Aprovado" THEN valor ELSE 0 END) valor_total_aprovado,
												SUM(valor) valor_total
												FROM proposta, lead, item, proposta_item
												WHERE lead.lead_id = proposta.lead_id
												AND proposta.proposta_id = proposta_item.proposta_id
												AND proposta_item.item_id = item.item_id
												GROUP BY nome_empresa, proposta.proposta_id, titulo, data_emissao, situacao');

			 $pesquisa_erro = 'false';

			 return view('lista_propostas')
			 			->with('proposta', $propostaInfo)
						->with('pesquisa_erro', $pesquisa_erro);

		}

	}

}
