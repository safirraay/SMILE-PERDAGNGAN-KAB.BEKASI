<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman registrasi.
     */
    public function index()
    {
        // [UPDATE] Mengambil hanya Provinsi Jawa Barat dan Kota/Kab. Bekasi
        $province = Province::where('name', 'JAWA BARAT')->first();
        $regencies = $province ? Regency::where('province_id', $province->id)->whereIn('name', ['KABUPATEN BEKASI'])->get() : collect();

        $data = [
            'title'     => 'Halaman Registrasi',
            'province'  => $province,
            'regencies' => $regencies
        ];

        return view('auth.register', $data);
    }

    /**
     * Memproses data registrasi baru.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'nik'           => 'required|string|size:16|unique:masyarakat,nik',
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:users,username',
            'email'         => 'required|string|email|max:255|unique:users,email',
            'phone_number'  => 'required|string|max:15',
            'password'      => 'required|string|min:8|confirmed',
            'address'       => 'required|string',
            'gender'        => 'required|in:laki-laki,perempuan',
            'rt'            => 'required|string|max:3',
            'rw'            => 'required|string|max:3',
            'postal_code'   => 'required|string|max:5',
            'province_id'   => 'required|exists:provinces,id',
            'regency_id'    => 'required|exists:regencies,id',
            'district_id'   => 'required|exists:districts,id',
            'village_id'    => 'required|exists:villages,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register.index')
                ->withErrors($validator)
                ->withInput();
        }

        // Gunakan DB Transaction untuk memastikan kedua data berhasil dibuat
        DB::beginTransaction();
        try {
            // 1. Buat data di tabel 'users'
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'level' => 'masyarakat',
            ]);

            // 2. Buat data di tabel 'masyarakat'
            Masyarakat::create([
                'user_id' => $user->id,
                'nik' => $request->nik,
                'address' => $request->address,
                'gender' => $request->gender,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'postal_code' => $request->postal_code,
                'village_id' => $request->village_id,
            ]);

            // Jika berhasil, commit transaksi
            DB::commit();

            return redirect()->route('auth.index')
                ->with('success', 'Registrasi berhasil! Silakan login dengan akun Anda.');
        } catch (\Exception $e) {
            // Jika terjadi error, rollback transaksi
            DB::rollBack();

            // Tampilkan pesan error
            return redirect()->route('register.index')
                ->with('error', 'Terjadi kesalahan saat registrasi. Silakan coba lagi.');
        }
    }

    // --- FUNGSI UNTUK AJAX DEPENDENT DROPDOWN ---

    public function getRegencies(Request $request)
    {
        $province_id = $request->province_id;
        $regencies = Regency::where('province_id', $province_id)->get();
        return response()->json($regencies);
    }

    public function getDistricts(Request $request)
    {
        $regency_id = $request->regency_id;
        $districts = District::where('regency_id', $regency_id)->get();
        return response()->json($districts);
    }

    public function getVillages(Request $request)
    {
        $district_id = $request->district_id;
        $villages = Village::where('district_id', $district_id)->get();
        return response()->json($villages);
    }
}
