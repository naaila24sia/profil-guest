<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita';
    protected $primaryKey = 'kategori_id';

    // jika PK bukan auto increment bigInt, tambahkan ini:
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
    ];

    // Relasi: satu kategori memiliki banyak berita
    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_id', 'kategori_id');
    }
}
