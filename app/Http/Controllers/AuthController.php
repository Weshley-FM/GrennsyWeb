<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        // Jika sudah login, redirect berdasarkan role
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        
        return view('login'); // Sesuai dengan file login.blade.php Anda
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input - Ubah validasi email menjadi lebih fleksibel
        $request->validate([
            'email' => ['required', 'string'], // Bisa email atau nama
            'password' => ['required', 'string'],
        ]);

        // Cek apakah input adalah email atau nama
        $loginType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        
        $credentials = [
            $loginType => $request->email,
            'password' => $request->password,
        ];

        // Coba login pakai Auth
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Redirect berdasarkan role user
            return $this->redirectBasedOnRole();
        }

        // Kalau gagal login
        throw ValidationException::withMessages([
            'email' => 'Email/nama atau password yang Anda masukkan salah.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout!');
    }

    // Method untuk redirect berdasarkan role
    private function redirectBasedOnRole()
    {
        $user = Auth::user();
        
        // Cek role user
        if ($user->role === 'admin') {
            // Admin masuk ke halaman user management
            return redirect()->route('users.index')->with('success', 'Selamat datang, Admin!');
        } else {
            // User biasa masuk ke dashboard
            return redirect()->route('dashboard')->with('success', 'Selamat datang!');
        }
    }
}