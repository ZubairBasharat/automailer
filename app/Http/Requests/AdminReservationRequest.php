<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminReservationRequest extends FormRequest
{
    // public function authorize()
    // {
    //     return true;
    // }

    public function rules()
    {
        return [
            'idtipo' => ['required', 'array'],
            'idtipo.*' => ['required', 'integer'],
            'idmedicamento' => ['required', 'array'],
            'idmedicamento.*' => ['required', 'integer'],
            'dosis' => ['required', 'array'],
            'dosis.*' => ['required', 'string'],
            'anotaciones' => 'nullable|string',
            'idusuario' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'idtipo.required' => 'The idtipo field is required.',
            'idmedicamento.required' => 'The idmedicamento field is required.',
            'dosis.required' => 'The dosis field is required.',
            'idusuario.required' => 'The idusuario field is required.',
        ];
    }
}
