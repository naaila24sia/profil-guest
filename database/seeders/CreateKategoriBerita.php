<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\KategoriBerita;
use Illuminate\Database\Seeder;

class CreateKategoriBerita extends Seeder
{
    public function run(): void
    {
        // 5 data statis (hanya insert kalau belum ada)
        KategoriBerita::insertOrIgnore([
            [
                'nama'      => 'Pemerintahan',
                'slug'      => Str::slug('Pemerintahan'),
                'deskripsi' => 'Kategori berita tentang informasi dan kegiatan pemerintahan desa.',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nama'      => 'Kesehatan',
                'slug'      => Str::slug('Kesehatan'),
                'deskripsi' => 'Berita mengenai kesehatan masyarakat dan pelayanan kesehatan.',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nama'      => 'Pendidikan',
                'slug'      => Str::slug('Pendidikan'),
                'deskripsi' => 'Update informasi terkait pendidikan, sekolah, dan pelatihan.',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nama'      => 'Kegiatan Warga',
                'slug'      => Str::slug('Kegiatan Warga'),
                'deskripsi' => 'Berisi dokumentasi kegiatan sosial dan aktivitas warga.',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nama'      => 'Pembangunan Desa',
                'slug'      => Str::slug('Pembangunan Desa'),
                'deskripsi' => 'Informasi seputar proyek pembangunan dan infrastruktur desa.',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);

        // faker sederhana
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {
            $nama = ucfirst($faker->words(2, true));

            KategoriBerita::create([
                'nama'      => $nama,
                'slug'      => Str::slug($nama) . '-' . Str::random(5),
                'deskripsi' => $faker->sentence(10),
            ]);
        }
    }
}
