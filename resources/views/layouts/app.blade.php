<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
    @stack('style')

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Hotel Booking</title>
</head>
<body class="antialiased font-sans">
    <header class="py-1">
        <nav class="flex justify-between items-center py-1">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Your Logo" class="h-48">
            </a>

        <div class="flex items-center justify-center space-x-1">
            @auth
                <div class="inline-block px-4 py-2 border border-purple-800 rounded-lg hover:bg-purple-800 hover:text-white transition duration-300 ease-in-out">
                    <a href="{{ route('profile.index') }}" class="btn font-bold">Profile</a>
                </div>
                <div class="inline-block px-4 py-2 border border-purple-800 rounded-lg hover:bg-purple-800 hover:text-white transition duration-300 ease-in-out">
                    <a href="{{ route('logout.destroy') }}" class="btn font-bold">Logout</a>
                </div>
            @else
                <div class="inline-block px-4 py-2 border border-purple-800 rounded-lg hover:bg-purple-800 hover:text-white transition duration-300 ease-in-out">
                    <a href="{{ route('register.create') }}" class="btn font-bold">Register</a>
                </div>
                <div class="inline-block px-4 py-2 border border-purple-800 rounded-lg hover:bg-purple-800 hover:text-white transition duration-300 ease-in-out">
                    <a href="{{ route('login.index') }}" class="btn font-bold">Login</a>
                </div>
                
            @endauth
        </div>



        </nav>
    </header>

    <!-- Masukkan search bar di sini -->
    <!-- @include('layouts.search') -->

    <div class="container mx-auto">
        <main>
            @yield('content')
        </main>
    </div>

    @stack('script')
</body>
</html>
