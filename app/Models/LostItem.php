<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    use HasFactory;

    // Sesuai tabel lost_items
    protected $fillable = [
        'user_id',
        'nama_barang',
        'kategori',
        'lokasi_terakhir',
        'status_id',
        'tanggal_hilang',
        'deskripsi',
        'kontak',
        'image'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relasi ke Status (Optional, jika ada model Status)
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}