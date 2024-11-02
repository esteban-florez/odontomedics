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
        Appointment::create([
            'date' => now()->subDays(3)->format('Y-m-d'),
            'time' => '10:00',
            'diagnosis' => Diagnosis::Caries,
            'patient_id' => Patient::first()->id,
            'doctor_id' => Doctor::first()->id,
            'procedure_id' => Procedure::first()->id,
            'created_at' => now()->subDay(5)->format('Y-m-d'),
            'updated_at' => now()->subDay(5)->format('Y-m-d'),
        ]);

        Appointment::create([
            'date' => now()->subDays(1)->format('Y-m-d'),
            'time' => '10:00',
            'diagnosis' => null,
            'patient_id' => Patient::first()->id,
            'doctor_id' => Doctor::first()->id,
            'procedure_id' => Procedure::first()->id,
            'created_at' => now()->subDay(2)->format('Y-m-d'),
            'updated_at' => now()->subDay(2)->format('Y-m-d'),
        ]);

        Appointment::create([
            'date' => now()->addDay(3)->format('Y-m-d'),
            'time' => '08:00',
            'diagnosis' => Diagnosis::Gingivitis,
            'patient_id' => Patient::skip(1)->first()->id,
            'doctor_id' => Doctor::skip(1)->first()->id,
        ]);
    }
}
