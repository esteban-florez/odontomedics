<?php

namespace App\Http\Requests;

use App\Enums\Code;
use App\Enums\Gender;
use App\Rules\UniquePhone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePatientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $patient = $this->route('patient');

        $unique = Rule::unique('patients')
            ->ignore($patient->id);

        $uniquePhone = new UniquePhone('patients', $patient->id);

        return [
            'name' => ['required', 'string', 'min:3', 'max:20'],
            'surname' => ['required', 'string', 'min:3', 'max:20'],
            'address' => ['required', 'string', 'min:5', 'max:50'],
            'ci' => ['required', 'numeric', 'digits_between:1,8', $unique],
            'code' => ['required', Rule::enum(Code::class)],
            'phone' => ['required', 'numeric', 'digits:7', $uniquePhone],
            'birth' => ['required', 'date', 'before:today'],
            'gender' => ['required', Rule::enum(Gender::class)],
        ];
    }
}
