<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\Procedure;
use App\Models\Treatment;
use Illuminate\Database\Seeder;

class ProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Procedure::create([
            'description' => 'Endodoncia en la caries del primer molar.',
            'patient_id' => Patient::first()->id,
            'treatment_id' => Treatment::where('name', 'Endodoncia')->first()->id,
        ]);
    }
}
