<?php

namespace App\Models;

use App\Traits\HasPhone;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory, HasPhone;

    protected $with = ['user'];

    protected $casts = ['birth' => 'datetime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function history(): HasMany
    {
        $with = ['doctor', 'procedure', 'procedure.treatment'];

        return $this->appointments()
            ->with($with)
            ->whereNotNull('diagnosis')
            ->latest();
    }

    public function fullname(): Attribute
    {
        return Attribute::make(fn() => "$this->name $this->surname");
    }

    public function cedula(): Attribute
    {
        return Attribute::make(fn() => "V-$this->ci");
    }
}
