@extends('layouts.app')

@section('content')
<div class="container mx-auto flex items-center justify-center min-h-screen">
    <div class="border border-gray-300 rounded-md overflow-hidden flex flex-col items-center justify-center w-full max-w-4xl bg-white shadow-md">
        <!-- Judul LOGIN -->
        <h2 class="text-center text-3xl font-semibold mt-5 mb-5 text-gray-800">Login</h2>

        <!-- Gambar Hotel dan Form -->
        <div class="flex flex-col md:flex-row w-full">
            <!-- Gambar Hotel -->
            <div class="md:w-1/2 hidden md:block">
                <img src="{{ asset('assets/images/login/eco.jpeg') }}" alt="Banner" class="w-full h-full object-cover">
            </div>

            <!-- Form -->
            <form action="{{ route('login.authenticate') }}" method="post" class="w-full md:w-1/2 flex flex-col gap-4 justify-center py-10 px-6 md:px-12" autocomplete="off">
                @csrf

                <!-- Pesan Error Global -->
                @if (session('error'))
                    <div class="text-red-500 text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Email -->
                <div>
                    <label for="email" class="block font-medium leading-6 text-gray-900">Email</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                        <input type="email" id="email" name="email" required class="block w-full rounded-md border border-gray-300 py-3 px-4 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" value="{{ old('email') }}" autocomplete="off">
                        @error('email')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block font-medium leading-6 text-gray-900">Password</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                        <input type="password" id="password" name="password" required class="block w-full rounded-md border border-gray-300 py-3 px-4 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" autocomplete="off">
                        <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <i id="eye-icon" class="fas fa-eye text-gray-500"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="mt-4 text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg w-full px-5 py-3 text-center">
                    Login
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Tambahkan CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.x/css/all.min.css" rel="stylesheet">


<!-- Tambahkan JS -->
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var eyeIcon = document.getElementById("eye-icon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script>
@endsection
