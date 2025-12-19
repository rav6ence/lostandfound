<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoundItem;
use App\Models\Location;

class FoundItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = FoundItem::all();
        return view('found_items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        return view('found_items.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'tanggal_ditemukan' => 'required|date',
            'kontak' => 'required'
        ]);

        FoundItem::create($request->all());

        return redirect()
            ->route('found-items.index')
            ->with('success', 'Laporan barang ditemukan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = FoundItem::find($id);

        if (!$item) {
            return redirect()
                ->route('found-items.index')
                ->with('error', 'Data laporan tidak ditemukan');
        }

        return view('found_items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = FoundItem::find($id);
        $locations = Location::all();

        if (!$item) {
            return redirect()
                ->route('found-items.index')
                ->with('error', 'Data laporan tidak ditemukan');
        }

        return view('found_items.edit', compact('item', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = FoundItem::find($id);

        if (!$item) {
            return redirect()
                ->route('found-items.index')
                ->with('error', 'Data laporan tidak ditemukan');
        }

        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'tanggal_ditemukan' => 'required|date',
            'kontak' => 'required'
        ]);

        $item->update($request->all());

        return redirect()
            ->route('found-items.index')
            ->with('success', 'Laporan barang ditemukan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = FoundItem::find($id);

        if (!$item) {
            return redirect()
                ->route('found-items.index')
                ->with('error', 'Data laporan tidak ditemukan');
        }

        $item->delete();

        return redirect()
            ->route('found-items.index')
            ->with('success', 'Laporan barang ditemukan berhasil dihapus');
    }
}
