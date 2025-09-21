<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Pengaduan;
use Yajra\DataTables\DataTables;

class PengaduanController extends Controller
{
    /**
     * Menampilkan halaman daftar pengaduan.
     */
    public function index()
    {
        $user = Auth::user();
        $data = [];

        if ($user->level === 'admin' || $user->level === 'petugas') {
            $data = [
                'title'   => 'Manajemen Data Pengaduan',
                'total'   => Pengaduan::count(),
                'masuk'   => Pengaduan::where('status', '0')->count(),
                'proses'  => Pengaduan::where('status', 'proses')->count(),
                'selesai' => Pengaduan::where('status', 'selesai')->count(),
            ];
            return view('backend.pengaduan.admin_index', $data);
        } else {
            // [OPTIMASI] Eager load relasi untuk efisiensi
            $user->load('masyarakat');
            $masyarakatId = $user->masyarakat->id;
            $data = [
                'title'   => 'Riwayat Pengaduan Saya',
                'total'   => Pengaduan::where('masyarakat_id', $masyarakatId)->count(),
                'proses'  => Pengaduan::where('masyarakat_id', $masyarakatId)->where('status', 'proses')->count(),
                'selesai' => Pengaduan::where('masyarakat_id', $masyarakatId)->where('status', 'selesai')->count(),
            ];
            return view('backend.pengaduan.index', $data);
        }
    }

    /**
     * Mengambil data untuk DataTables.
     */
    public function getData(Request $request)
    {
        $user = Auth::user();
        $query = null;

        if ($user->level === 'admin' || $user->level === 'petugas') {
            $query = Pengaduan::with('masyarakat.user')->latest('report_date');
        } else {
            $user->load('masyarakat');
            $masyarakatId = $user->masyarakat->id;
            $query = Pengaduan::where('masyarakat_id', $masyarakatId)->latest('report_date');
        }

        if ($request->filled('status') && $request->status !== 'semua') {
            $query->where('status', $request->status);
        }

        $datatables = DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('status', function ($row) {
                if ($row->status == '0') return '<span class="badge badge-danger">Masuk</span>';
                if ($row->status == 'proses') return '<span class="badge badge-warning">Diproses</span>';
                if ($row->status == 'selesai') return '<span class="badge badge-success">Selesai</span>';
                return '';
            });

        if ($user->level === 'admin' || $user->level === 'petugas') {
            $datatables->addColumn('pelapor', function ($row) {
                return optional($row->masyarakat)->user->name ?? '<span class="text-danger">Data Dihapus</span>';
            })
                ->addColumn('action', function ($row) {
                    $viewUrl = route('pengaduan.show', $row->id);
                    return '<a href="' . $viewUrl . '" class="btn btn-sm btn-info"><i class="fas fa-eye mr-2"></i>Detail</a>';
                })
                ->rawColumns(['status', 'action', 'pelapor']);
        } else {
            $datatables->addColumn('action', function ($row) {
                $viewUrl = route('pengaduan.show', $row->id);
                $editUrl = route('pengaduan.edit', $row->id);
                $btn = '<a href="' . $viewUrl . '" class="btn btn-sm btn-info"><i class="fas fa-eye mr-2"></i>Lihat</a> ';
                if ($row->status === '0') {
                    $btn .= '<a href="' . $editUrl . '" class="btn btn-sm btn-primary"><i class="fas fa-edit mr-2"></i>Edit</a> ';
                    $btn .= '<button onclick="deletePengaduan(' . $row->id . ')" class="btn btn-sm btn-danger"><i class="fas fa-trash mr-2"></i>Hapus</button>';
                }
                return $btn;
            })
                ->rawColumns(['status', 'action']);
        }

        return $datatables->make(true);
    }

    /**
     * Menampilkan form untuk membuat pengaduan baru.
     */
    public function create()
    {
        $data = ['title' => 'Buat Pengaduan Baru'];
        return view('backend.pengaduan.create', $data);
    }

    /**
     * Menyimpan pengaduan baru ke database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'incident_date' => 'required|date',
            'location'      => 'required|string|max:255',
            'content'       => 'required|string|min:10',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pengaduan.create')->withErrors($validator)->withInput();
        }

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('pengaduan', 'public');
        }

        Pengaduan::create([
            'masyarakat_id' => Auth::user()->masyarakat->id,
            'report_date'   => now(),
            'title'         => $request->title,
            'incident_date' => $request->incident_date,
            'location'      => $request->location,
            'content'       => $request->content,
            'photo'         => $photoPath,
            'status'        => '0',
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim.');
    }

    /**
     * Menampilkan detail satu pengaduan.
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::with(['masyarakat.user', 'tanggapan.user'])->findOrFail($id);
        $user = Auth::user();

        if ($user->level === 'masyarakat') {
            $user->load('masyarakat');
            if (optional($pengaduan->masyarakat)->id !== $user->masyarakat->id) {
                abort(403, 'ANDA TIDAK MEMILIKI AKSES.');
            }
        }

        $data = [
            'title'     => 'Detail Pengaduan',
            'pengaduan' => $pengaduan,
        ];
        return view('backend.pengaduan.show', $data);
    }

    /**
     * Menampilkan form untuk mengedit pengaduan.
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $user = Auth::user();
        $user->load('masyarakat');

        if ($pengaduan->masyarakat_id !== $user->masyarakat->id || $pengaduan->status !== '0') {
            abort(403, 'PENGADUAN INI TIDAK DAPAT DIEDIT.');
        }

        $data = [
            'title'     => 'Edit Pengaduan',
            'pengaduan' => $pengaduan,
        ];
        return view('backend.pengaduan.edit', $data);
    }

    /**
     * Memperbarui data pengaduan di database.
     */
    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $user = Auth::user();
        $user->load('masyarakat');

        if ($pengaduan->masyarakat_id !== $user->masyarakat->id || $pengaduan->status !== '0') {
            abort(403, 'PENGADUAN INI TIDAK DAPAT DIPERBARUI.');
        }

        $validator = Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'incident_date' => 'required|date',
            'location'      => 'required|string|max:255',
            'content'       => 'required|string|min:10',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pengaduan.edit', $id)->withErrors($validator)->withInput();
        }

        $photoPath = $pengaduan->photo;
        if ($request->hasFile('photo')) {
            if ($photoPath && Storage::disk('public')->exists($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }
            $photoPath = $request->file('photo')->store('pengaduan', 'public');
        }

        $pengaduan->update([
            'title'         => $request->title,
            'incident_date' => $request->incident_date,
            'location'      => $request->location,
            'content'       => $request->content,
            'photo'         => $photoPath,
        ]);

        return redirect()->route('pengaduan.show', $id)->with('success', 'Pengaduan berhasil diperbarui.');
    }

    /**
     * Menghapus pengaduan dari database.
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $user = Auth::user();
        $user->load('masyarakat');

        if ($pengaduan->masyarakat_id !== $user->masyarakat->id || $pengaduan->status !== '0') {
            return response()->json(['error' => 'Gagal menghapus data. Anda tidak memiliki izin atau status pengaduan telah berubah.'], 403);
        }

        if ($pengaduan->photo && Storage::disk('public')->exists($pengaduan->photo)) {
            Storage::disk('public')->delete($pengaduan->photo);
        }

        $pengaduan->delete();

        return response()->json(['success' => 'Pengaduan berhasil dihapus.']);
    }
}
