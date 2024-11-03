<?php

namespace App\Http\Requests;

use App\Enums\Code;
use App\Rules\UniquePhone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupplierRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:20', 'unique:suppliers'],
            'email' => ['required', 'email', 'unique:suppliers'],
            'code' => ['required', Rule::enum(Code::class)],
            'phone' => ['required', 'numeric', 'digits:7', new UniquePhone('suppliers', null)],
        ];
    }
}
