<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministratorStoreRequest extends FormRequest
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
            'usuario' => 'required|unique:seo_administrador|string|max:25|min:3',
            'password' => 'required|max:25|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'estadoadm' => 'required|string|min:2|max:2'
        ];

    }
}
