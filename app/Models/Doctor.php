<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

    public function fullname(): Attribute {
        return Attribute::make(fn() => "$this->name $this->surname");
    }

    public function cedula(): Attribute {
        return Attribute::make(fn() => "V-$this->ci");
    }
}
