<?php

namespace App\Models;

use App\Traits\HasSelectable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory, HasSelectable;

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function fullname(): Attribute
    {
        return Attribute::make(fn() => "$this->name $this->surname");
    }

    public function cedula(): Attribute
    {
        return Attribute::make(fn() => "V-$this->ci");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
