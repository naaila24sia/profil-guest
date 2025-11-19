<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriBerita;
use Illuminate\Support\Str;

class CreateKategoriBerita extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Pemerintahan',
                'slug' => Str::slug('Pemerintahan'),
                'deskripsi' => 'Kategori berita tentang informasi dan kegiatan pemerintahan desa.'
            ],
            [
                'nama' => 'Kesehatan',
                'slug' => Str::slug('Kesehatan'),
                'deskripsi' => 'Berita mengenai kesehatan masyarakat dan pelayanan kesehatan.'
            ],
            [
                'nama' => 'Pendidikan',
                'slug' => Str::slug('Pendidikan'),
                'deskripsi' => 'Update informasi terkait pendidikan, sekolah, dan pelatihan.'
            ],
            [
                'nama' => 'Kegiatan Warga',
                'slug' => Str::slug('Kegiatan Warga'),
                'deskripsi' => 'Berisi dokumentasi kegiatan sosial dan aktivitas warga.'
            ],
            [
                'nama' => 'Pembangunan Desa',
                'slug' => Str::slug('Pembangunan Desa'),
                'deskripsi' => 'Informasi seputar proyek pembangunan dan infrastruktur desa.'
            ],
        ];

        KategoriBerita::insert($data);
    }
}
