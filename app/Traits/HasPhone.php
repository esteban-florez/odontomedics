<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasPhone
{
    public function code(): Attribute {
        return Attribute::make(fn() => str($this->phone)->substr(0, 4));
    }
    
    public function number(): Attribute {
        return Attribute::make(fn() => str($this->phone)->substr(4, 7));
    }

    public function tel(): Attribute {
        return Attribute::make(fn() => "$this->code-$this->number");
    }
}



