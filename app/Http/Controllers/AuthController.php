<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan data ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login pengguna setelah registrasi
        Auth::login($user);

        // Redirect ke dashboard dengan pesan sukses
        return redirect('/dashboard')->with('success', 'Registrasi berhasil!');
    }

    public function showDashboard()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('dashboard', compact('user'));
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna
        $request->session()->invalidate(); // Menghapus sesi
        $request->session()->regenerateToken(); // Regenerasi token CSRF

        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
}
