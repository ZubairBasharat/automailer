<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUpdateRequest extends FormRequest
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
            'email' => [
                'required', 
                'string',
                'email',
                Rule::unique('seo_usuarios')->ignore($this->route('user'), 'email')
            ],
            'apellido' => 'required|string|max:250',
            'telefono' => 'required|string|max:32',
            'estado' => 'required|string|max:10',
            'direccion' => 'nullable|string|max:250',
            'comuna' => 'nullable|string|max:32',
            'asegurador' => 'nullable|string|max:250',
            'password' => 'sometimes|nullable|max:25|min:6|confirmed',
            'password_confirmation' => 'nullable|min:6|max:25|same:password',
        ];
    }
}
