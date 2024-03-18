<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_wisata extends Model
{
    use HasFactory;
    protected $table = 'kategori_wisata';
    protected $fillable = [
        'kategori_wisata',
        'id_kategori_wisata'
    ];
}