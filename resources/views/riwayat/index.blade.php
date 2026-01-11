@extends('layouts.app')

@section('content')
<div class="container-fluid py-4" style="background:#f5f5f5; min-height:100vh;">
    <div class="bg-white p-4 rounded-3 shadow-sm border">
        <h3 class="fw-bold mb-4">Riwayat Klaim Barang</h3>

        <div class="d-flex flex-column gap-3">
            @forelse($claims as $claim)
                <div class="card border shadow-sm rounded-3">
                    <div class="card-body d-flex gap-4 align-items-center">

                        <!-- GAMBAR -->
                        <div class="bg-light border rounded overflow-hidden"
                             style="width:120px; height:120px; flex-shrink:0;">
                            @if($claim->foundItem && $claim->foundItem->image)
                                <img src="{{ asset('storage/'.$claim->foundItem->image) }}"
                                     class="w-100 h-100 object-fit-cover">
                            @else
                                <div class="h-100 d-flex align-items-center justify-content-center text-muted small">
                                    No Image
                                </div>
                            @endif
                        </div>

                        <!-- INFO BARANG -->
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-1">
                                {{ $claim->foundItem->nama_barang ?? 'Barang tidak tersedia' }}
                            </h5>

                            <p class="text-secondary small mb-2">
                                Lokasi: {{ $claim->foundItem->lokasi ?? '-' }}
                            </p>

                            <span class="badge bg-success px-3">
                                {{ strtoupper($claim->status ?? 'DIKLAIM') }}
                            </span>
                        </div>

                        <!-- INFO PEMILIK -->
                        <div class="text-end small">
                            <p class="mb-1"><strong>Nama:</strong> {{ $claim->nama_pemilik }}</p>
                            <p class="mb-1"><strong>Kontak:</strong> {{ $claim->kontak_pemilik }}</p>
                            <p class="text-muted mb-0">
                                {{ $claim->created_at->format('d/m/Y') }}
                            </p>
                        </div>

                    </div>
                </div>
            @empty
                <div class="alert alert-light text-center border py-5">
                    <p class="mb-0 text-muted">Belum ada riwayat klaim.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection