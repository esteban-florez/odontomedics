<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'integer'],
            'supplier_id' => ['required', 'integer'],
            'amount' => ['required', 'numeric', 'integer', 'between:1,10000'],
            'cost' => ['required', 'numeric', 'between:0.01,10000'],
        ];
    }
}
