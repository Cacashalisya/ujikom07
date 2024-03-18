<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obyek_wisata extends Model
{
    use HasFactory;
    protected $table = 'obyek_wisata';
    protected $fillable = [
        'nama_wisata',
        'deskripsi_wisata',
        'fasilitas',
        'foto1',
        'foto2', 
        'foto3', 
        'foto4', 
        'foto5',
        'id_kategori_wisata'
    ];

    public function fkategori_wisata(){
        return $this->belongsTo(Kategori_wisata::class, 'kategori_wisata', 'id');
    }
}

