<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>
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
        <h2><?php echo e($title); ?></h2>
        <p>DINAS PERDAGANGAN KABUPATEN BEKASI</p>
        <p><strong>Periode:</strong> <?php echo e(\Carbon\Carbon::parse($startDate)->isoFormat('D MMMM Y')); ?> s/d <?php echo e(\Carbon\Carbon::parse($endDate)->isoFormat('D MMMM Y')); ?> | <strong>Status:</strong> <?php echo e($status == 'semua' ?
            'Semua' : ucfirst($status)); ?></p>
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
            <?php $__empty_1 = true; $__currentLoopData = $pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($item->report_date)->format('d-m-Y')); ?></td>
                <td><?php echo e($item->title); ?></td>
                <td><?php echo e(optional(optional($item->masyarakat)->user)->name ?? 'Data Pelapor Dihapus'); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($item->incident_date)->format('d-m-Y')); ?></td>
                <td><?php echo e($item->location); ?></td>
                <td class="text-center">
                    <?php if($item->status == '0'): ?> Masuk
                    <?php elseif($item->status == 'proses'): ?> Diproses
                    <?php elseif($item->status == 'selesai'): ?> Selesai
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7" class="text-center">Tidak ada data untuk periode dan status yang dipilih.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html><?php /**PATH C:\Users\syafira yudhanti\app_smileperdagangan_laravel8\app_smileperdagangan_laravel8\resources\views/backend/laporan/pdf.blade.php ENDPATH**/ ?>