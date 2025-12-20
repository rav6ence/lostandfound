@extends('layouts.app')

@section('content')
<h3>Edit Barang Hilang</h3>

<form method="POST" action="{{ route('lost-items.update', $item->id) }}">
@csrf

<input class="form-control mb-2" name="nama_barang" value="{{ $item->nama_barang }}">
<input class="form-control mb-2" name="kategori" value="{{ $item->kategori }}">
<input class="form-control mb-2" name="lokasi" value="{{ $item->lokasi }}">
<input type="date" class="form-control mb-2" name="tanggal_hilang" value="{{ $item->tanggal_hilang }}">
<input class="form-control mb-2" name="kontak" value="{{ $item->kontak }}">
<textarea class="form-control mb-2" name="deskripsi">{{ $item->deskripsi }}</textarea>

<button class="btn btn-primary">Update</button>
</form>
@endsection
