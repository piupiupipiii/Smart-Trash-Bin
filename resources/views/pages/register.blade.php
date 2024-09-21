@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex items-center justify-center h-full">
        <div class="border border-gray-300 rounded-md overflow-hidden flex flex-col items-center justify-center">
            <!-- Judul REGISTER -->
            <h2 class="text-center text-3xl font-semibold mt-5 mb-5 text-gray-800">Register</h2>

            <!-- Gambar Hotel dan Form -->
            <div class="flex items-center justify-center">
                <!-- Gambar Hotel -->
                <div class="w-1/2">
                    <img src="{{ asset('assets/images/login/hotel3d.png') }}" alt="Hotel Image" class="w-full">
                </div>

                <!-- Form -->
                <form action="{{ route('register.store') }}" method="post" class="w-1/2 flex flex-col gap-4 justify-center py-10 px-12" onsubmit="return validateForm()" autocomplete="off">
                    @csrf
                    <div>
                        <label for="name" class="block font-medium leading-6 text-gray-900">Nama</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" id="name" name="name" required class="block w-full rounded-md border border-gray-300 py-2 px-4 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" autocomplete="off">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block font-medium leading-6 text-gray-900">Email</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="email" id="email" name="email" required class="block w-full rounded-md border border-gray-300 py-2 px-4 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" autocomplete="off">
                        </div>
                    </div>
                    <div>
                        <label for="phone" class="block font-medium leading-6 text-gray-900">Phone</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" id="phone" name="phone" required class="block w-full rounded-md border border-gray-300 py-2 px-4 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" autocomplete="off">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block font-medium leading-6 text-gray-900">Password</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="password" id="password" name="password" required class="block w-full rounded-md border border-gray-300 py-2 px-4 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" oninput="validatePassword()" autocomplete="new-password">
                            <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                <i id="eye-icon" class="fas fa-eye text-gray-500"></i>
                            </button>
                        </div>
                        <div id="message" class="text-sm mt-1"></div>
                    </div>
                    <div>
                        <label for="confirm-password" class="block font-medium leading-6 text-gray-900">Confirm Password</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="password" id="confirm-password" name="confirm-password" required class="block w-full rounded-md border border-gray-300 py-2 px-4 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" oninput="validateConfirmPassword()" autocomplete="new-password">
                            <button type="button" onclick="toggleConfirmPasswordVisibility()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                <i id="eye-icon2" class="fas fa-eye text-gray-500"></i>
                            </button>
                        </div>
                        <div id="confirm-message" class="text-sm mt-1"></div>
                    </div>
                    <button type="submit" class="h-min mt-auto text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg w-full sm:w-auto px-5 py-3 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Register</button>
                </form>

            </div>
        </div> 
    </div>

    <!-- link ke Font Awesome di bagian head -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!--bagian validasi password-->
    <script>
        function validatePassword() { //untuk memvalidasi apakah konfirmasi password sudah sesuai dengan password yang dimasukkan
            //mengambil nilai password dan konfirmasi password dari elemen input 
            var password = document.getElementById("password").value;
            var messageElement = document.getElementById("message");
            var message = "";

            if (password.length < 8) {
                message += "Password harus memiliki panjang minimal 8 karakter.<br>";
            }

            if (!/[A-Z]/.test(password)) {
                message += "Password harus mengandung setidaknya satu huruf besar (A-Z).<br>";
            }

            if (!/[a-z]/.test(password)) {
                message += "Password harus mengandung setidaknya satu huruf kecil (a-z).<br>";
            }

            if (!/[0-9]/.test(password)) {
                message += "Password harus mengandung setidaknya satu angka (0-9).<br>";
            }

            if (!/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)) {
                message += "Password harus mengandung setidaknya satu karakter khusus (!@#$%^&*()_+-=[]{}|;:'\",./?).<br>";
            }

            if (message === "") { //jika tidak muncul error message karena password sesuai, maka muncul message "password vvalid"
                messageElement.className = "valid-message text-green-500";
                messageElement.innerHTML = "Password valid!";
                return true; 
            } else { //jika  muncul error message karena password tidak sesuai, maka muncul error message password kurang apa
                messageElement.className = "text-red-500";
                messageElement.innerHTML = "Password tidak valid:<br>" + message;
                return false; 
            }
        }

        function togglePasswordVisibility() { //mengubah visibilitas ketika icon eye diklik
            var passwordInput = document.getElementById("password"); //mengambil elemen input password
            var eyeIcon = document.getElementById("eye-icon");

            //memeriksa jenis input password. Jika input password sedang dalam mode "password", 
            //lalu mengubahnya menjadi "text" untuk menampilkan teks biasa. 
            //juga mengubah ikon mata sehingga menampilkan ikon "eye-slash" untuk menunjukkan bahwa password sekarang terlihat.
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");

            //Jika input password sudah dalam mode "text" (artinya sudah terlihat), 
            // maka mengembalikannya ke mode "password" untuk menyembunyikan teks. 
            //juga mengubah ikon mata menjadi "eye" untuk menunjukkan bahwa password sekarang disembunyikan. 
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }

        function toggleConfirmPasswordVisibility() {
            var passwordInput = document.getElementById("confirm-password");
            var eyeIcon = document.getElementById("eye-icon2");

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


        //digunakan untuk memvalidasi apakah konfirmasi password sesuai dengan password yang dimasukkan
        function validateConfirmPassword() {
            //mengambil nilai password dan konfirmasi password dari elemen input 
            var password = document.getElementById("password").value;
            //membandingkan kedua nilai. Jika tidak cocok, maka menambahkan pesan kesalahan
            var confirmPassword = document.getElementById("confirm-password").value;
            var confirmMessageElement = document.getElementById("confirm-message");
            var confirmMessage = "";

            if (password !== confirmPassword) {
                confirmMessage += "Konfirmasi password tidak sesuai dengan password.<br>";
            }

            //Jika tidak ada pesan kesalahan yang ditambahkan, mengubah kelas dan konten pesan konfirmasi menjadi sesuai
            if (confirmMessage === "") {
                confirmMessageElement.className = "valid-message text-green-500";
                confirmMessageElement.innerHTML = "Konfirmasi password sesuai dengan password.";
                return true;

            //Jika ada pesan kesalahan, mengubah kelas dan konten pesan konfirmasi menjadi pesan kesalahan
            } else {
                confirmMessageElement.className = "text-red-500";
                confirmMessageElement.innerHTML = "Konfirmasi password tidak valid:<br>" + confirmMessage;
                return false;
            }
        }

        //digunakan untuk memvalidasi seluruh formulir pendaftaran sebelum mengirimkan data
        function validateForm() {
            //memanggil kedua fungsi untuk memeriksa validitas password dan konfirmasi password
            //Jika kedua validasi berhasil (mengembalikan true), maka mengembalikan true. 
            //Jika salah satu validasi gagal (mengembalikan false), maka mengembalikan false
            return validatePassword() && validateConfirmPassword();
        }
    </script>
@endsection
