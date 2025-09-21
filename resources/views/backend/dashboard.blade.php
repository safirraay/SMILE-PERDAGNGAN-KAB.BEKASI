@extends('layouts.app-backend')

@section('header')
<div class="row">
    {{-- STATS UNTUK ADMIN & PETUGAS --}}
    @if(in_array(Auth::user()->level, ['admin', 'petugas']))
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total Pengaduan</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $totalPengaduan }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow"><i
                                class="fas fa-bullhorn"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Pengaduan Masuk</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $pengaduanMasuk }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow"><i
                                class="fas fa-inbox"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Diproses</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $pengaduanProses }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white rounded-circle shadow"><i
                                class="fas fa-sync-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Selesai</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $pengaduanSelesai }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow"><i
                                class="fas fa-check-circle"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- STATS UNTUK MASYARAKAT --}}
    @if(Auth::user()->level == 'masyarakat')
    <div class="col-xl-4 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total Pengaduan Saya</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $totalPengaduan }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow"><i
                                class="fas fa-file-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Diproses</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $pengaduanProses }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow"><i
                                class="fas fa-sync-alt"></i></div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm"><span class="text-nowrap">Dari total {{ $totalPengaduan }}
                        pengaduan</span></p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Selesai</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $pengaduanSelesai }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow"><i
                                class="fas fa-check-circle"></i></div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm"><span class="text-nowrap">Dari total {{ $totalPengaduan }}
                        pengaduan</span></p>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('content')
{{-- KONTEN UNTUK ADMIN & PETUGAS --}}
@if(in_array(Auth::user()->level, ['admin', 'petugas']))
<div class="row">
    <div class="col-xl-8 mb-5 mb-xl-0">
        <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                        <h2 class="text-white mb-0">Grafik Pengaduan Tahun {{ date('Y') }}</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="chart-pengaduan" class="chart-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="mb-0">Profil Saya</h3>
            </div>
            <div class="card-body text-center">
                <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('assets/backend/img/avatars/user-default.png') }}"
                    alt="User Avatar" class="rounded-circle img-fluid mb-3"
                    style="width: 120px; height: 120px; object-fit: cover;">
                <h4 class="mt-2">{{ Auth::user()->name }}</h4>
                <p class="text-muted">{{ Auth::user()->email }}</p>
                <a href="{{ route('profile.show') }}" class="btn btn-primary btn-sm">Lihat Profil</a>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="mb-0">Pengaduan Terbaru (Masuk & Diproses)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-items-center w-100" id="new-pengaduan-table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Pelapor</th>
                                <th>Judul Pengaduan</th>
                                <th>Tanggal Lapor</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

{{-- KONTEN UNTUK MASYARAKAT --}}
@if(Auth::user()->level == 'masyarakat')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Riwayat Pengaduan Saya</h3>
                    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary btn-sm"><i
                            class="fas fa-plus mr-2"></i>Buat Pengaduan Baru</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-items-center w-100" id="my-pengaduan-table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Tanggal Lapor</th>
                                <th>Judul Pengaduan</th>
                                <th>Status</th>
                                <th>Tanggapan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@push('js')
<script src="{{ asset('assets/backend/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
<script>
    $(document).ready(function() {
    @if(in_array(Auth::user()->level, ['admin', 'petugas']))
        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var chartData = @json($chartData ?? []);
        var dataCounts = Array(12).fill(0);

        for (var month in chartData) {
            if (chartData.hasOwnProperty(month)) {
                dataCounts[month - 1] = chartData[month];
            }
        }

        var ctx = document.getElementById('chart-pengaduan').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Jumlah Pengaduan',
                    data: dataCounts,
                    backgroundColor: 'rgba(255, 255, 255, 0.3)',
                    borderColor: 'rgba(255, 255, 255, 0.6)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{ ticks: { beginAtZero: true, fontColor: 'rgba(255, 255, 255, 0.7)', callback: function(value) { if (Number.isInteger(value)) { return value; } } }, gridLines: { color: "rgba(255, 255, 255, 0.15)" } }],
                    xAxes: [{ ticks: { fontColor: 'rgba(255, 255, 255, 0.7)' }, gridLines: { color: "rgba(255, 255, 255, 0.15)" } }]
                },
                legend: { display: false },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return 'Jumlah: ' + tooltipItem.yLabel;
                        }
                    }
                }
            }
        });

        $('#new-pengaduan-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('dashboard.new-pengaduan') }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'pelapor', name: 'masyarakat.user.name' },
                { data: 'title', name: 'title' },
                { data: 'report_date', name: 'report_date' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    @endif

    @if(Auth::user()->level == 'masyarakat')
        $('#my-pengaduan-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('dashboard.my-pengaduan') }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'report_date', name: 'report_date' },
                { data: 'title', name: 'title' },
                { data: 'status', name: 'status' },
                { data: 'tanggapan_count', name: 'tanggapan_count', searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    @endif
});
</script>
@endpush