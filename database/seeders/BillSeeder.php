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
        $procedure = Procedure::first();
        $total = $procedure->items->reduce(fn($sum, $item) => $sum + $item->product->price) + $procedure->treatment->price;

        Bill::create([
            'procedure_id' => $procedure->id,
            'total' => $total,
            'method' => Method::PagoMovil,
        ]);
    }
}
