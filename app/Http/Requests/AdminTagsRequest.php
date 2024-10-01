<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminTagsRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255|min:2',
            'meta_titulo' => 'required|string|max:250|min:2',
            'descripcion' => 'required|string|min:2',
        ];
    }
}
