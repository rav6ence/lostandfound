@extends('layouts.app')

@section('content')
<div class="container-fluid p-4" style="min-height:100vh;">
    <h4 class="mb-4">Detail Barang Ditemukan</h4>

    <div class="row">
        <div class="col-md-4">
            <div class="border rounded mb-3" style="height:260px;">
                <img src="{{ $item->image ? asset('storage/'.$item->image) : 'https://via.placeholder.com/400x260?text=No+Image' }}"
                     class="w-100 h-100 rounded" style="object-fit:cover;">
            </div>
        </div>

        <div class="col-md-8">
            <div class="bg-white rounded shadow-sm">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nama Barang:</strong> {{ $item->nama_barang }}</li>
                    <li class="list-group-item"><strong>Tanggal:</strong> {{ $item->tanggal_ditemukan }}</li>
                    <li class="list-group-item"><strong>Waktu:</strong> {{ $item->waktu_ditemukan }}</li>
                    <li class="list-group-item"><strong>Lokasi:</strong> {{ $item->lokasi_penemuan }}</li>
                    <li class="list-group-item"><strong>Penemu:</strong> {{ $item->nama_penemu }}</li>
                    <li class="list-group-item"><strong>Kontak:</strong> {{ $item->kontak_penemu }}</li>
                    <li class="list-group-item"><strong>Deskripsi:</strong> {{ $item->deskripsi }}</li>
                </ul>
            </div>

            <div class="mt-3 d-flex gap-2">
                <a href="{{ route('found-items.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('found-items.edit', $item->id) }}" class="btn btn-warning">Ubah</a>
            </div>
        </div>
    </div>
</div>
@endsection
