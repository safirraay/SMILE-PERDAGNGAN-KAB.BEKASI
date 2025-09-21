<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     */
    public function index()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();

        $data = [
            'title' => 'Dashboard',
            'user'  => $user,
        ];

        // Logika untuk level Admin dan Petugas
        if ($user->level === 'admin' || $user->level === 'petugas') {
            $data['totalPengaduan'] = Pengaduan::count();
            $data['pengaduanMasuk'] = Pengaduan::where('status', '0')->count();
            $data['pengaduanProses'] = Pengaduan::where('status', 'proses')->count();
            $data['pengaduanSelesai'] = Pengaduan::where('status', 'selesai')->count();

            // Query untuk data chart
            $chartQuery = Pengaduan::select(
                DB::raw('MONTH(report_date) as month'),
                DB::raw('COUNT(*) as count')
            )
                ->whereYear('report_date', date('Y'))
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();

            $chartData = [];
            foreach ($chartQuery as $item) {
                $chartData[$item->month] = $item->count;
            }
            $data['chartData'] = $chartData;
        }
        // Logika untuk level Masyarakat
        elseif ($user->level === 'masyarakat') {
            // [OPTIMASI] Eager load relasi 'masyarakat' untuk menghindari N+1 query
            $user->load('masyarakat');

            $masyarakatId = $user->masyarakat->id;
            $data['totalPengaduan'] = Pengaduan::where('masyarakat_id', $masyarakatId)->count();
            $data['pengaduanProses'] = Pengaduan::where('masyarakat_id', $masyarakatId)->where('status', 'proses')->count();
            $data['pengaduanSelesai'] = Pengaduan::where('masyarakat_id', $masyarakatId)->where('status', 'selesai')->count();
        }

        return view('backend.dashboard', $data);
    }

    /**
     * Mengambil data pengaduan terbaru untuk DataTables Admin/Petugas.
     */
    public function getNewPengaduan()
    {
        // Eager load relasi untuk optimasi
        $query = Pengaduan::with('masyarakat.user')
            ->whereIn('status', ['0', 'proses'])
            ->latest('report_date');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('pelapor', function ($row) {
                // Pengecekan relasi untuk menghindari error jika data terhapus
                if ($row->masyarakat && $row->masyarakat->user) {
                    return $row->masyarakat->user->name;
                }
                return '<span class="text-danger">Data Pelapor Dihapus</span>';
            })
            ->editColumn('status', function ($row) {
                if ($row->status == '0') {
                    return '<span class="badge badge-danger">Masuk</span>';
                } elseif ($row->status == 'proses') {
                    return '<span class="badge badge-warning">Diproses</span>';
                }
                return '<span class="badge badge-info">N/A</span>';
            })
            ->addColumn('action', function ($row) {
                $url = route('pengaduan.show', $row->id);
                return '<a href="' . $url . '" class="btn btn-sm btn-primary"><i class="fas fa-eye mr-2"></i>Detail</a>';
            })
            ->rawColumns(['status', 'action', 'pelapor'])
            ->make(true);
    }

    /**
     * Mengambil data pengaduan milik masyarakat yang login untuk DataTables.
     */
    public function getMyPengaduan()
    {
        $masyarakatId = Auth::user()->masyarakat->id;

        // withCount sangat efisien untuk menghitung relasi
        $query = Pengaduan::where('masyarakat_id', $masyarakatId)
            ->withCount('tanggapan')
            ->latest('report_date');

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('status', function ($row) {
                if ($row->status == '0') return '<span class="badge badge-danger">Terkirim</span>';
                if ($row->status == 'proses') return '<span class="badge badge-warning">Diproses</span>';
                if ($row->status == 'selesai') return '<span class="badge badge-success">Selesai</span>';
                return '';
            })
            ->editColumn('tanggapan_count', function ($row) {
                return $row->tanggapan_count . ' Tanggapan';
            })
            ->addColumn('action', function ($row) {
                $url = route('pengaduan.show', $row->id);
                return '<a href="' . $url . '" class="btn btn-sm btn-primary"><i class="fas fa-eye mr-2"></i>Lihat</a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
}