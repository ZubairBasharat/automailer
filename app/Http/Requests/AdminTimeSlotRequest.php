<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\DayOfWeek;

class AdminTimeSlotRequest extends FormRequest
{
    // public function authorize()
    // {
    //     // You can add any authorization logic here
    //     return true;
    // }

    public function rules()
    {
        return [
            'day' => ['required', 'string', 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday'],
            'texto' => 'required|string',
            'estado' => 'required|string',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('day')) {
            $this->merge([
                'day' => strtolower($this->day),
            ]);
        }
    }

    public function validated($key = null, $default = null)
    {
        $validated = parent::validated($key, $default);

        if (isset($validated['day'])) {
            $validated['day'] = DayOfWeek::from($validated['day']);
        }

        return $validated;
    }
}
