<?php

namespace Database\Seeders;

use App\Models\User; // [UPDATE] Import model User
use Illuminate\Database\Seeder;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

class PengaduanTanggapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cari profil masyarakat berdasarkan NIK yang sudah kita buat di seeder sebelumnya
        $masyarakat = Masyarakat::where('nik', '3201234567890001')->first();

        // [UPDATE] Cari user petugas secara dinamis, bukan hardcode ID
        $petugas = User::where('username', 'petugas1')->first();

        // Jika masyarakat dan petugas ditemukan, buat pengaduan dan tanggapan
        if ($masyarakat && $petugas) {
            // Membuat 1 Pengaduan
            $pengaduan = Pengaduan::create([
                'report_date'   => now(),
                'masyarakat_id' => $masyarakat->id,
                'title'         => 'Lampu Jalan Raya Padam',
                'incident_date' => now()->subDays(3),
                'location'      => 'Depan Gerbang Perumahan Villa Indah',
                'content'       => 'Lampu penerangan jalan umum (PJU) di depan gerbang perumahan kami sudah padam selama 3 hari terakhir. Kondisi jalan menjadi sangat gelap dan rawan kecelakaan di malam hari. Mohon untuk segera diperbaiki.',
                'photo'         => 'fotos/lampu-mati.jpg',
                'status'        => 'proses',
            ]);

            // Membuat 1 Tanggapan untuk pengaduan di atas
            Tanggapan::create([
                'pengaduan_id'  => $pengaduan->id,
                'response_date' => now(),
                'response'      => 'Terima kasih atas laporannya. Tim kami akan segera menuju lokasi untuk melakukan pengecekan dan perbaikan. Mohon ditunggu.',
                // [UPDATE] Gunakan ID petugas yang ditemukan secara dinamis
                'user_id'       => $petugas->id,
            ]);
        }
    }
}
