<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest {
   
    public function authorize() {
        return true;
    }
  
    public function rules() {
        return [
            'nome_empresa' => 'required|max:100',
            'CNPJ_CPF' => 'required|max:20',
            'telefone1_empresa' => 'required|max:20',
            //'telefone2_empresa' => 'max:100',
            'site' => 'max:40',
            'origem_id' => 'required|not_in:null',
            'mercado_id' => 'required|not_in:null',
            'produto_lead_id' => 'required|not_in:null',
            'equipe_id' => 'required|not_in:null',
            'rua' => 'required|max:100',
            'logradouro' => 'required|max:20',
            'pais' => 'required|max:50',
            'estado' => 'required|max:50',
            'cidade' => 'required|max:50',
            'CEP' => 'max:20' // request contatos

        ];
    }

    public function messages(){
        return [
            'nome_empresa.required' => 'Preencha o campo NOME DA EMPRESA',
            'CNPJ_CPF.required' => 'Preencha o campo CNPJ/CPF',
            'telefone1_empresa.required' => 'Preencha o campo TELEFONE 1',
            //'telefone2' => 'Preencha o campo TELEFONE 2',
            //'site' => 'Preencha o campo SITE',
            'origem_id.required' => 'Escolha uma ORIGEM',
            'mercado_id.required' => 'Escolha um MERCADO',
            'produto_lead_id.required' => 'Escolha um PRODUTO',
            'equipe_id.required' => 'Escolha um vendedor',
            'rua.required' => 'Preencha o campo RUA',
            'logradouro.required' => 'Preencha o campo LOGRADOURO',
            'pais.required' => 'Preencha o campo PAÍS',
            'estado.required' => 'Preencha o campo ESTADO',
            'cidade.required' => 'Preencha o campo CIDADE'
            //'CEP' => 'Preencha o campo CEP',
        ];
    }
}
