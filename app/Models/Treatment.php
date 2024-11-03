<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class Treatment extends Model
{
    use HasFactory;

    public function procedures() {
        return $this->hasMany(Procedure::class);
    }

    public function price(): Attribute {
        return Attribute::make(
            get: fn($value) => $value / 100,
            set: fn($value) => $value * 100,
        );
    }

    public function fprice(): Attribute {
        $price = Number::format($this->price, precision: 2, locale: 'es');

        return Attribute::make(
            get: fn() => "\${$price}",
        );
    }
}
