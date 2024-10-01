<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminMedicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'estado' => 'required|string|max:2|min:2',
            'tipo' => 'nulable',
            'titulo' => 'nulable',
        ];

        if ($this->route('idmedicamento') || $this->route('dosage')) {
            $rules['tipo'] = 'required|string|max:30|min:1';
        }
        else {
            $rules['titulo'] = 'required|string|max:250|min:1';
        }

        return $rules;
        
    }
}
