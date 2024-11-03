<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Number;

trait HasPrice
{
    public function price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value / 100,
            set: fn($value) => $value * 100,
        );
    }

    public function fprice(): Attribute
    {
        $price = Number::format($this->price, precision: 2, locale: 'es');

        return Attribute::make(
            get: fn() => "\${$price}",
        );
    }
}
