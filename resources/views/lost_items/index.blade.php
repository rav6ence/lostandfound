@extends('layouts.app')

@section('content')
<h3>Daftar Barang Hilang</h3>
<a href="{{ route('lost-items.create') }}" class="btn btn-primary mb-3">Tambah Laporan</a>

<table class="table table-bordered">
    <tr>
        <th>Nama Barang</th>
        <th>Lokasi</th>
        <th>Aksi</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{ $item->nama_barang }}</td>
        <td>{{ $item->lokasi }}</td>
        <td>
            <a href="{{ route('lost-items.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
            <a href="{{ route('lost-items.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('lost-items.destroy', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
