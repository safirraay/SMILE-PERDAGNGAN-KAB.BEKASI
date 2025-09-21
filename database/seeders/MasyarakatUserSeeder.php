<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Masyarakat;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class MasyarakatUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Buat data user untuk masyarakat
        $userMasyarakat = User::create([
            'name' => 'Budi Santoso',
            'username' => 'budi.santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'phone_number' => '085712345678',
            'level' => 'masyarakat',
        ]);

        // [UPDATE] Mencari desa secara spesifik di dalam Kabupaten Bekasi
        // Daripada mengambil desa pertama secara acak, kita pastikan lokasinya benar.
        $villageId = null;
        $kabupatenBekasi = Regency::where('name', 'KABUPATEN BEKASI')->first();

        if ($kabupatenBekasi) {
            // Ambil kecamatan pertama di Kabupaten Bekasi
            $district = District::where('regency_id', $kabupatenBekasi->id)->first();
            if ($district) {
                // Ambil desa pertama di kecamatan tersebut
                $village = Village::where('district_id', $district->id)->first();
                if ($village) {
                    $villageId = $village->id;
                }
            }
        }

        // Jika desa tidak ditemukan (misalnya seeder IndoRegion belum jalan), log pesan.
        if (is_null($villageId)) {
            Log::warning('Seeder Masyarakat: Tidak dapat menemukan data Desa di Kabupaten Bekasi. Pastikan seeder IndoRegion sudah dijalankan.');
            // Fallback ke desa pertama yang ada di database jika gagal
            $firstVillage = Village::first();
            $villageId = $firstVillage ? $firstVillage->id : null;
        }

        // 2. Buat profil masyarakat yang terhubung dengan user di atas
        Masyarakat::create([
            'user_id' => $userMasyarakat->id,
            'nik' => '3216012345678901', // Contoh NIK untuk Kab. Bekasi
            'address' => 'Jl. Cikarang Baru Raya No. 15',
            'gender' => 'laki-laki',
            'rt' => '001',
            'rw' => '005',
            'postal_code' => '17530',
            'village_id' => $villageId, // Gunakan id desa yang sudah ditemukan
        ]);
    }
}
