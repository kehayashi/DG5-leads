<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PDFController;
use Request;
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

Class PDFController extends Controller {

    public function viewPDF(){

        return view('info_PDF');

    }

    public function downloadPropostaPDF($proposta_id) {
	    date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d H:i:s');

        $proposta = DB::select('SELECT nome_empresa, CNPJ_CPF, rua, logradouro, cidade, estado, pais, proposta.proposta_id, titulo, validade, data_emissao, situacao,
									SUM(CASE WHEN situacao_item = "Aprovado" THEN valor ELSE 0 END) valor_total_aprovado,
									SUM(valor) valor_total
									FROM proposta, lead, item, proposta_item
									WHERE lead.lead_id = proposta.lead_id
									AND proposta.proposta_id = proposta_item.proposta_id
									AND proposta_item.item_id = item.item_id
                                    AND proposta.proposta_id = '.$proposta_id.'
									GROUP BY nome_empresa, CNPJ_CPF, rua, logradouro, cidade, estado, pais, proposta.proposta_id, titulo, validade, data_emissao, situacao');

        $itens = DB::select('SELECT item, valor FROM proposta,item, proposta_item
									WHERE proposta.proposta_id = proposta_item.proposta_id
									AND proposta_item.item_id = item.item_id
                                    AND proposta.proposta_id = '.$proposta_id);

        $pdf = PDF::loadView('info_PDF', ['proposta' => $proposta, 'data' => $data, 'itens' => $itens]);

        return $pdf->download('proposta.pdf');
    }

    public function streamPropostaPDF($proposta_id){
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d H:i:s');

        $proposta = DB::select('SELECT nome_empresa, CNPJ_CPF, rua, logradouro, cidade, estado, pais, proposta.proposta_id, titulo, validade, data_emissao, situacao,
                                    SUM(CASE WHEN situacao_item = "Aprovado" THEN valor ELSE 0 END) valor_total_aprovado,
                                    SUM(valor) valor_total
                                    FROM proposta, lead, item, proposta_item
                                    WHERE lead.lead_id = proposta.lead_id
                                    AND proposta.proposta_id = proposta_item.proposta_id
                                    AND proposta_item.item_id = item.item_id
                                    AND proposta.proposta_id = '.$proposta_id.'
                                    GROUP BY nome_empresa, CNPJ_CPF, rua, logradouro, cidade, estado, pais, proposta.proposta_id, titulo, validade, data_emissao, situacao');

      $itens = DB::select('SELECT item, valor FROM proposta,item, proposta_item
                                    WHERE proposta.proposta_id = proposta_item.proposta_id
                                    AND proposta_item.item_id = item.item_id
                                    AND proposta.proposta_id = '.$proposta_id);

      $pdf = PDF::loadView('info_PDF', ['proposta' => $proposta, 'data' => $data, 'itens' => $itens]);

      return $pdf->stream();
    }
}
