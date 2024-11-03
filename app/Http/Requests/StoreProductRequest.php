<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:20', 'unique:products'],
            'description' => ['required', 'string', 'min:10', 'max:100'],
            'price' => ['required', 'numeric', 'between:0.01,1000'],
        ];
    }
}
