<?php

namespace App\Rules;

use App\Models\Patient;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniquePhone implements ValidationRule, DataAwareRule
{
    protected $data;

    public function __construct(
        protected $table,
        protected $ignore,
    ) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $phone = "{$this->data['code']}{$value}";

        $exists = DB::table($this->table)
            ->where('phone', $phone)
            ->whereNot('id', $this->ignore)
            ->exists();

        if ($exists) {
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
