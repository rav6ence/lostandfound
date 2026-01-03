<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoundItem extends Model
{
    protected $table = 'found_items';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'lokasi',
        'tanggal_ditemukan',
        'waktu_ditemukan',
        'lokasi_penemuan',
        'kronologi',
        'nama_penemu',
        'kontak_penemu',
        'alamat_penemu',
        'kontak',
        'deskripsi',
        'image',
    ];

    protected $casts = [
        'tanggal_ditemukan' => 'date',
    ];
}

