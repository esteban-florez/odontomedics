<?php

namespace App\Http\Requests;

use App\Enums\Code;
use App\Enums\Gender;
use App\Rules\UniquePhone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StorePatientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', Password::defaults(), 'confirmed'],
            'name' => ['required', 'string', 'min:3', 'max:20'],
            'surname' => ['required', 'string', 'min:3', 'max:20'],
            'address' => ['required', 'string', 'min:5', 'max:50'],
            'ci' => ['required', 'numeric', 'digits_between:1,8', 'unique:patients'],
            'code' => ['required', Rule::enum(Code::class)],
            'phone' => ['required', 'numeric', 'digits:7', new UniquePhone('patients', null)],
            'birth' => ['required', 'date', 'before:today'],
            'gender' => ['required', Rule::enum(Gender::class)],
        ];
    }
}
