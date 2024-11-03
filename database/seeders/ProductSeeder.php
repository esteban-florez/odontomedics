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
            'description' => 'Guantes de nitrilo para procedimientos dentales.',
            'price' => 0_24,
        ]);

        Product::create([
            'name' => 'Amalgamas dentales',
            'description' => 'Amalgamas dentales para tratamientos de caries.',
            'price' => 1_50,
        ]);

        Product::create([
            'name' => 'Mascarilla',
            'description' => 'Mascarilla preventiva para uso médico.',
            'price' => 0_12,
        ]);
    }
}
