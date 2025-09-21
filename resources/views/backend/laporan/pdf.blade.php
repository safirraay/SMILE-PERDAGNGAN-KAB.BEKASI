<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            font-size: 11px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
        }

        .header p {
            margin: 2px 0;
            font-size: 12px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .badge {
            padding: 3px 7px;
            border-radius: 12px;
            color: white;
            font-size: 10px;
        }

        .badge-danger {
            background-color: #f5365c;
        }

        .badge-warning {
            background-color: #fb6340;
        }

        .badge-success {
            background-color: #2dce89;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>{{ $title }}</h2>
        <p>DINAS PERDAGANGAN KABUPATEN BEKASI</p>
        <p><strong>Periode:</strong> {{ \Carbon\Carbon::parse($startDate)->isoFormat('D MMMM Y') }} s/d {{
            \Carbon\Carbon::parse($endDate)->isoFormat('D MMMM Y') }} | <strong>Status:</strong> {{ $status == 'semua' ?
            'Semua' : ucfirst($status) }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th>Tanggal Lapor</th>
                <th>Judul Laporan</th>
                <th>Pelapor</th>
                <th>Tanggal Kejadian</th>
                <th>Lokasi</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengaduan as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::parse($item->report_date)->format('d-m-Y') }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ optional(optional($item->masyarakat)->user)->name ?? 'Data Pelapor Dihapus' }}</td>
                <td>{{ \Carbon\Carbon::parse($item->incident_date)->format('d-m-Y') }}</td>
                <td>{{ $item->location }}</td>
                <td class="text-center">
                    @if($item->status == '0') Masuk
                    @elseif($item->status == 'proses') Diproses
                    @elseif($item->status == 'selesai') Selesai
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada data untuk periode dan status yang dipilih.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>