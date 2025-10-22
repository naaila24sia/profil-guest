<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'galeri_id';
    protected $fillable = ['judul', 'deskripsi','foto'];
}
