<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminHomeRequest extends FormRequest
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
            'texto1' => 'required|string|max:25|min:3',
            'texto2' => 'required|string|max:200|min:3',
        ];

    }
}
