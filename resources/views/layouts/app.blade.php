<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Halaman Utama')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>

                    @guest
                        <!-- Jika belum login, tampilkan Login & Register -->
                        <li class="nav-item"><a class="nav-link btn btn-primary text-white px-3" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-success text-white px-3 ms-2" href="{{ route('register') }}">Registrasi</a></li>
                    @else
                        <!-- Jika sudah login, tampilkan Dashboard & Logout -->
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item"><a class="nav-link btn btn-warning text-dark px-3" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link btn btn-info text-white px-3" href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endif

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-danger text-white px-3 ms-2">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        &copy; {{ date('Y') }} MyApp. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
