<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $product = $this->route('product');
        $unique = Rule::unique('products')->ignore($product->id);

        return [
            'name' => ['required', 'string', 'min:5', 'max:20', $unique],
            'description' => ['required', 'string', 'min:10', 'max:100'],
            'price' => ['required', 'numeric', 'between:0.01,1000'],
        ];
    }
}
