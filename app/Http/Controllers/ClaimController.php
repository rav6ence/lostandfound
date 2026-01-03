<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\FoundItem;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    // 2. Form klaim barang
    public function create($foundItemId)
    {
        $item = FoundItem::findOrFail($foundItemId);
        return view('claim.create', compact('item'));
    }

    // Simpan klaim
    public function store(Request $request)
    {
        $request->validate([
            'found_item_id' => 'required',
            'nama_pengklaim' => 'required',
            'kontak' => 'required',
            'keterangan' => 'required',
        ]);

        Claim::create($request->all());

        return redirect()->back()->with('success', 'Klaim berhasil dikirim');
    }
}
