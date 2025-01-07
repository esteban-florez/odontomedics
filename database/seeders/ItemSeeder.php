<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Procedure;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $procedureId = Procedure::first()->id;

        $later = now()->addSecond(1);

        Item::create([
            'amount' => 6,
            'product_id' => Product::first()->id,
            'procedure_id' => $procedureId,
            'created_at' => $later,
            'updated_at' => $later,
        ]);

        Item::create([
            'amount' => 2,
            'product_id' => Product::skip(1)->first()->id,
            'procedure_id' => $procedureId,
            'created_at' => $later,
            'updated_at' => $later,
        ]);

        Item::create([
            'amount' => 3,
            'product_id' => Product::skip(2)->first()->id,
            'procedure_id' => $procedureId,
            'created_at' => $later,
            'updated_at' => $later,
        ]);
    }
}
