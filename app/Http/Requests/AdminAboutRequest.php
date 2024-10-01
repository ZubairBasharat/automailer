<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminAboutRequest extends FormRequest
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
        $rules =  [
            'titulo' => 'required|string|max:250',
            'detalle' => 'nullable|string',
            'foto' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'estado' => 'required|string|max:2',
            'meta_titulo' => 'required|string|max:250',
            'seodetalle' => 'required|string',
            'orden' => 'nullable|integer',
        ];

        if ($this->route('item')) {
            $rules['seourl'] = [
                'required',
                Rule::unique('seo_seccion')
                    ->ignore($this->route('item'), 'idseccion')
                    ->where(function ($query) {
                        return $query->where('tipo', 6);
                    }),
                'string',
            ];
        }
        else {
            $rules['seourl'] = [
                'required',
                Rule::unique('seo_seccion')
                    ->where(function ($query) {
                        return $query->where('tipo', 6);
                    }),
                'string',
            ];
        }

        return $rules;
    }
}
