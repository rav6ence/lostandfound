@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="d-flex justify-content-center py-5">
    <div class="card shadow-sm" style="max-width:500px; width:100%;">
        <div class="card-header text-center">
            <h4 class="mb-0">Edit Barang</h4>
        </div>

        {{-- Foto --}}
        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height:220px; overflow:hidden;">
            @if($item->foto)
                <img src="{{ asset('storage/' . $item->foto) }}" class="w-100 h-100" style="object-fit:cover;">
            @else
                <div class="text-center text-secondary">
                    <i class="bi bi-image" style="font-size:2.5rem;"></i><br>
                    <small>Tidak ada foto</small>
                </div>
            @endif
        </div>

        {{-- Form --}}
        <div class="card-body p-3">
            <form action="{{ route('found-items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="file" name="foto" class="form-control mb-3">
                <input type="text" name="nama_barang" class="form-control mb-2" placeholder="Nama Barang" value="{{ old('nama_barang', $item->nama_barang) }}" required>
                <input type="text" name="kategori" class="form-control mb-2" placeholder="Kategori" value="{{ old('kategori', $item->kategori) }}">
                <input type="text" name="lokasi" class="form-control mb-2" placeholder="Lokasi" value="{{ old('lokasi', $item->lokasi) }}">
                <input type="date" name="tanggal_ditemukan" class="form-control mb-2" value="{{ old('tanggal_ditemukan', $item->tanggal_ditemukan) }}">
                <input type="text" name="kontak" class="form-control mb-2" placeholder="Kontak" value="{{ old('kontak', $item->kontak) }}">
                <textarea name="deskripsi" class="form-control mb-3" rows="4" placeholder="Deskripsi Barang">{{ old('deskripsi', $item->deskripsi) }}</textarea>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-warning w-50">Update</button>
                    <a href="{{ route('found-items.index') }}" class="btn btn-secondary w-50">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
