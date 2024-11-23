<?php

namespace Database\Seeders;

use App\Enums\Specialty;
use App\Models\User;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'doctor@prueba.com',
            'password' => 'pass123',
        ])->doctor()->create([
            'name' => 'Ana',
            'surname' => 'Blanco',
            'specialty' => Specialty::Ortodoncia,
            'ci' => '21482492'
        ]);

        User::create([
            'email' => 'doctor2@prueba.com',
            'password' => 'pass123',
        ])->doctor()->create([
            'name' => 'Mauricio',
            'surname' => 'Hernández',
            'specialty' => Specialty::Cirugia,
            'ci' => '23239012'
        ]);
    }
}
