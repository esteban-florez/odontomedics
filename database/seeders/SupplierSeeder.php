<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'name' => 'Insumos C.A.',
            'email' => 'proveedor@prueba.com',
            'phone' => '04121840529',
        ]);

        Supplier::create([
            'name' => 'Materiales C.A.',
            'email' => 'proveedor2@prueba.com',
            'phone' => '04125840215',
        ]);

        Supplier::create([
            'name' => 'Productos C.A.',
            'email' => 'proveedor3@prueba.com',
            'phone' => '04120293201',
        ]);
    }
}
