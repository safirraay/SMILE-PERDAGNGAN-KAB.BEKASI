<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // [UPDATE] Import DB facade untuk transaksi
use App\Models\Tanggapan;
use App\Models\Pengaduan;

class TanggapanController extends Controller
{
    /**
     * Menyimpan tanggapan baru dan memperbarui status pengaduan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // [KEAMANAN] 1. Otorisasi: Pastikan hanya Admin atau Petugas yang bisa mengakses
        $user = Auth::user();
        if ($user->level === 'masyarakat') {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES UNTUK MEMBERIKAN TANGGAPAN.');
        }

        // [UPDATE] 2. Validasi: Menggunakan $request->validate() yang lebih ringkas
        $validatedData = $request->validate([
            'pengaduan_id' => 'required|exists:pengaduan,id',
            'response'     => 'required|string|min:10',
            'status'       => 'required|in:proses,selesai',
        ]);

        // [INTEGRITAS DATA] 3. Gunakan Transaksi Database
        DB::beginTransaction();
        try {
            // Langkah 1: Buat data tanggapan baru
            Tanggapan::create([
                'pengaduan_id'  => $validatedData['pengaduan_id'],
                'user_id'       => $user->id,
                'response_date' => now(),
                'response'      => $validatedData['response'],
            ]);

            // Langkah 2: Update status pengaduan terkait
            $pengaduan = Pengaduan::findOrFail($validatedData['pengaduan_id']);
            $pengaduan->status = $validatedData['status'];
            $pengaduan->save();

            // Jika semua berhasil, commit transaksi
            DB::commit();

            return redirect()
                ->route('pengaduan.show', $validatedData['pengaduan_id'])
                ->with('success', 'Tanggapan berhasil dikirim dan status pengaduan telah diperbarui.');
        } catch (\Exception $e) {
            // Jika terjadi error, batalkan semua query (rollback)
            DB::rollBack();

            // Beri pesan error
            return redirect()
                ->route('pengaduan.show', $request->pengaduan_id)
                ->with('error', 'Terjadi kesalahan. Gagal mengirim tanggapan.');
        }
    }
}
