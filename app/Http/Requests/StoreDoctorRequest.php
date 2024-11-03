<?php

namespace App\Http\Requests;

use App\Enums\Specialty;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDoctorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:20'],
            'surname' => ['required', 'string', 'min:3', 'max:20'],
            'ci' => ['required', 'numeric', 'digits_between:1,8', 'unique:doctors'],
            'specialty' => ['required', Rule::enum(Specialty::class)],
        ];
    }
}
