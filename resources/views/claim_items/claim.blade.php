@extends('layouts.klaimapp')

@section('title', 'Klaim Barang - CariU')

@section('content')
    <h2 class="mb-4">Klaim Barang</h2>

    <form action="{{ route('claim.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3 align-items-center">
            <div class="col-md-3">
                <label for="nama_pemilik" class="form-label form-label-custom">Nama Pemilik:</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" required>
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-md-3">
                <label for="kontak_pemilik" class="form-label form-label-custom">Kontak Pemilik:</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="kontak_pemilik" name="kontak_pemilik" required>
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-md-3">
                <label for="lokasi_terakhir" class="form-label form-label-custom">Lokasi Terakhir:</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="lokasi_terakhir" name="lokasi_terakhir">
            </div>
        </div>

        <div class="row mb-5 align-items-center">
            <div class="col-md-3">
                <label for="bukti_pendukung" class="form-label form-label-custom">Bukti Pendukung:</label>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="file" id="bukti_pendukung" name="bukti_pendukung">
                <div class="form-text text-muted">Pilih File untuk Diunggah</div>
            </div>
        </div>

        <div class="d-flex justify-content-end col-md-9">
            <button type="submit" class="btn btn-claim shadow-sm">
                Klaim Barang
            </button>
        </div>

    </form>
@endsection
