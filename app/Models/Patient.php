<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $with = ['user'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

    public function fullname(): Attribute {
        return Attribute::make(get: fn() => "$this->name $this->surname");
    }

    public function cedula(): Attribute {
        return Attribute::make(get: fn() => "V-$this->ci");
    }

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
