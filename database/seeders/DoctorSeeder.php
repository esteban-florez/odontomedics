<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Enums\Specialty;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::create([
            'name' => 'Ana',
            'surname' => 'Blanco',
            'specialty' => Specialty::Ortodoncia,
            'ci' => '21482492'
        ]);

        Doctor::create([
            'name' => 'Mauricio',
            'surname' => 'Hernández',
            'specialty' => Specialty::Cirugia,
            'ci' => '23239012'
        ]);
    }
}
