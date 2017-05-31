<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipeRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nome' => 'required|max:40',
            'sobrenome' => 'required|max:40',
            'email' => 'required|email|max:40',
            'telefone' => 'required',
            'meta' => 'required',
            'cargo' => 'required|not_in:null'
            //'senha' => 'required'
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'Preencha o campo NOME',
            'sobrenome.required' => 'Preencha o campo SOBRENOME',
            'email.required' => 'Preencha o campo EMAIL',
            'telefone.required' => 'Preencha o campo TELEFONE',
            'meta.required' => 'Preencha o campo META',
            'cargo.required' => 'Selecione o CARGO'
            //'senha.required' => 'Preencha o campo SENHA'
        ];
    }
}
