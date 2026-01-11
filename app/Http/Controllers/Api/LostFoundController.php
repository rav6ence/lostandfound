<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LostItem;
use App\Models\FoundItem;
use App\Models\Claim;
use App\Http\Resources\LostItemResource;
use App\Http\Resources\FoundItemResource;
use Illuminate\Support\Facades\Validator;

class LostFoundController extends Controller
{
    // ==========================================
    // 1. LAPOR BARANG HILANG (POST)
    // ==========================================
    public function storeLostItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'lokasi_terakhir' => 'required|string|max:255',
            'tanggal_hilang' => 'required|date',
            'deskripsi' => 'required|string',
            'kontak' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('lost_items', 'public');
        }

        $lostItem = LostItem::create([
            'user_id' => $request->user()->id,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'lokasi_terakhir' => $request->lokasi_terakhir,
            'status_id' => 1,
            'tanggal_hilang' => $request->tanggal_hilang,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
            'image' => $imagePath,
        ]);

        return response()->json([
            'message' => 'Laporan kehilangan berhasil dibuat',
            'data' => new LostItemResource($lostItem)
        ], 201);
    }

    // ==========================================
    // 2. LAPOR BARANG DITEMUKAN (POST)
    // ==========================================
    public function storeFoundItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal_ditemukan' => 'required|date',
            'waktu_ditemukan' => 'required',
            'lokasi_penemuan' => 'required|string|max:255',
            'nama_penemu' => 'required|string|max:255',
            'kontak_penemu' => 'required|string|max:255',
            'alamat_penemu' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('found_items', 'public');
        }

        $foundItem = FoundItem::create([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'tanggal_ditemukan' => $request->tanggal_ditemukan,
            'waktu_ditemukan' => $request->waktu_ditemukan,
            'lokasi_penemuan' => $request->lokasi_penemuan,
            'kronologi' => $request->kronologi,
            'nama_penemu' => $request->nama_penemu,
            'kontak_penemu' => $request->kontak_penemu,
            'alamat_penemu' => $request->alamat_penemu,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath,
        ]);

        return response()->json([
            'message' => 'Laporan penemuan barang berhasil dibuat',
            'data' => new FoundItemResource($foundItem)
        ], 201);
    }

    // ==========================================
    // 3. LIST SEMUA BARANG TEMUAN (GET)
    // ==========================================
    public function indexFoundItems()
    {
        $items = FoundItem::latest()->get();
        
        return response()->json([
            'message' => 'List Data Found Items',
            'data' => FoundItemResource::collection($items)
        ], 200);
    }

    // ==========================================
    // 4. KLAIM BARANG TEMUAN (POST)
    // ==========================================
    public function claimItem(Request $request, $found_item_id)
    {
        $foundItem = FoundItem::find($found_item_id);
        if (!$foundItem) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_pemilik' => 'required|string',
            'kontak_pemilik' => 'required|string',
            'lokasi_terakhir' => 'required|string',
            'bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('claims_evidence', 'public');
        }

        $claim = Claim::create([
            'found_item_id' => $found_item_id,
            'user_id' => $request->user()->id,
            'nama_pemilik' => $request->nama_pemilik,
            'kontak_pemilik' => $request->kontak_pemilik,
            'lokasi_terakhir' => $request->lokasi_terakhir,
            'bukti' => $buktiPath,
            'status' => 'pending'
        ]);

        return response()->json([
            'message' => 'Klaim berhasil dikirim, tunggu verifikasi admin.',
            'data' => $claim
        ], 201);
    }

    // ==========================================
    // 5. HISTORY SAYA (GET)
    // ==========================================
    public function history(Request $request)
    {
        $userId = $request->user()->id;

        // Barang yang saya lapor hilang
        $myLostItems = LostItem::where('user_id', $userId)->latest()->get();

        // Barang yang saya klaim
        $myClaims = Claim::where('user_id', $userId)->with('foundItem')->latest()->get();

        return response()->json([
            'message' => 'Riwayat Aktivitas Anda',
            'data' => [
                'laporan_kehilangan' => LostItemResource::collection($myLostItems),
                'riwayat_klaim' => $myClaims
            ]
        ], 200);
    }
}