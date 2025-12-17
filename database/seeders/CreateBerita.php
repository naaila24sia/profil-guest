<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\Berita;

class CreateBerita extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 5; $i++) {

            $judul = $faker->sentence(4);
            $slug = Str::slug($judul);

            Berita::create([
                'kategori_id' => rand(1, 3),
                'judul'       => $judul,
                'slug'        => $slug,
                'isi_html'    => "<p>" . $faker->paragraph(5) . "</p>",
                'penulis'     => $faker->firstName,
                'terbit_at'   => $faker->date('Y-m-d H:i:s'),
            ]);
        }
    }
}
