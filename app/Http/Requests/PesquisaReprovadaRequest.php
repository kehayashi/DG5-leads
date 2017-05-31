<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesquisaReprovadaRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
          'motivo' => 'required|not_in:null',
        ];
    }

    public function messages(){
        return [

        ];
    }
}
