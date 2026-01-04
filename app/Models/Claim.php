<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = [
        'found_item_id',
        'nama_pemilik',
        'kontak_pemilik',
        'lokasi_terakhir',
        'bukti',
        'status',
    ];

    public function foundItem() {
        return $this->belongsTo(FoundItem::class);
    }
}

