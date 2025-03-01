<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <!-- Nama Aplikasi (Pink) -->
        <h1 class="text-2xl font-bold text-[#d63384]">{{ config('app.name', 'Laravel') }}</h1>

        <nav>
        @if (Route::has('login'))
                @auth
                    @if(Auth::user()->is_admin)
                        <a href="{{ url('/admin/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ url('/user/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>
    
    <section class="text-center py-20 px-6 bg-orange-100">
        @auth
            <h2 class="text-4xl font-bold">Kamu sudah login, silahkan kembali ke dashboard</h2>
        @else
            <h2 class="text-4xl font-bold">Hi, we're {{ config('app.name', 'Laravel') }}.</h2>
            <p class="text-lg text-gray-700 mt-4 max-w-2xl mx-auto">
                The world's largest storytelling community, home to 89 million people who love original stories.
            </p>
        @endauth
    </section>

    
    <section class="py-16 px-6 max-w-4xl mx-auto">
        <h3 class="text-2xl font-bold text-center">See Your Story...</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6 text-center">
            <div class="p-6 bg-white shadow-md rounded-lg">
                <h4 class="text-xl font-semibold">Get produced</h4>
                <p class="text-gray-600">Turn your story into a movie or film.</p>
            </div>
            <div class="p-6 bg-white shadow-md rounded-lg">
                <h4 class="text-xl font-semibold">Get adapted</h4>
                <p class="text-gray-600">Transform your story into a TV series.</p>
            </div>
            <div class="p-6 bg-white shadow-md rounded-lg">
                <h4 class="text-xl font-semibold">Get published</h4>
                <p class="text-gray-600">Bring your book to bookshelves worldwide.</p>
            </div>
        </div>
    </section>
    
    <section class="text-center py-16 bg-gray-200 px-6">
        <h3 class="text-2xl font-bold">How {{ config('app.name', 'Laravel') }} Works</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="p-6 bg-white shadow-md rounded-lg">
                <h4 class="text-xl font-semibold">Create</h4>
                <p class="text-gray-600">Share your unique voice and original story.</p>
            </div>
            <div class="p-6 bg-white shadow-md rounded-lg">
                <h4 class="text-xl font-semibold">Build</h4>
                <p class="text-gray-600">Grow a fanbase as your story gains readership.</p>
            </div>
            <div class="p-6 bg-white shadow-md rounded-lg">
                <h4 class="text-xl font-semibold">Amplify</h4>
                <p class="text-gray-600">Get your story published or adapted to screen.</p>
            </div>
        </div>
    </section>
    
    <!-- Footer dengan Nama Aplikasi Berwarna Pink -->
    <footer class="bg-[#d63384] text-white py-6 text-center">
        <p>&copy; {{ date('Y') }} <span class="font-bold">{{ config('app.name', 'Laravel') }}</span>. All rights reserved.</p>
    </footer>

</body>
</html>
