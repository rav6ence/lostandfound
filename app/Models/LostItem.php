<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    protected $fillable = [
        'nama_barang',
        'tanggal_hilang',
        'kategori',
        'kontak',
        'lokasi_terakhir',
        'deskripsi',
        'status_id',
    ];





    protected $casts = [
        'tanggal_hilang' => 'date',
    ];
}
