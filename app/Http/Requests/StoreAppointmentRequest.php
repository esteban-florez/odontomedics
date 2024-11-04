<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $inThreeMonths = now()->addMonth(3)->format('d-m-Y');

        return [
            'date' => ['required', 'date', 'after_or_equal:tomorrow', 'before_or_equal:'.$inThreeMonths],
            'time' => ['required', 'date_format:H:i', 'after_or_equal:07:00', 'before_or_equal:17:00'],
        ];
    }

    public function messages()
    {
        return [
            'time.after_or_equal' => 'El campo hora debe debe ser una hora posterior o igual a las :date.',
            'time.before_or_equal' => 'El campo hora debe debe ser una hora anterior o igual a las :date.',
        ];
    }
}
