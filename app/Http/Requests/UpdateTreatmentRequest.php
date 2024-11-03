<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTreatmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $treatment = $this->route('treatment');
        $unique = Rule::unique('treatments')->ignore($treatment->id);

        return [
            'name' => ['required', 'string', 'min:5', 'max:20', $unique],
            'price' => ['required', 'numeric', 'between:1,10000']
        ];
    }
}
