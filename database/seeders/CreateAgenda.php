<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Agenda;

class CreateAgenda extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Faker Indonesia

        for ($i = 0; $i < 20; $i++) {

            // tanggal acak
            $tanggalMulai = $faker->dateTimeBetween('-1 month', '+1 month');
            $tanggalSelesai = (clone $tanggalMulai)->modify('+' . rand(0, 3) . ' days');

            Agenda::create([
                'judul'            => $faker->sentence(4),
                'lokasi'           => $faker->address,
                'tanggal_mulai'    => $tanggalMulai->format('Y-m-d'),
                'tanggal_selesai'  => $tanggalSelesai->format('Y-m-d'),
                'penyelenggara'    => $faker->company,
                'deskripsi'        => $faker->paragraph(3),
            ]);
        }
    }
}
