<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

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
            'date' => ['required', 'date', 'after:today', 'before_or_equal:'.$inThreeMonths],
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

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $failed = $validator->errors()->any();

                $url = $this->url();

                if ($failed && str($url)->contains('reschedule')) {
                    session()->put('failed_action', $url);
                }
            }
        ];
    }
}
