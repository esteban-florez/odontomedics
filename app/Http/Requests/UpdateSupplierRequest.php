<?php

namespace App\Http\Requests;

use App\Enums\Code;
use App\Rules\UniquePhone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSupplierRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $supplier = $this->route('supplier');
        $unique = Rule::unique('suppliers')->ignore($supplier->id);
        $uniquePhone = new UniquePhone('suppliers', $supplier->id);

        return [
            'name' => ['required', 'string', 'min:3', 'max:20', $unique],
            'email' => ['required', 'email', $unique],
            'code' => ['required', Rule::enum(Code::class)],
            'phone' => ['required', 'numeric', 'digits:7', $uniquePhone],
        ];
    }
}
