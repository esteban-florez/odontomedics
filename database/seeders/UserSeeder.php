<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@prueba.com',
            'password' => 'pass123',
            'is_admin' => true,
        ]);

        User::create([
            'email' => 'paciente@prueba.com',
            'password' => 'pass123',
        ]);

        User::create([
            'email' => 'paciente2@prueba.com',
            'password' => 'pass123',
        ]);
    }
}
