<?php

namespace App\Models;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profil';
    protected $primaryKey = 'profil_id';

    protected $fillable = [
        'nama_desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'alamat_kantor',
        'email',
        'telepon',
        'visi',
        'misi'
    ];

    public function logo()
{
    return $this->hasOne(Media::class, 'ref_id', 'profil_id')
        ->where('ref_table', 'profil');
}

}
