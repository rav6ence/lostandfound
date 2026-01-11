<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoundItem extends Model
{
    use HasFactory;
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
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'tanggal_ditemukan' => 'date',
    ];

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }
}