<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba autentikasi pengguna
        if (!Auth::attempt($request->only('email', 'password'))) {
            // Jika autentikasi gagal, kembali ke halaman login dengan pesan kesalahan
            return redirect()->route('login.index')->withErrors(['login' => 'Email atau password salah.'])->withInput($request->only('email'));
        }

        // Jika autentikasi berhasil, redirect ke halaman tertentu atau halaman sebelumnya
        return redirect()->intended('/dashboard');
    }
}
