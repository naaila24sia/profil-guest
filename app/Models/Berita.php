<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'berita_id';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'kategori_id',
        'judul',
        'slug',
        'isi_html',
        'penulis',
        'status',
        'terbit_at',
    ];

    // Relasi: berita dimiliki oleh satu kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id', 'kategori_id');
    }
}
