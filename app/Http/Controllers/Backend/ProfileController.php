<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Regency;
use App\Models\Province;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     */
    public function show()
    {
        $user = Auth::user();
        $pengaduanCount = 0;

        if ($user->level === 'masyarakat') {
            // [OPTIMASI] Eager load relasi bertingkat dan hitung relasi
            $user->load('masyarakat.village.district.regency.province');
            $pengaduanCount = Pengaduan::where('masyarakat_id', $user->masyarakat->id)->count();
        } elseif ($user->level === 'petugas') {
            $pengaduanCount = Tanggapan::where('user_id', $user->id)->count();
        } elseif ($user->level === 'admin') {
            $pengaduanCount = Pengaduan::count();
        }

        $data = [
            'title' => 'Profil Saya',
            'user'  => $user,
            'pengaduanCount' => $pengaduanCount,
        ];

        return view('backend.profile.show', $data);
    }

    /**
     * Menampilkan form edit profil.
     */
    public function edit()
    {
        // [UPDATE] Mengambil hanya Provinsi Jawa Barat dan Kota/Kab. Bekasi
        $user = Auth::user();
        $province = null;
        $regencies = null;

        if ($user->level == 'masyarakat') {
            $user->load('masyarakat.village.district.regency.province');
            $province = Province::where('name', 'JAWA BARAT')->first();
            $regencies = $province ? Regency::where('province_id', $province->id)->whereIn('name', ['KABUPATEN BEKASI'])->get() : collect();
        }

        $data = [
            'title'     => 'Edit Profil',
            'user'      => $user,
            'province'  => $province,
            'regencies' => $regencies,
        ];
        return view('backend.profile.edit', $data);
    }

    /**
     * Memproses pembaruan data profil.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'name'          => 'required|string|max:255',
            'username'      => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email'         => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone_number'  => 'required|string|max:15',
            'avatar'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($user->level === 'masyarakat') {
            $rules += [
                'nik'           => ['required', 'string', 'size:16', Rule::unique('masyarakat', 'nik')->ignore($user->masyarakat->id)],
                'address'       => 'required|string',
                'gender'        => 'required|in:laki-laki,perempuan',
                'rt'            => 'required|string|max:3',
                'rw'            => 'required|string|max:3',
                'postal_code'   => 'required|string|max:5',
                'village_id'    => 'required|exists:villages,id',
            ];
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('profile.edit')->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $avatarPath = $user->avatar;
            if ($request->hasFile('avatar')) {
                if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);
                }
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
            }

            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'avatar' => $avatarPath,
            ]);

            if ($user->level === 'masyarakat') {
                $user->masyarakat->update([
                    'nik' => $request->nik,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                    'postal_code' => $request->postal_code,
                    'village_id' => $request->village_id,
                ]);
            }

            DB::commit();
            return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            $errorMessage = 'Terjadi kesalahan saat memperbarui profil. Silakan coba lagi.';
            if (config('app.debug')) {
                $errorMessage = $e->getMessage();
            }
            return redirect()->route('profile.edit')->with('error', $errorMessage);
        }
    }

    /**
     * Memproses pembaruan password.
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'string', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('Password saat ini tidak cocok.');
                }
            }],
            'password' => 'required|string|min:8|confirmed',
        ]);

        // [UPDATE] Menggunakan error bag 'updatePassword'
        if ($validator->fails()) {
            return redirect()->route('profile.edit')
                ->withErrors($validator, 'updatePassword')
                ->with('tab', 'password');
        }

        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route('profile.show')->with('success', 'Password berhasil diubah.');
    }
}
