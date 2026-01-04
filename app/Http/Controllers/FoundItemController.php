<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoundItemController extends Controller
{
    public function index()
    {
        $items = FoundItem::all();
        return view('found_items.index', compact('items'));
    }

    public function create()
    {
        return view('found_items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_barang'       => 'required|string|max:255',
            'kategori'          => 'required|string|max:255',
            'lokasi'            => 'required|string|max:255',
            'tanggal_ditemukan' => 'required|date',
            'waktu_ditemukan'   => 'required',
            'lokasi_penemuan'   => 'required|string|max:255',
            'kronologi'         => 'nullable|string',
            'nama_penemu'       => 'required|string|max:255',
            'kontak_penemu'     => 'required|string|max:255',
            'alamat_penemu'     => 'required|string|max:255',
            'kontak'            => 'required|string|max:255',
            'deskripsi'         => 'required|string',
            'image'             => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('found-items', 'public');
        }

        FoundItem::create($data);

        return redirect()->route('found-items.index')
            ->with('success', 'Barang ditemukan berhasil disimpan');
    }

    public function show($id)
    {
        $item = FoundItem::findOrFail($id);
        return view('found_items.show', compact('item'));
    }

    public function edit($id)
    {
        $item = FoundItem::findOrFail($id);
        return view('found_items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = FoundItem::findOrFail($id);

        $data = $request->validate([
            'nama_barang'       => 'required|string|max:255',
            'kategori'          => 'required|string|max:255',
            'lokasi'            => 'required|string|max:255',
            'tanggal_ditemukan' => 'required|date',
            'waktu_ditemukan'   => 'required',
            'lokasi_penemuan'   => 'required|string|max:255',
            'kronologi'         => 'nullable|string',
            'nama_penemu'       => 'required|string|max:255',
            'kontak_penemu'     => 'required|string|max:255',
            'alamat_penemu'     => 'required|string|max:255',
            'kontak'            => 'required|string|max:255',
            'deskripsi'         => 'required|string',
            'image'             => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('found-items', 'public');
        }

        $item->update($data);

        return redirect()->route('found-items.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $item = FoundItem::findOrFail($id);

        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('found-items.index')->with('success', 'Data berhasil dihapus');
    }
}