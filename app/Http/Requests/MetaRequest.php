<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetaRequest extends FormRequest {
   
    public function authorize() {
        return true;
    }
  
    public function rules() {
        return [
            'meta' => 'required|max:50',
        ];
    }

    public function messages(){
        return [
            'meta.required' => 'Preencha o campo META',
        ];
    }
}
