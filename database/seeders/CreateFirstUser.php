<?php
namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User utama (fixed)
        User::updateOrCreate(
            ['email' => 'naaila24si@mahasiswa.pcr.ac.id'],
            ['name'     => 'Naaila',
            'password' => Hash::make('Naaila24si'),
            'role'     => 'admin',
            ]
        );

        // Tambahan data user faker
        $faker = Faker::create('id_ID');

        // contoh generate 50 user random
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name'     => $faker->name(),
                'email'    => $faker->unique()->safeEmail(),
                'password' => Hash::make('password123'),
                // password default
            ]);
        }
    }
}
