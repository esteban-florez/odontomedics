<?php

namespace Database\Seeders;

use App\Models\Treatment;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Treatment::create([
            'name' => 'Limpieza',
            'price' => 20_00,
        ]);

        Treatment::create([
            'name' => 'Endodoncia',
            'price' => 40_00,
        ]);

        Treatment::create([
            'name' => 'Empastes',
            'price' => 30_00,
        ]);
    }
}
