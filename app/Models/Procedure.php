<?php

namespace App\Models;

use App\Enums\Progress;
use App\Traits\HasSelectable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory, HasSelectable;

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function bill()
    {
        return $this->hasOne(Bill::class);
    }

    public function name(): Attribute
    {
        return Attribute::make(function () {
            $date = $this->created_at->format('d/m/Y');
            return "{$this->treatment->name} - {$date}";
        });
    }

    public function progress(): Attribute 
    {
        return Attribute::make(function () {            
            return match (true) {
                !$this->finished_at => Progress::Active,
                $this->finished_at => Progress::Finished,
            };
        });
    }
}
