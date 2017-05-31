<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'data_inicio' => 'required',
            'data_fim' => 'required',
            'hora_inicio' => 'required|not_in:null',
            'hora_fim' => 'required|not_in:null',
            'titulo' => 'required',
            'checkcor' => 'required'
        ];
    }

    public function messages(){
        return [
            'data_inicio.required' => 'Preencha o campo DATA INICIO',
            'data_fim.required' => 'Preencha o campo DATA FIM',
            'hora_inicio.required' => 'Preencha o campo HORA INICIO',
            'hora_fim.required' => 'Preencha o campo HORA FIM',
            'checkcor.required' => 'Preencha o campo COR',
        ];
    }
}
