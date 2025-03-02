<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <style>
        .bg-pink-custom {
            background-color: #d63384 !important;
        }
        .btn-custom {
            background-color: #d63384 !important;
            color: white !important;
            font-weight: bold !important;
            border: none !important;
        }
        .btn-custom:hover {
            background-color: #b62b6f !important;
        }
        /* Styling Search Bar & Filter Button */
        .search-container {
            position: relative;
            width: 100%;
            max-width: 250px;
        }
        .search-input {
            width: 100%;
            padding-right: 45px; /* Beri ruang untuk tombol filter */
        }
        .filter-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #d63384;
            color: white;
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .filter-btn:hover {
            background-color: #b62b6f;
        }
        /* Responsif untuk tampilan mobile */
        @media (max-width: 768px) {
            .search-container {
                max-width: 200px;
            }
            .btn-custom {
                padding: 8px 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-pink-custom">
        <div class="container d-flex align-items-center">
            <!-- Nama Aplikasi -->
            <h1 class="m-0 fw-bold text-white">
                {{ config('app.name', 'User Panel') }}
            </h1>

            <!-- Button Navigasi (Pusat) -->
            <div class="d-flex gap-2 align-items-center mx-auto">
                <a href="#" class="btn btn-custom rounded-4 px-3 py-2">Home</a>
                <a href="#" class="btn btn-custom rounded-4 px-3 py-2">Stories</a>

                <!-- Category Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-custom rounded-4 px-3 py-2 dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <li><a class="dropdown-item" href="#">Romance</a></li>
                        <li><a class="dropdown-item" href="#">Fantasy</a></li>
                        <li><a class="dropdown-item" href="#">Science Fiction</a></li>
                        <li><a class="dropdown-item" href="#">Mystery & Thriller</a></li>
                        <li><a class="dropdown-item" href="#">Horror</a></li>
                        <li><a class="dropdown-item" href="#">Adventure</a></li>
                        <li><a class="dropdown-item" href="#">Comedy</a></li>
                        <li><a class="dropdown-item" href="#">Historical Fiction</a></li>
                        <li><a class="dropdown-item" href="#">Drama</a></li>
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>

                <!-- Write Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-custom rounded-4 px-3 py-2 dropdown-toggle" type="button" id="writeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Write
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="writeDropdown">
                        <li><a class="dropdown-item" href="#">Create a new story</a></li>
                        <li><a class="dropdown-item" href="#">My Stories</a></li>
                    </ul>
                </div>

                <!-- Search Bar -->
                <div class="search-container">
                    <input class="form-control rounded-4 px-3 py-2 search-input" type="search" placeholder="Search..." aria-label="Search" id="searchInput">
                    <button class="filter-btn" id="filterBtn" type="button">
                        <i class="fas fa-filter"></i> <!-- Ikon Filter -->
                    </button>
                </div>
            </div>

            <!-- Dropdown Profil (Kanan) -->
            @auth
            <div class="dropdown ms-auto">
                <a class="d-flex align-items-center text-decoration-none dropdown-toggle text-white" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('uploads/members/default-profile.png') }}" width="60" height="40" class="rounded-circle">
                    <span>{{ Auth::user()->name }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                    <li><a class="dropdown-item" href="#">Inbox</a></li>
                    <li><a class="dropdown-item" href="#">Notifications</a></li>
                    <li><a class="dropdown-item" href="#">Bookmarks</a></li>
                    <li><a class="dropdown-item" href="#">Following</a></li>
                    <li><a class="dropdown-item" href="#">Language: English</a></li>
                    <li><a class="dropdown-item" href="#">Help</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @endauth
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
