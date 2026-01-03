<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LostItemController extends Controller
{
    public function index()
    {
        $items = LostItem::latest()->get();
        return view('lost_items.index', compact('items'));
    }


    public function create()
    {
        return view('lost_items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_barang'      => 'required|string',
            'tanggal_hilang'   => 'required|date',
            'kategori'         => 'required|string',
            'kontak'           => 'required|string',
            'lokasi_terakhir'  => 'required|string',
            'deskripsi'        => 'required|string',
            'gambar'           => 'nullable|image',
        ]);

        // STATUS DEFAULT → Dilaporkan (ID = 1)
        $data['status_id'] = 1;

        // IMAGE (OPTIONAL)
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('lost-items', 'public');
        }

        LostItem::create($data);

        return redirect()
            ->route('lost-items.index')
            ->with('success', 'Laporan barang hilang berhasil disimpan');
    }





    public function show($id)
    {
        $item = LostItem::findOrFail($id);
        return view('lost_items.show', compact('item'));
    }

    public function edit($id)
    {
        $item = LostItem::findOrFail($id);
        return view('lost_items.create', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = LostItem::findOrFail($id);

        $data = $request->validate([
            'nama_barang'      => 'required',
            'nama_pemilik'     => 'required',
            'kategori'         => 'required',
            'lokasi_terakhir'  => 'required',
            'tanggal_hilang'   => 'required|date',
            'kontak'           => 'required',
            'deskripsi'        => 'required',
            'image'            => 'nullable|image|max:2048',
            'status_id'        => 'required',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('lost_items', 'public');
        }

        $item->update($data);

        return redirect()->route('lost-items.index')
            ->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $item = LostItem::findOrFail($id);

        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('lost-items.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
