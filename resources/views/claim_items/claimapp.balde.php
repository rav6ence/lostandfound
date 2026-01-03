<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CariU - Lost and Found')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #fff;
            font-family: sans-serif;
        }

        .navbar-custom {
            background-color: #2b7de2;
        }

        .form-label-custom {
            font-weight: 500;
            font-size: 1rem;
        }

        .form-control {
            border: 1px solid #333;
            border-radius: 2px;
        }

        .btn-claim {
            border: 1px solid #333;
            color: #333;
            background-color: white;
            padding: 6px 25px;
            font-weight: 500;
            border-radius: 4px;
            transition: all 0.3s;
        }
        .btn-claim:hover {
            background-color: #e2e2e2;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Welcome To CariU</a>

        <div class="d-flex ms-auto">
            <a href="#" class="text-white text-decoration-none d-flex align-items-center gap-2">
                Logout <i class="bi bi-person-circle fs-4"></i>
            </a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
