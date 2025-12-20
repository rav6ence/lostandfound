@extends('layouts.app')

@section('content')
<h3>Detail Barang Hilang</h3>

<ul class="list-group">
    <li class="list-group-item"><b>Nama:</b> {{ $item->nama_barang }}</li>
    <li class="list-group-item"><b>Kategori:</b> {{ $item->kategori }}</li>
    <li class="list-group-item"><b>Lokasi:</b> {{ $item->lokasi }}</li>
    <li class="list-group-item"><b>Tanggal:</b> {{ $item->tanggal_hilang }}</li>
    <li class="list-group-item"><b>Kontak:</b> {{ $item->kontak }}</li>
    <li class="list-group-item"><b>Deskripsi:</b> {{ $item->deskripsi }}</li>
</ul>

<a href="{{ route('lost-items.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
