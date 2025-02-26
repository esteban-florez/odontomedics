<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PatientSeeder::class,
            DoctorSeeder::class,
            TreatmentSeeder::class,
            ProductSeeder::class,
            SupplierSeeder::class,
            PurchaseSeeder::class,
            ProcedureSeeder::class,
            AppointmentSeeder::class,
            ItemSeeder::class,
            BillSeeder::class,
        ]);
    }
}
