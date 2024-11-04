<?php

namespace Database\Seeders;

use App\Enums\Diagnosis;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Procedure;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patient = Patient::first()->id;
        $doctor = Doctor::first()->id;

        Appointment::create([
            'date' => now()->subDays(3)->format('Y-m-d'),
            'time' => '10:00',
            'diagnosis' => Diagnosis::Caries,
            'patient_id' => $patient,
            'doctor_id' => $doctor,
            'created_at' => now()->subDay(5)->format('Y-m-d'),
            'updated_at' => now()->subDay(5)->format('Y-m-d'),
        ]);

        Appointment::create([
            'date' => now()->subDays(1)->format('Y-m-d'),
            'time' => '10:00',
            'diagnosis' => null,
            'patient_id' => $patient,
            'doctor_id' => $doctor,
            'procedure_id' => Procedure::first()->id,
            'created_at' => now()->subDay(2)->format('Y-m-d'),
            'updated_at' => now()->subDay(2)->format('Y-m-d'),
        ]);

        Appointment::create([
            'date' => now()->addDay(3)->format('Y-m-d'),
            'time' => '08:00',
            'patient_id' => $patient,
            'doctor_id' => Doctor::skip(1)->first()->id,
        ]);
    }
}
