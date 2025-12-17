<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Admin utama
        User::updateOrCreate(
            ['email' => 'suci24si@mahasiswa.pcr.ac.id'],
            [
                'name'     => 'Suci Dwimas Ayu',
                'password' => Hash::make('suciayu28'),
                'role'     => 'admin', // 👈 ADMIN
            ]
        );

        $faker = Faker::create('id_ID');

        // 100 pelanggan
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'name'     => $faker->name(),
                'email'    => $faker->unique()->safeEmail(),
                'password' => Hash::make('password123'),
                'role'     => 'pelanggan', // 👈 PELANGGAN
            ]);
        }
    }
}
