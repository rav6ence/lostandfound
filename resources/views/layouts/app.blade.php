<!DOCTYPE html>
<html>
<head>
    <title>Lost and Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Lost & Found</a>
        <div>
            <a href="{{ route('lost-items.index') }}" class="btn btn-outline-light btn-sm">Barang Hilang</a>
            <a href="{{ route('found-items.index') }}" class="btn btn-outline-light btn-sm">Barang Ditemukan</a>
            <a href="{{ route('locations.index') }}" class="btn btn-outline-light btn-sm">Lokasi</a>
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>

</body>
</html>
