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
        $foundItem = FoundItem::findOrFail($foundItemId);
        return view('claim_items.create', compact('foundItem'));
    }

    // Simpan klaim
    public function store(Request $request)
    {
        $data = $request->validate([
            'found_item_id'   => 'required|exists:found_items,id',
            'nama_pemilik'    => 'required|string|max:255',
            'kontak_pemilik'  => 'required|string|max:255',
            'lokasi_terakhir' => 'required|string|max:255',
            'bukti'           => 'required|file|max:2048',
        ]);

        if ($request->hasFile('bukti')) {
            $data['bukti'] = $request->file('bukti')->store('claim-bukti', 'public');
        }

        Claim::create($data);
        
        FoundItem::where('id', $data['found_item_id'])->delete();

        return redirect()
            ->route('found-items.index')
            ->with('success', 'Claim berhasil dikirim.');
    }
}
