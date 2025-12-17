<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoundItem extends Model
{
    protected $fillable = [
        'nama_barang',
        'kategori',
        'location_id',
        'status',
        'tanggal_ditemukan',
        'deskripsi',
        'kontak'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
