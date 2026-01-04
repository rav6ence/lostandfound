@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<div class="d-flex justify-content-center py-5">
    <div class="card shadow-sm" style="max-width:450px; width:100%;">
        <div class="card-header text-center">
            <h4 class="mb-0">Detail Barang</h4>
        </div>

        {{-- Foto --}}
        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height:220px; overflow:hidden;">
            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" class="w-100 h-100" style="object-fit:cover;">
            @else
                <div class="text-center text-secondary">
                    <i class="bi bi-image" style="font-size:2.5rem;"></i><br>
                    <small>Tidak ada foto</small>
                </div>
            @endif
        </div>

        {{-- Detail --}}
        <div class="card-body p-3">
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between"><strong>Nama barang</strong> <span>{{ $item->nama_barang }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Kategori</strong> <span>{{ $item->kategori ?? '-' }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Lokasi</strong> <span>{{ $item->lokasi_penemuan ?? '-' }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Tanggal</strong> <span>{{ $item->tanggal_ditemukan ?? '-' }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Waktu</strong> <span>{{ $item->waktu_ditemukan ?? '-' }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Penemu</strong> <span>{{ $item->nama_penemu ?? '-' }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Kontak</strong> <span>{{ $item->kontak_penemu ?? '-' }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Deskripsi</strong> <span>{{ $item->deskripsi ?? '-' }}</span></li>
            </ul>

            <a href="{{ route('found-items.index') }}" class="btn btn-primary w-100">Kembali ke Daftar</a>
            <a href="{{ route('found-items.edit', $item->id) }}" class="btn btn-warning w-100">Ubah</a>
        </div>
    </div>
</div>
@endsection
