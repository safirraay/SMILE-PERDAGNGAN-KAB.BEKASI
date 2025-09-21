<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string[]  ...$roles
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('auth.index');
        }

        // Ambil level user yang sedang login
        $userLevel = Auth::user()->level;

        // Cek apakah level user ada di dalam daftar role yang diizinkan
        if (in_array($userLevel, $roles)) {
            // Jika sesuai, lanjutkan request
            return $next($request);
        }

        // Jika tidak sesuai, kembalikan ke halaman sebelumnya dengan pesan error
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
