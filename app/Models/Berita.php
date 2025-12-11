<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table      = 'berita';
    protected $primaryKey = 'berita_id';

    public $incrementing = true;
    protected $keyType   = 'int';

    protected $fillable = [
        'kategori_id',
        'judul',
        'slug',
        'isi_html',
        'penulis',
        'status',
        'terbit_at',
    ];

    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
    }

    // Relasi: berita dimiliki oleh satu kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id', 'kategori_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'berita_id')
            ->where('ref_table', 'berita')
            ->orderBy('sort_order', 'asc');
    }

}
