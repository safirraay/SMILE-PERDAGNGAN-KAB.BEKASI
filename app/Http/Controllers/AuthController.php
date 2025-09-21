<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function index()
    {
        $data = [
            'title' => 'Halaman Login'
        ];
        return view('auth.login', $data);
    }

    /**
     * Memproses permintaan autentikasi.
     */
    public function authenticate(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('auth.index')
                ->withErrors($validator)
                ->withInput();
        }

        // Coba lakukan autentikasi
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke dashboard
            return redirect()->intended('dashboard')
                ->with('success', 'Selamat Datang ' . Auth::user()->name . '!');
        }

        // Jika autentikasi gagal
        return redirect()->route('auth.index')
            ->with('error', 'Username atau Password yang Anda masukkan salah.');
    }


    /**
     * Memproses logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.index')
            ->with('success', 'Anda telah berhasil logout.');
    }

    /**
     * Menampilkan halaman lupa password.
     */
    public function forgotPassword()
    {
        $data = [
            'title' => 'Lupa Password'
        ];
        return view('auth.forgot-password', $data);
    }
}
