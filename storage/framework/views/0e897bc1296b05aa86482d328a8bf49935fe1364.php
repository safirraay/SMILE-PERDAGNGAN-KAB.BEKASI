

<?php $__env->startPush('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('header'); ?>

<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total Pengaduan</h5><span
                            class="h2 font-weight-bold mb-0"><?php echo e($total); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow"><i
                                class="fas fa-file-alt"></i></div>
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
                        <h5 class="card-title text-uppercase text-muted mb-0">Pengaduan Masuk</h5><span
                            class="h2 font-weight-bold mb-0"><?php echo e($masuk); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow"><i
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
                        <h5 class="card-title text-uppercase text-muted mb-0">Diproses</h5><span
                            class="h2 font-weight-bold mb-0"><?php echo e($proses); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow"><i
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
                        <h5 class="card-title text-uppercase text-muted mb-0">Selesai</h5><span
                            class="h2 font-weight-bold mb-0"><?php echo e($selesai); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow"><i
                                class="fas fa-check-circle"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col">
        
        <div class="card shadow mb-4">
            <div class="card-header border-0">
                <h3 class="mb-0"><i class="fas fa-filter mr-2"></i>Filter Pengaduan</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="status_filter" class="form-control-label">Filter berdasarkan status:</label>
                    <select class="form-control select2" id="status_filter">
                        <option value="semua">Semua Status</option>
                        <option value="0">Masuk</option>
                        <option value="proses">Diproses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
            </div>
        </div>

        
        <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="mb-0"><?php echo e($title); ?></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-items-center w-100" id="pengaduan-table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Tgl Lapor</th>
                                <th>Judul</th>
                                <th>Pelapor</th>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2({ theme: 'bootstrap-5', width: '100%' });

    var table = $('#pengaduan-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?php echo e(route('pengaduan.data')); ?>',
            data: function (d) {
                d.status = $('#status_filter').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'report_date', name: 'report_date' },
            { data: 'title', name: 'title' },
            { data: 'pelapor', name: 'masyarakat.user.name' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

    $('#status_filter').on('change', function() {
        table.draw();
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app-backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\app_smileperdagangan_laravel8\resources\views/backend/pengaduan/admin_index.blade.php ENDPATH**/ ?>