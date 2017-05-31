<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest {
   
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nome_contato[]' => 'required|max:50',
            'telefone1_contato[]' => 'required|number|max:20',
            'telefone2_contato[]' => 'number|max:20',
            'cargo_contato[]' => 'max:30',
            'email_contato[]' => 'required|email|max:50',
        ];
    }

    public function messages(){
        return [
            'nome_contato[].required' => 'Preencha o campo NOME DO CONTATO',
            'telefone1_contato[].required' => 'Preencha o campo TELEFONE DO CONTATO 1',
            'telefone2_contato[].required' => 'Preencha o campo TELEFONE DO CONTATO 2',
            'cargo_contato[].required' => 'Preencha o campo CARGO DO CONTATO',
            'email_contato[].required' => 'Preencha o campo EMAIL DO CONTATO',
        ];
    }
}
