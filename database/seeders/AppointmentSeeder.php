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
            'date' => now()->subDays(7)->format('Y-m-d'),
            'time' => '10:00',
            'diagnosis' => Diagnosis::Caries,
            'completed' => true,
            'patient_id' => $patient,
            'doctor_id' => $doctor,
            'created_at' => now()->subDay(5)->format('Y-m-d'),
            'updated_at' => now()->subDay(5)->format('Y-m-d'),
        ]);

        Appointment::create([
            'date' => now()->subDays(5)->format('Y-m-d'),
            'time' => '10:00',
            'completed' => true,
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

        Appointment::create([
            'date' => now()->addDay(15)->format('Y-m-d'),
            'time' => '09:00',
            'patient_id' => $patient,
        ]);

        Appointment::create([
            'date' => now()->subDay(1)->format('Y-m-d'),
            'time' => '01:00',
            'patient_id' => Patient::skip(1)->first()->id,
            'doctor_id' => $doctor,
        ]);
    }
}
