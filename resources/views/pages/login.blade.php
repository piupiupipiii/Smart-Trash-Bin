@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex items-center justify-center h-full">
        <div class="border border-gray-300 rounded-md overflow-hidden flex flex-col items-center justify-center">
            <!-- Judul LOGIN -->
            <h2 class="text-center text-3xl font-semibold mt-5 mb-5 text-gray-800">Login</h2>

            <!-- Gambar Hotel dan Form -->
            <div class="flex">
                <!-- Gambar Hotel -->
                <div class="w-1/2">
                    <img src="{{ asset('assets/images/login/hotel3d.png') }}" alt="Hotel Image" class="w-full">
                </div>

                <!-- Form -->
                <form action="{{ route('login.authenticate') }}" method="post" class="w-1/2 flex flex-col gap-4 justify-center py-10 px-12" autocomplete="off">
                    @csrf
                    <!-- Tampilkan pesan kesalahan jika login gagal -->
                    @if ($errors->has('login'))
                        <div class="text-red-500">{{ $errors->first('login') }}</div>
                    @endif
                    <div>
                        <label for="email" class="block font-medium leading-6 text-gray-900">Email</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="email" id="email" name="email" required class="block w-full rounded-md border border-gray-300 py-4 px-6 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" value="{{ old('email') }}" autocomplete="off">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block font-medium leading-6 text-gray-900">Password</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="password" id="password" name="password" required class="block w-full rounded-md border border-gray-300 py-4 px-6 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" autocomplete="off">
                            <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                <i id="eye-icon" class="fas fa-eye text-gray-500"></i>
                            </button>
                        </div>
                    </div>
                    <div id="password-error" class="text-red-500"></div>
                    <button type="submit" class="h-min mt-auto text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg w-full sm:w-auto px-5 py-3 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Login</button>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
