<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminBlogsUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     // Add authorization logic, if required. Typically return true if allowed.
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:250',
            'seourl' => [
                'required',
                'string',
                'max:250', 
                Rule::unique('seo_blog')->ignore($this->route('blog'), 'id')
            ],
            'resumen' => 'required|string|max:250',
            'detalle' => 'required|string',
            'archivo' => 'nullable|file|mimes:jpeg,png|max:2048',
            'estado' => 'required|string|max:2',
            'meta_titulo' => 'nullable|string|max:250',
            'meta_descripcion' => 'nullable|string|max:500',
        ];
    }
}
