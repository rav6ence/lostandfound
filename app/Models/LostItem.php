<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    protected $fillable = [
        'nama_barang',
        'kategori',
        'location_id',
        'status',
        'tanggal_hilang',
        'deskripsi',
        'kontak'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
