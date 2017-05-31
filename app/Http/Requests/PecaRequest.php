<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PecaRequest extends FormRequest {
   
    public function authorize() {
        return true;
    }
  
    public function rules() {
        return [
            'descricao' => 'required|max:50',
        ];
    }

    public function messages(){
        return [
            'descricao.required' => 'Preencha o campo DESCRIÇÃO',
        ];
    }
}
