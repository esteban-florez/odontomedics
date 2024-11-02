<?php

namespace Database\Seeders;

use App\Enums\Gender;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create([
            'name' => 'Lucas',
            'surname' => 'González',
            'address' => 'Calle 45, Casa 10, La Victoria, Aragua',
            'phone' => '04121234567',
            'birthdate' => now()->subYears(21),
            'gender' => Gender::Male,
            'user_id' => User::where('email', 'paciente@prueba.com')->first()->id,
        ]);

        Patient::create([
            'name' => 'María',
            'surname' => 'López',
            'address' => 'Calle 39, Casa 24, La Victoria, Aragua',
            'phone' => '041287654321',
            'birthdate' => now()->subYears(24),
            'gender' => Gender::Female,
            'user_id' => User::where('email', 'paciente2@prueba.com')->first()->id,
        ]);
    }
}
