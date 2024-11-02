<?php

namespace App\Rules;

use App\Models\Patient;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class UniquePhone implements ValidationRule, DataAwareRule
{
    protected $data;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $phone = $this->data['code'] . $value;

        if (Patient::where('phone', $phone)->exists()) {
            $fail('Este número de teléfono ya fué registrado.');
        }
    }

    /**
     * Set the data under validation.
     *
     * @param  array  $data
     * @return $this
     */
    public function setData(array $data) {
        $this->data = $data;
        return $this;
    }
}
