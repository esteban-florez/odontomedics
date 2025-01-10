<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function doctorName(): Attribute {
        return Attribute::make(function () {
            if ($this->doctor) {
                return $this->doctor->fullname;
            }

            return $this->status === Status::Canceled
                ? 'No asignado' : 'Por asignar';
        });
    }

    public function badge(): Attribute {
        return Attribute::make(function () {
            return match ($this->status) {
                Status::Pending => 'text-bg-secondary',
                Status::Canceled => 'text-bg-danger',
                Status::Approved => 'text-bg-success',
                Status::Unfilled => 'text-bg-warning',
                Status::Completed => 'text-bg-primary',
            };
        });
    }

    public function scopeForUser(Builder $query)
    {
        $user = Auth::user();
        $with = ['patient', 'doctor', 'procedure', 'procedure.treatment'];

        $query->with($with)
            ->when(!$user->is_admin, function (Builder $query) use ($user) {
                return $user->patient
                    ? $query->where('patient_id', $user->patient->id)
                    : $query->where('doctor_id', $user->doctor->id);
            })->latest();
    }
}
