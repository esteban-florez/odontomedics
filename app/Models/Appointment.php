<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'datetime',
        'time' => 'datetime',
    ];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function procedure() {
        return $this->belongsTo(Procedure::class);
    }

    public function datetime(): Attribute {
        return Attribute::make(function () {
            $datetime = $this->time->clone();
            $date = $this->date;
    
            $datetime->setDay($date->day)
                ->setMonth($date->month)
                ->setYear($date->year);
    
            return $datetime;
        });
    }
    
    public function outdated(): Attribute {
        return Attribute::make(function () {
            return now()->isAfter($this->datetime);
        });
    }

    public function status(): Attribute {
        return Attribute::make(function () {
            $outdated = $this->outdated;
            $assigned = !!$this->doctor;
            $completed = !!$this->diagnosis;
            
            $status = match (true) {
                $this->canceled || ($outdated && !$assigned) => Status::Canceled,
                !$outdated && !$assigned => Status::Pending,
                !$outdated && $assigned => Status::Approved,
                !$completed && $outdated && $assigned => Status::Unfilled,
                $completed && $outdated && $assigned => Status::Completed,
            };

            return $status;
        });
    }

    public function reschedulable(): Attribute {
        return Attribute::make(function () {
            return $this->status === Status::Canceled 
                || $this->status === Status::Approved;
        });
    }

    public function cancelable(): Attribute {
        return Attribute::make(function () {
            return $this->status === Status::Approved 
                || $this->status === Status::Pending;
        });
    }
}
