<?php

namespace App\Models;

use App\Traits\HasPhone;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory, HasPhone;

    protected $with = ['user'];

    public function user() {
        return $this->belongsTo(User::class);
    }

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
