@extends('layouts.app')

@section('content')
<h3>Tambah Barang Hilang</h3>

<form method="POST" action="{{ route('lost-items.store') }}">
@csrf

<input class="form-control mb-2" name="nama_barang" placeholder="Nama Barang">
<input class="form-control mb-2" name="kategori" placeholder="Kategori">
<input class="form-control mb-2" name="lokasi" placeholder="Lokasi">
<input type="date" class="form-control mb-2" name="tanggal_hilang">
<input class="form-control mb-2" name="kontak" placeholder="Kontak">
<textarea class="form-control mb-2" name="deskripsi" placeholder="Deskripsi"></textarea>

<button class="btn btn-success">Simpan</button>
</form>
@endsection
