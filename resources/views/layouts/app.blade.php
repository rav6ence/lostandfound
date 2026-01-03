<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CariU</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold" href="/">
            Welcome To CariU
        </a>

        <div class="d-flex gap-2">
            <a href="{{ route('lost-items.index') }}" class="btn btn-outline-light btn-sm">
                Barang Hilang
            </a>
            <a href="{{ route('found-items.index') }}" class="btn btn-outline-light btn-sm">
                Barang Ditemukan
            </a>
            <a href="#" class="btn btn-outline-light btn-sm">
                Lokasi
            </a>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container-fluid mt-4 px-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>