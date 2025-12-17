<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use App\Models\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LostItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = LostItem::with('location')->get();
        return view('lost_items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        return view('lost_items.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'location_id' => 'required',
            'status' => 'required',
            'tanggal_hilang' => 'required|date',
            'deskripsi' => 'required',
            'kontak' => 'required'
        ]);

        LostItem::create($request->all());

        return redirect()->route('lost-items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('lost_items.show', compact('lostItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $locations = Location::all();
        return view('lost_items.edit', compact('lostItem', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lostItem = LostItem::findOrFail($id);
        $lostItem->update($request->all());

        return redirect()->route('lost-items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lostItem = LostItem::findOrFail($id);
        $lostItem->delete();

        return redirect()->route('lost-items.index');
    }
}
