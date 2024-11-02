<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = Supplier::all();

        Product::all()->each(function (Product $product) use ($suppliers) {
            Purchase::create([
                'amount' => 20,
                'cost' => $product->price * 20 + 10_00,
                'product_id' => $product->id,
                'supplier_id' => $suppliers->random()->id,
            ]);
        });
    }
}
