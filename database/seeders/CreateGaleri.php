<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CreateGaleri extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 5; $i++) {

            $judul = $faker->sentence(3);

            DB::table('galeri')->insert([
                'judul'       => $judul,
                'deskripsi'   => $faker->text(150),
                'foto'        => Str::random(10) . '.jpg', // contoh nama file foto
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
