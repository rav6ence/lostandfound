@extends('layouts.app')

@section('content')
<div class="container-fluid p-4" style="background:#f5f5f5; min-height:100vh;">

    <h4 class="mb-4">
        {{ isset($item) ? 'Ubah Barang Ditemukan' : 'Tambah Barang Ditemukan' }}
    </h4>

    <div class="bg-white p-4 rounded shadow-sm">

        <form method="POST"
              action="{{ isset($item) ? route('found-items.update', $item->id) : route('found-items.store') }}"
              enctype="multipart/form-data">
            @csrf
            @if(isset($item)) @method('PUT') @endif

            <div class="row">
                {{-- IMAGE --}}
                <div class="col-md-4">
                    <div class="border bg-light mb-2" style="height:250px;">
                        <img id="imagePreview"
                             src="{{ isset($item) && $item->image
                                    ? asset('storage/'.$item->image)
                                    : 'https://via.placeholder.com/400x250?text=Preview' }}"
                             class="w-100 h-100"
                             style="object-fit:cover;">
                    </div>

                    <input type="file" name="image" id="imageInput" class="form-control mb-2">

                    <button type="button" class="btn btn-outline-secondary w-100" onclick="resetImage()">
                        Hapus Gambar
                    </button>
                </div>

                {{-- FORM --}}
                <div class="col-md-8">

                    {{-- BARIS 1 --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control"
                                   value="{{ $item->nama_barang ?? '' }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control"
                                   value="{{ $item->kategori ?? '' }}" required>
                        </div>
                    </div>

                    {{-- BARIS 2 --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Ditemukan</label>
                            <input type="date" name="tanggal_ditemukan" class="form-control"
                                   value="{{ $item->tanggal_ditemukan ?? '' }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Waktu Ditemukan</label>
                            <input type="time" name="waktu_ditemukan" class="form-control"
                                   value="{{ $item->waktu_ditemukan ?? '' }}" required>
                        </div>
                    </div>

                    {{-- BARIS 3 --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Lokasi Umum</label>
                            <input type="text" name="lokasi" class="form-control"
                                   value="{{ $item->lokasi ?? '' }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Lokasi Penemuan</label>
                            <input type="text" name="lokasi_penemuan" class="form-control"
                                   value="{{ $item->lokasi_penemuan ?? '' }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kronologi Penemuan</label>
                        <textarea name="kronologi" class="form-control" rows="3">{{ $item->kronologi ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            {{-- DATA PENEMU --}}
            <div class="row mt-3">
                <div class="col-md-4">
                    <label class="form-label">Nama Penemu</label>
                    <input type="text" name="nama_penemu" class="form-control"
                           value="{{ $item->nama_penemu ?? '' }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Kontak Penemu</label>
                    <input type="text" name="kontak_penemu" class="form-control"
                           value="{{ $item->kontak_penemu ?? '' }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Alamat Penemu</label>
                    <input type="text" name="alamat_penemu" class="form-control"
                           value="{{ $item->alamat_penemu ?? '' }}" required>
                </div>
            </div>

            {{-- KONTAK UMUM --}}
            <div class="mt-3">
                <label class="form-label">Kontak yang Bisa Dihubungi</label>
                <input type="text" name="kontak" class="form-control"
                       value="{{ $item->kontak ?? '' }}" required>
            </div>

            {{-- DESKRIPSI --}}
            <div class="mt-4">
                <label class="form-label">Deskripsi Barang</label>
                <textarea name="deskripsi" class="form-control" rows="4" required>{{ $item->deskripsi ?? '' }}</textarea>
            </div>

            {{-- BUTTON --}}
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn {{ isset($item) ? 'btn-warning' : 'btn-success' }}">
                    {{ isset($item) ? 'Ubah' : 'Simpan' }}
                </button>

                <a href="{{ route('found-items.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </div>

        </form>
    </div>
</div>

<script>
function resetImage() {
    document.getElementById('imageInput').value = '';
    document.getElementById('imagePreview').src =
        'https://via.placeholder.com/400x250?text=Preview';
}

document.getElementById('imageInput').addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => document.getElementById('imagePreview').src = e.target.result;
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
