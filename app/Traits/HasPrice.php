<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Number;

trait HasPrice
{
    public function price(): Attribute
    {
        return Attribute::make(
            fn($value) => $value / 100,
            fn($value) => $value * 100,
        );
    }

    public function fprice(): Attribute
    {
        return Attribute::make(function () {
            $number = Number::format($this->price, precision: 2, locale: 'es');
            return "\${$number}";
        });
    }

    public function total(): Attribute
    {
        return Attribute::make(
            fn($value) => $value / 100,
            fn($value) => $value * 100,
        );
    }

    public function ftotal(): Attribute
    {
        return Attribute::make(function () {
            $number = Number::format($this->total, precision: 2, locale: 'es');
            return "\${$number}";
        });
    }
}
