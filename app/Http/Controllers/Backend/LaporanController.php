<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade\Pdf; // Menggunakan alias yang benar

class LaporanController extends Controller
{
    /**
     * Menampilkan halaman utama Laporan.
     */
    public function index()
    {
        $data = [
            'title' => 'Laporan Pengaduan'
        ];
        return view('backend.laporan.index', $data);
    }

    /**
     * Mengambil data untuk DataTables dengan filter.
     */
    public function getData(Request $request)
    {
        // Query dasar dengan eager loading untuk optimasi
        $query = Pengaduan::with('masyarakat.user')->withCount('tanggapan')->latest('report_date');

        // Menerapkan filter berdasarkan input
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('report_date', [$request->start_date, $request->end_date]);
        }

        if ($request->filled('status') && $request->status != 'semua') {
            $query->where('status', $request->status);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('pelapor', function ($row) {
                // Menggunakan optional() untuk mencegah error jika relasi kosong
                return optional($row->masyarakat)->user->name ?? '<span class="text-danger">Data Dihapus</span>';
            })
            ->editColumn('status', function ($row) {
                if ($row->status == '0') return '<span class="badge badge-danger">Masuk</span>';
                if ($row->status == 'proses') return '<span class="badge badge-warning">Diproses</span>';
                if ($row->status == 'selesai') return '<span class="badge badge-success">Selesai</span>';
                return '';
            })
            ->addColumn('jumlah_tanggapan', function ($row) {
                // Menggunakan hasil dari withCount untuk efisiensi
                return $row->tanggapan_count . ' tanggapan';
            })
            ->rawColumns(['pelapor', 'status'])
            ->make(true);
    }

    /**
     * Mengekspor data laporan ke format PDF.
     */
    public function exportPdf(Request $request)
    {
        // Query dasar dengan eager loading, sama seperti getData
        $query = Pengaduan::with('masyarakat.user')->latest('report_date');

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('report_date', [$request->start_date, $request->end_date]);
        }

        if ($request->filled('status') && $request->status != 'semua') {
            $query->where('status', $request->status);
        }

        $pengaduan = $query->get();

        $data = [
            'title'      => 'Laporan Pengaduan Masyarakat',
            'startDate'  => $request->start_date,
            'endDate'    => $request->end_date,
            'status'     => $request->status,
            'pengaduan'  => $pengaduan,
        ];

        $pdf = Pdf::loadView('backend.laporan.pdf', $data);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('laporan-pengaduan-' . date('Y-m-d') . '.pdf');
    }
}
