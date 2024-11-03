<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasPhone
{
    public function code(): Attribute {
        return Attribute::make(get: fn() => $this->getCode());
    }
    
    public function number(): Attribute {
        return Attribute::make(get: fn() => $this->getNumber());
    }

    public function tel(): Attribute {
        $code = $this->getCode();
        $number = $this->getNumber();
        return Attribute::make(get: fn() => "$code-$number");
    }

    private function getCode() {
        return str($this->phone)->substr(0, 4);
    }

    private function getNumber() {
        return str($this->phone)->substr(4, 7);
    }
}



