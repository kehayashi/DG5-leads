<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropostaRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'lead_id' => 'required|not_in:null',
            'contato_id' => 'required|not_in:null',
            'equipe_id' => 'required|not_in:null',
            'data_emissao' => 'required',
            'validade' => 'required|numeric',
            'titulo' => 'required|max:100',
            'situacao' => 'required|not_in:null'
        ];
    }

    public function messages(){
        return [
            'lead_id.required' => 'Selecione LEAD',
            'contato_id.required' => 'Selecione CONTATO',
            'equipe_id.required' => 'Selecione EQUIPE',
            'data_emissao.required' => 'Preencha o campo EMISSAO',
            'validade.required' => 'Preencha o campo VALIDADE',
            'titulo.required' => 'Preencha o campo TITULO',
            'situacao.required' => 'Selecione SITUACAO'
        ];
    }
}
