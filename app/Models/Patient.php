<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

    public function fullname(): Attribute {
        return new Attribute(get: fn() => "$this->name $this->surname");
    }

    public function cedula(): Attribute {
        return new Attribute(get: fn() => "V-$this->ci");
    }

    public function tel(): Attribute {
        $str = str($this->phone);
        $code = $str->substr(0, 4);
        $phone = $str->substr(4);

        return new Attribute(get: fn() => "$code-$phone");
    }
}
