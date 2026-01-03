@extends('layouts.app')

@section('content')
<div class="container-fluid p-4" style="min-height:100vh;">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Daftar Barang Hilang</h4>
        <a href="{{ route('lost-items.create') }}" class="btn btn-primary">+ Tambah Laporan</a>
    </div>

    <div class="bg-white p-3 rounded shadow-sm">
        <table class="table table-bordered table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>Nama Barang</th>
                    <th>Lokasi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->location ? $item->location->nama : '-' }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('lost-items.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('lost-items.edit', $item->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                <form action="{{ route('lost-items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted py-4">Belum ada laporan barang hilang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Optional pagination --}}
        @if(method_exists($items, 'links'))
            <div class="mt-3">
                {{ $items->links() }}
            </div>
        @endif

    </div>
</div>
@endsection