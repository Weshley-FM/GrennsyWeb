<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Tampilkan halaman login (kamu bisa pake view blade nanti)
    public function showLogin()
    {
        return view('login'); // nanti file resources/views/auth/login.blade.php
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        // Coba login pakai Auth
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Redirect ke dashboard misalnya
            return redirect()->intended('/dashboard');
        }

        // Kalau gagal login
        throw ValidationException::withMessages([
            'email' => __('auth.failed'), // Pesan error "These credentials do not match our records."
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
