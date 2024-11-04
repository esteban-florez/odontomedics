<?php

namespace Database\Seeders;

use App\Enums\Method;
use App\Models\Bill;
use App\Models\Procedure;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bill::create([
            'procedure_id' => Procedure::first()->id,
            'total' => 190, // numero arbitrario
            'method' => Method::PagoMovil,
        ]);
    }
}
