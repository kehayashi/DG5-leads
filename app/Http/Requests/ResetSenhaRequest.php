<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetSenhaRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            //'email' => 'required',
            //'senhaAleatoria' => 'required',
            //'novaSenha1' => 'required',
            //'novaSenha2' => 'required'
        ];
    }

    public function messages(){
        return [
            //'email.required' => 'Preencha o campo EMAIL',
            //'senhaAleatoria.required' => 'Preencha o campo SENHA RECEBIDA',
            //'novaSenha1.required' => 'Preencha o primeiro campo da NOVA SENHA',
            //'novaSenha2.required' => 'Preencha o segundo campo da NOVA SENHA'
        ];
    }
}
