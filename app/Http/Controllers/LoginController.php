<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Menampilkan form login
    public function index()
    {
        return view("auth.asep"); // Ganti ini dengan nama view yang sesuai
    }

    // Melakukan proses login
    public function login(Request $request)
    {
        // Validasi data input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah user valid dan login berhasil
        if (Auth::attempt($credentials)) {
            // Jika berhasil, regenerasi session
            $request->session()->regenerate();

            // Simpan role ke dalam session (jika perlu)
            $request->session()->put('role', Auth::user()->role);

            // Redirect ke halaman sesuai role
            return redirect()->intended($this->redirectPath(Auth::user()->role));
        }

        // Jika gagal login, lemparkan exception dengan pesan error
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    // Method untuk mengarahkan user sesuai role
    protected function redirectPath($role)
    {
        switch ($role) {
            case 'alumni':
                return '/alumni/dashboard';
            case 'company':
                return '/company/dashboard';
            case 'admin':
                return '/admin/dashboard';
            default:
                return '/home'; // Default redirect jika role tidak ditemukan
        }
    }

    // Method untuk logout
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidate session agar tidak bisa digunakan kembali
        $request->session()->invalidate();

        // Regenerasi token CSRF
        $request->session()->regenerateToken();

        // Redirect ke halaman utama setelah logout
        return redirect('/');
    }
}
