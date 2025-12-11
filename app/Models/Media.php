<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'media_id';

    public $timestamps = true;

    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_name',
        'caption',
        'mime_type',
        'sort_order'
    ];

    // RELASI GENERIC (media bisa milik berita / galeri / apapun)
    public function owner()
    {
        return $this->morphTo(null, 'ref_table', 'ref_id');
    }
}

