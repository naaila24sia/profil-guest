<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $primaryKey = 'agenda_id';
    protected $fillable = [
        'judul',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'penyelenggara',
        'deskripsi'
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

    // Relasi ke tabel media
    // Semua file agenda akan disimpan di media dengan ref_table = 'agenda'
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'agenda_id')
            ->where('ref_table', 'agenda')
            ->orderBy('sort_order');
    }
}
