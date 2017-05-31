<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesquisaRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
          'pergunta14' => 'required|not_in:null',
        ];
    }

    public function messages(){
        return [

        ];
    }
}
