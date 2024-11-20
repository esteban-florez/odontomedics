<?php

namespace App\Http\Requests;

use App\Enums\Diagnosis;
use App\Enums\Method;
use App\Enums\Progress;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAppointmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $exclude = 'exclude_unless:procedure_id,new';

        return [
            'diagnosis' => ['required', Rule::enum(Diagnosis::class)],
            'procedure_id' => ['nullable', 'string'],
            'treatment_id' => [$exclude, 'required', 'integer'],
            'progress' => [$exclude, 'required', Rule::enum(Progress::class)],
            'description' => [$exclude, 'required', 'string', 'min:5', 'max:50'],
            'items' => [$exclude, 'required', 'json'],
            'total' => [$exclude, 'required', 'numeric', 'decimal:2'],
            'method' => [$exclude, 'required', Rule::enum(Method::class)],
        ];
    }
}
