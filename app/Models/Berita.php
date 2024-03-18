<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $fillable = [
        'judul',
        'berita',
        'tgl_post',
        'foto',
        'id_kategori_berita'
    ];
    public function fkata(){
        return $this->belongsTo(Kategori_berita::class, 'id_kategori_berita', 'id');
    }
}

