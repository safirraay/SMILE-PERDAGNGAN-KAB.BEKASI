<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\LaporanController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PengaduanController;
use App\Http\Controllers\Backend\TanggapanController;
use App\Http\Controllers\Frontend\HomePageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kita akan mendaftarkan semua route aplikasi.
|
*/

// =====================================================================================
// == ROUTE UNTUK HALAMAN STATIS FRONTEND
// =====================================================================================
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/galeri', [HomePageController::class, 'gallery'])->name('gallery');
Route::get('/kontak', [HomePageController::class, 'contact'])->name('contact');

Route::get('/profil/visi-misi', [HomePageController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil/ruang-lingkup', [HomePageController::class, 'ruangLingkup'])->name('profil.ruang-lingkup');
Route::get('/profil/unit-kerja', [HomePageController::class, 'unitKerja'])->name('profil.unit-kerja');
Route::get('/profil/struktur-organisasi', [HomePageController::class, 'strukturOrganisasi'])->name('profil.struktur-organisasi');
Route::get('/profil/tugas-fungsi', [HomePageController::class, 'tugasFungsi'])->name('profil.tugas-fungsi');

Route::get('/informasi/regulasi-kebijakan', [HomePageController::class, 'regulasiKebijakan'])->name('informasi.regulasi-kebijakan');
Route::get('/informasi/berita-pengumuman', [HomePageController::class, 'beritaPengumuman'])->name('informasi.berita-pengumuman');
Route::get('/informasi/bapokting', [HomePageController::class, 'bapokting'])->name('informasi.bapokting');
Route::get('/informasi/daftar-uptd', [HomePageController::class, 'daftarUptd'])->name('informasi.daftar-uptd');
Route::get('/informasi/jenis-ska', [HomePageController::class, 'jenisSka'])->name('informasi.jenis-ska');
Route::get('/informasi/tera-ulang', [HomePageController::class, 'teraUlang'])->name('informasi.tera-ulang');

Route::get('/pelayanan', [HomePageController::class, 'pelayanan'])->name('pelayanan');

// =====================================================================================
// == ROUTE AJAX UNTUK WILAYAH (BISA DIAKSES SEMUA)
// =====================================================================================
Route::post('get-regencies', [RegisterController::class, 'getRegencies'])->name('get-regencies');
Route::post('get-districts', [RegisterController::class, 'getDistricts'])->name('get-districts');
Route::post('get-villages', [RegisterController::class, 'getVillages'])->name('get-villages');

// =====================================================================================
// == GRUP ROUTE UNTUK TAMU (YANG BELUM LOGIN)
// =====================================================================================
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('auth.index');
    Route::post('login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

    // =================================================
    // == RUTE BARU UNTUK REGISTRASI ==
    // =================================================
    Route::get('register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    // RUTE BARU UNTUK LUPA PASSWORD
    Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
});


// =====================================================================================
// == GRUP ROUTE UNTUK PENGGUNA YANG SUDAH LOGIN
// =====================================================================================
Route::group(['middleware' => 'auth'], function () {

    // Route yang bisa diakses oleh SEMUA level (Admin, Petugas, Masyarakat)
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

    // =================================================
    // == RUTE BARU UNTUK PROFIL SAYA ==
    // =================================================
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    // ---------------------------------------------------------------------------------
    // -- Route yang hanya bisa diakses oleh ADMIN dan PETUGAS
    // ---------------------------------------------------------------------------------
    Route::group(['middleware' => 'role:admin,petugas'], function () {
        // DataTables untuk dashboard admin & petugas
        Route::get('dashboard/pengaduan-terbaru', [DashboardController::class, 'getNewPengaduan'])->name('dashboard.new-pengaduan');

        // ==========================================================
        // == ROUTE BARU UNTUK MENYIMPAN TANGGAPAN ==
        // ==========================================================
        Route::post('tanggapan', [TanggapanController::class, 'store'])->name('tanggapan.store');
    });


    // ---------------------------------------------------------------------------------
    // -- Route yang hanya bisa diakses oleh ADMIN
    // ---------------------------------------------------------------------------------
    Route::group(['middleware' => 'role:admin'], function () {
        // =================================================
        // == RUTE BARU UNTUK MANAJEMEN USER ==
        // =================================================
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/data', [UserController::class, 'getData'])->name('users.data'); // Untuk DataTables
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users', [UserController::class, 'store'])->name('users.store');
        Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        // =================================================
        // == [BARU] RUTE UNTUK MANAJEMEN GALERI ==
        // =================================================
        Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
        Route::get('gallery/data', [GalleryController::class, 'getData'])->name('gallery.data');
        Route::get('gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::get('gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');
        Route::get('gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
        Route::put('gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
        Route::delete('gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

        // =================================================
        // == [BARU] RUTE UNTUK MANAJEMEN BERITA & PENGUMUMAN ==
        // =================================================
        Route::get('posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('posts/data', [PostController::class, 'getData'])->name('posts.data');
        Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');
        Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

        // =================================================
        // == RUTE BARU UNTUK MODUL LAPORAN ==
        // =================================================
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('laporan/data', [LaporanController::class, 'getData'])->name('laporan.data');
        Route::get('laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.exportPdf');
    });


    // ---------------------------------------------------------------------------------
    // -- Route yang hanya bisa diakses oleh MASYARAKAT
    // ---------------------------------------------------------------------------------
    Route::group(['middleware' => 'role:masyarakat'], function () {
        // DataTables untuk dashboard masyarakat
        Route::get('dashboard/pengaduan-saya', [DashboardController::class, 'getMyPengaduan'])->name('dashboard.my-pengaduan');

        // =================================================
        // == RUTE BARU UNTUK MODUL PENGADUAN ==
        // =================================================
        Route::get('pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index')->withoutMiddleware('role:masyarakat');
        Route::get('pengaduan/data', [PengaduanController::class, 'getData'])->name('pengaduan.data')->withoutMiddleware('role:masyarakat'); // Untuk DataTables
        Route::get('pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
        Route::post('pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
        Route::get('pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show')->withoutMiddleware('role:masyarakat');
        Route::get('pengaduan/{id}/edit', [PengaduanController::class, 'edit'])->name('pengaduan.edit');
        Route::put('pengaduan/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update');
        Route::delete('pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    });
});
