<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:250',
            'email' => 'required|string|email|unique:seo_usuarios',
            'apellido' => 'required|string|max:250',
            'telefono' => 'required|string|max:32',
            'estado' => 'required|string|max:10',
            'direccion' => 'string|max:250',
            'comuna' => 'string|max:32',
            'asegurador' => 'string|max:250',
            'password' => 'required|string|min:6|confirmed|max:30',
            'password_confirmation' => 'required|string|min:6|max:30',
        ];
    }
}
