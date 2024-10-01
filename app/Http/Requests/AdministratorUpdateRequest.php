<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdministratorUpdateRequest extends FormRequest
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

        return [
            'nombres' => 'required|string|max:25|min:3',
            'apellidos' => 'required|string|max:25|min:3',
            'email' => 'required|email',
            'usuario' => [
                'required',
                'string',
                'max:25',
                'min:3',
                Rule::unique('seo_administrador')->ignore($this->route('idadministrador'), 'idadministrador'),
            ],
            'password' => 'sometimes|nullable|max:25|min:6|confirmed',
            'password_confirmation' => 'nullable|min:6|same:password',
            'estadoadm' => 'required|string|min:2|max:2'
        ];

    }
}
