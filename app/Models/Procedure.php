<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function treatment() {
        return $this->belongsTo(Treatment::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

    public function items() {
        return $this->hasMany(Item::class);
    }

    public function bill() {
        return $this->hasOne(Bill::class);
    }
}
