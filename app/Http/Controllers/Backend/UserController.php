<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Regency;
use App\Models\Province;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Menampilkan halaman daftar user.
     */
    public function index()
    {
        $data = [
            'title'      => 'Manajemen Pengguna',
            'total'      => User::count(),
            'admin'      => User::where('level', 'admin')->count(),
            'petugas'    => User::where('level', 'petugas')->count(),
            'masyarakat' => User::where('level', 'masyarakat')->count(),
        ];
        return view('backend.users.index', $data);
    }

    /**
     * Mengambil data untuk DataTables.
     */
    public function getData(Request $request)
    {
        $query = User::latest();

        if ($request->filled('level') && $request->level !== 'semua') {
            $query->where('level', $request->level);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('avatar', function ($row) {
                $avatarUrl = $row->avatar ? Storage::url($row->avatar) : asset('assets/backend/img/avatars/user-default.png');
                return '<img src="' . $avatarUrl . '" alt="Avatar" class="avatar rounded-circle">';
            })
            ->editColumn('level', function ($row) {
                if ($row->level === 'admin') return '<span class="badge badge-primary">Admin</span>';
                if ($row->level === 'petugas') return '<span class="badge badge-info">Petugas</span>';
                if ($row->level === 'masyarakat') return '<span class="badge badge-secondary">Masyarakat</span>';
                return '';
            })
            ->addColumn('action', function ($row) {
                $viewUrl = route('users.show', $row->id);
                $editUrl = route('users.edit', $row->id);
                $btn = '<a href="' . $viewUrl . '" class="btn btn-sm btn-info" title="Lihat Detail"><i class="fas fa-eye"></i></a> ';
                $btn .= '<a href="' . $editUrl . '" class="btn btn-sm btn-primary" title="Edit User"><i class="fas fa-edit"></i></a> ';
                if (Auth::id() != $row->id) {
                    $btn .= '<button onclick="deleteUser(' . $row->id . ')" class="btn btn-sm btn-danger" title="Hapus User"><i class="fas fa-trash"></i></button>';
                }
                return $btn;
            })
            ->rawColumns(['avatar', 'level', 'action'])
            ->make(true);
    }

    /**
     * Menampilkan form untuk membuat user baru.
     */
    public function create()
    {
        // [UPDATE] Mengambil hanya Provinsi Jawa Barat dan Kota/Kab. Bekasi
        $province = Province::where('name', 'JAWA BARAT')->first();
        $regencies = $province ? Regency::where('province_id', $province->id)->whereIn('name', ['KABUPATEN BEKASI'])->get() : collect();

        $data = [
            'title'     => 'Tambah User Baru',
            'province'  => $province,
            'regencies' => $regencies
        ];
        return view('backend.users.create', $data);
    }

    /**
     * Menyimpan user baru ke database.
     */
    public function store(Request $request)
    {
        $level = $request->level;
        $rules = [
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:users,username',
            'email'         => 'required|string|email|max:255|unique:users,email',
            'phone_number'  => 'required|string|max:15',
            'level'         => 'required|in:admin,petugas,masyarakat',
            'password'      => 'required|string|min:8|confirmed',
            'avatar'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($level === 'masyarakat') {
            $rules += [
                'nik'           => 'required|string|size:16|unique:masyarakat,nik',
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
            return redirect()->route('users.create')->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $avatarPath = null;
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
            }

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'level' => $request->level,
                'avatar' => $avatarPath,
            ]);

            if ($level === 'masyarakat') {
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
            }
            DB::commit();
            return redirect()->route('users.index')->with('success', 'Pengguna baru berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            $errorMessage = config('app.debug') ? $e->getMessage() : 'Terjadi kesalahan saat menambahkan pengguna.';
            return redirect()->route('users.create')->with('error', $errorMessage);
        }
    }

    /**
     * Menampilkan detail user.
     */
    public function show($id)
    {
        // [OPTIMASI] Eager load relasi bertingkat
        $user = User::with('masyarakat.village.district.regency.province')->findOrFail($id);
        $data = [
            'title' => 'Detail Pengguna',
            'user'  => $user,
        ];
        return view('backend.users.show', $data);
    }

    /**
     * Menampilkan form untuk mengedit user.
     */
    public function edit($id)
    {
        // [UPDATE] Mengambil hanya Provinsi Jawa Barat dan Kota/Kab. Bekasi
        $user = User::with('masyarakat.village.district.regency.province')->findOrFail($id);
        $province = Province::where('name', 'JAWA BARAT')->first();
        $regencies = $province ? Regency::where('province_id', $province->id)->whereIn('name', ['KABUPATEN BEKASI'])->get() : collect();

        $data = [
            'title'     => 'Edit User',
            'user'      => $user,
            'province'  => $province,
            'regencies' => $regencies,
        ];
        return view('backend.users.edit', $data);
    }

    /**
     * Memperbarui data user di database.
     */
    public function update(Request $request, $id)
    {
        $user = User::with('masyarakat')->findOrFail($id);
        $level = $request->level;

        $rules = [
            'name'          => 'required|string|max:255',
            'username'      => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email'         => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone_number'  => 'required|string|max:15',
            'level'         => 'required|in:admin,petugas,masyarakat',
            'avatar'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password'      => 'nullable|string|min:8|confirmed',
        ];

        if ($level === 'masyarakat') {
            $masyarakatId = $user->masyarakat ? $user->masyarakat->id : null;
            $rules += [
                'nik'           => ['required', 'string', 'size:16', Rule::unique('masyarakat', 'nik')->ignore($masyarakatId)],
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
            return redirect()->route('users.edit', $id)->withErrors($validator)->withInput();
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

            $userData = $request->only(['name', 'username', 'email', 'phone_number', 'level']);
            $userData['avatar'] = $avatarPath;
            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }
            $user->update($userData);

            if ($level === 'masyarakat') {
                $masyarakatData = $request->only(['nik', 'address', 'gender', 'rt', 'rw', 'postal_code', 'village_id']);
                if ($user->masyarakat) {
                    $user->masyarakat->update($masyarakatData);
                } else {
                    $masyarakatData['user_id'] = $user->id;
                    Masyarakat::create($masyarakatData);
                }
            } elseif ($user->masyarakat) {
                // Jika role diubah dari masyarakat ke admin/petugas, hapus data masyarakat terkait
                $user->masyarakat->delete();
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'Data pengguna berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            $errorMessage = config('app.debug') ? $e->getMessage() : 'Terjadi kesalahan saat memperbarui data.';
            return redirect()->route('users.edit', $id)->with('error', $errorMessage);
        }
    }

    /**
     * Menghapus user dari database.
     */
    public function destroy($id)
    {
        if ((int) Auth::id() === (int) $id) {
            return response()->json(['error' => 'Anda tidak dapat menghapus akun Anda sendiri.'], 403);
        }

        $user = User::findOrFail($id);
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }
        $user->delete();

        return response()->json(['success' => 'Pengguna berhasil dihapus.']);
    }
}
