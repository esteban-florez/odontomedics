<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Guantes de Nitrilo',
            'brand' => 'Riester',
            'price' => 0_24,
        ]);

        Product::create([
            'name' => 'Amalgamas',
            'brand' => 'G&K',
            'price' => 1_50,
        ]);

        Product::create([
            'name' => 'Mascarilla',
            'brand' => 'Face Mask',
            'price' => 0_12,
        ]);
    }
}
