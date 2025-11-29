<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Laravel CRUD Demo')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm custom-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <span class="logo-dot"></span> Laravel CRUD Demo
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item me-2">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                       href="{{ route('products.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-light text-primary fw-semibold">
                        + Add Product
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<main class="py-4">
    <div class="container">
        @yield('content')
    </div>
</main>

<footer class="py-3 border-top bg-white">
    <div class="container text-center text-muted small">
        Laravel CRUD Demo • Built with ❤️ using Laravel & Bootstrap
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
