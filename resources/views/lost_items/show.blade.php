@extends('layouts.app')

@section('content')
<div class="container-fluid p-4" style="min-height:100vh;">
    <h4 class="mb-4">Detail Barang Hilang</h4>

    <div class="row">
        {{-- IMAGE --}}
        <div class="col-md-4">
            <div class="border rounded mb-3" style="height:260px;">
                <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/400x260?text=No+Image' }}" class="w-100 h-100 rounded" style="object-fit:cover;" alt="Gambar Barang">
            </div>
        </div>

        {{-- DETAIL --}}
        <div class="col-md-8">
            <div class="bg-white rounded shadow-sm">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nama Barang:</strong> {{ $item->nama_barang }}</li>
                    <li class="list-group-item"><strong>Kategori:</strong> {{ $item->category ? $item->category->nama : '-' }}</li>
                    <li class="list-group-item"><strong>Lokasi Terakhir:</strong> {{ $item->location ? $item->location->nama : '-' }}</li>
                    <li class="list-group-item"><strong>Tanggal Kehilangan:</strong> {{ $item->tanggal_hilang ? $item->tanggal_hilang->format('d-m-Y') : '-' }}</li>
                    <li class="list-group-item"><strong>Kontak:</strong> {{ $item->kontak ?? '-' }}</li>
                    <li class="list-group-item"><strong>Deskripsi:</strong> <div class="mt-1 text-muted">{{ $item->deskripsi ?? '-' }}</div></li>
                </ul>
            </div>

            {{-- BUTTON CRUD --}}
            <div class="mt-3 d-flex gap-2">
                <a href="{{ route('lost-items.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('lost-items.edit', $item->id) }}" class="btn btn-warning">Ubah</a>
                <form action="{{ route('lost-items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection