<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        if (Auth::check()) {
            return $this->arahkan(Auth::user()->role);
        }

        return view('login');
    }

    // Memproses login
    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return $this->arahkan(Auth::user()->role);
        }

        return back()
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah.');
    }

    // Keluar dari aplikasi
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Mengarahkan pengguna sesuai role
    private function arahkan($role)
    {
        if ($role === 'admin') {
            return redirect('/admin');
        }

        if ($role === 'kasir') {
            return redirect('/kasir');
        }

        Auth::logout();

        return redirect('/')->with('error', 'Role pengguna tidak dikenali.');
    }
}