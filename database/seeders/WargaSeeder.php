<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 1000; $i++) {

            DB::table('warga')->insert([
                'user_id'       => null,
                'no_ktp'        => $faker->unique()->numerify('################'),
                'nama'          => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama'         => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'pekerjaan'     => $faker->jobTitle(),
                'telp'          => $faker->numerify('08##########'),
                'email'         => $faker->unique()->safeEmail(),
                'password'      => Hash::make('password123'),
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
