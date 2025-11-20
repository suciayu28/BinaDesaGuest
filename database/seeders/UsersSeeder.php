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
        $faker = Faker::create('id_ID');

        // generate 10 user contoh (boleh ubah angka)
        for ($i = 0; $i < 1000; $i++) {
            User::create([
                'name'      => $faker->name(),
                'email'     => $faker->unique()->safeEmail(),
                'password'  => Hash::make('password123'),
            ]);
        }
    }
}
