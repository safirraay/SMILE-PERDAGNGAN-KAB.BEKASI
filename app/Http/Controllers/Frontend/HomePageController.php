<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengaduan; // Import model Pengaduan

class HomePageController extends Controller
{
    /**
     * Menampilkan halaman utama.
     */
    public function index()
    {
        $totalPengaduan = Pengaduan::count();
        $pengaduanDiproses = Pengaduan::where('status', 'proses')->count();
        $pengaduanSelesai = Pengaduan::where('status', 'selesai')->count();

        $data = [
            'title'             => 'Halaman Utama',
            'totalPengaduan'    => $totalPengaduan,
            'pengaduanDiproses' => $pengaduanDiproses,
            'pengaduanSelesai'  => $pengaduanSelesai,
        ];
        return view('frontend.home', $data);
    }

    /**
     * [BARU] Menampilkan halaman Visi & Misi.
     */
    public function visiMisi()
    {
        $data = [
            'title' => 'Visi & Misi',
        ];
        return view('frontend.visi-misi', $data);
    }

    /**
     * [BARU] Menampilkan halaman Ruang Lingkup.
     */
    public function ruangLingkup()
    {
        $data = [
            'title' => 'Ruang Lingkup',
        ];
        return view('frontend.ruang-lingkup', $data);
    }

    /**
     * [BARU] Menampilkan halaman Unit Kerja.
     */
    public function unitKerja()
    {
        $data = [
            'title' => 'Unit Kerja',
        ];
        return view('frontend.unit-kerja', $data);
    }

    /**
     * [BARU] Menampilkan halaman Struktur Organisasi.
     */
    public function strukturOrganisasi()
    {
        $data = [
            'title' => 'Struktur Organisasi',
        ];
        return view('frontend.struktur-organisasi', $data);
    }

    /**
     * [BARU] Menampilkan halaman Tugas & Fungsi.
     */
    public function tugasFungsi()
    {
        $data = [
            'title' => 'Tugas & Fungsi',
        ];
        return view('frontend.tugas-fungsi', $data);
    }

    /**
     * [BARU] Menampilkan halaman Regulasi & Kebijakan.
     */
    public function regulasiKebijakan()
    {
        $data = [
            'title' => 'Regulasi & Kebijakan',
        ];
        return view('frontend.regulasi-kebijakan', $data);
    }

    /**
     * [UPDATE] Menampilkan halaman Berita & Pengumuman dari database.
     */
    public function beritaPengumuman()
    {
        $data = [
            'title' => 'Berita & Pengumuman',
            // Ambil hanya postingan yang sudah di-publish, urutkan dari yang terbaru, dan paginasi
            'posts' => Post::whereNotNull('published_at')->latest('published_at')->paginate(6),
        ];
        return view('frontend.berita-pengumuman', $data);
    }

    /**
     * [BARU] Menampilkan halaman Bapokting.
     */
    public function bapokting()
    {
        $data = [
            'title' => 'Komoditas Bapokting',
        ];
        return view('frontend.bapokting', $data);
    }

    /**
     * [BARU] Menampilkan halaman Daftar UPTD.
     */
    public function daftarUptd()
    {
        $data = [
            'title' => 'Daftar UPTD',
        ];
        return view('frontend.daftar-uptd', $data);
    }

    /**
     * [BARU] Menampilkan halaman Jenis SKA.
     */
    public function jenisSka()
    {
        $data = [
            'title' => 'Jenis SKA',
        ];
        return view('frontend.jenis-ska', $data);
    }

    /**
     * [BARU] Menampilkan halaman Tera Ulang.
     */
    public function teraUlang()
    {
        $data = [
            'title' => 'Tera Ulang',
        ];
        return view('frontend.tera-ulang', $data);
    }

    /**
     * [BARU] Menampilkan halaman Pelayanan.
     */
    public function pelayanan()
    {
        $data = [
            'title' => 'Alur Pelayanan Pengaduan',
        ];
        return view('frontend.pelayanan', $data);
    }

    /**
     * [UPDATE] Menampilkan halaman galeri dari database.
     */
    public function gallery()
    {
        $data = [
            'title'     => 'Galeri Kegiatan',
            'galleries' => Gallery::latest()->get(), // Ambil semua data galeri
        ];
        return view('frontend.gallery', $data);
    }

    /**
     * [BARU] Menampilkan halaman kontak.
     */
    public function contact()
    {
        $data = [
            'title' => 'Kontak Kami',
        ];
        return view('frontend.contact', $data);
    }
}
