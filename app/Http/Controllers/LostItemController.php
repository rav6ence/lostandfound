<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
            'nama_barang' => 'required|string',
            'tanggal_hilang' => 'required|date',
            'kategori' => 'required|string',
            'kontak' => 'required|string',
            'lokasi_terakhir' => 'required|string',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data['status_id'] = 1;
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('lost-items', 'public');
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
        Gate::authorize('admin-only');
        $item = LostItem::findOrFail($id);
        return view('lost_items.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        Gate::authorize('admin-only');
        $item = LostItem::findOrFail($id);

        $data = $request->validate([
            'nama_barang' => 'required|string',
            'kategori' => 'required|string',
            'lokasi_terakhir' => 'required|string',
            'tanggal_hilang' => 'required|date',
            'kontak' => 'required|string',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status_id' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('lost-items', 'public');
        }

        $item->update($data);

        return redirect()
            ->route('lost-items.index')
            ->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        Gate::authorize('admin-only');
        $item = LostItem::findOrFail($id);

        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()
            ->route('lost-items.index')
            ->with('success', 'Data berhasil dihapus');
    }
}