

<?php $__env->startPush('css'); ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col">
        
        <div class="card shadow mb-4">
            <div class="card-header border-0">
                <h3 class="mb-0"><i class="fas fa-filter mr-2"></i>Filter Laporan</h3>
            </div>
            <div class="card-body">
                <form id="filter-form" class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <label for="start_date" class="form-control-label">Dari Tanggal:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input name="start_date" id="start_date" class="form-control datepicker"
                                    placeholder="Pilih tanggal awal" type="text" value="<?php echo e(date('Y-m-01')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <label for="end_date" class="form-control-label">Sampai Tanggal:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input name="end_date" id="end_date" class="form-control datepicker"
                                    placeholder="Pilih tanggal akhir" type="text" value="<?php echo e(date('Y-m-d')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <label for="status_filter" class="form-control-label">Status:</label>
                            <select class="form-control select2" id="status_filter" name="status"
                                data-placeholder="Pilih status">
                                <option value="semua">Semua Status</option>
                                <option value="0">Masuk</option>
                                <option value="proses">Diproses</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-end">
                        <div class="form-group">
                            <button type="button" id="filter-btn" class="btn btn-primary"><i
                                    class="fas fa-search mr-2"></i>Tampilkan</button>
                            <button type="button" id="export-pdf-btn" class="btn btn-danger"><i
                                    class="fas fa-file-pdf mr-2"></i>Ekspor PDF</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        
        <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="mb-0"><?php echo e($title); ?></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-items-center w-100" id="laporan-table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Tgl Lapor</th>
                                <th>Judul</th>
                                <th>Pelapor</th>
                                <th>Status</th>
                                <th>Jml Tanggapan</th>
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
        // Inisialisasi Datepicker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });

        // Inisialisasi Select2
        $('.select2').select2({
            theme: 'bootstrap-5',
            width: '100%'
        });

        // Inisialisasi DataTables
        var table = $('#laporan-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?php echo e(route('laporan.data')); ?>',
                data: function (d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                    d.status = $('#status_filter').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'report_date', name: 'report_date' },
                { data: 'title', name: 'title' },
                { data: 'pelapor', name: 'masyarakat.user.name' },
                { data: 'status', name: 'status' },
                { data: 'jumlah_tanggapan', name: 'jumlah_tanggapan', orderable: false, searchable: false },
            ]
        });

        // Event listener untuk tombol filter
        $('#filter-btn').on('click', function() {
            table.draw();
        });

        // Event listener untuk tombol Ekspor PDF
        $('#export-pdf-btn').on('click', function() {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();
            var status = $('#status_filter').val();

            var url = new URL('<?php echo e(route('laporan.exportPdf')); ?>');
            url.searchParams.append('start_date', startDate);
            url.searchParams.append('end_date', endDate);
            url.searchParams.append('status', status);

            window.open(url, '_blank');
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app-backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\syafira yudhanti\app_smileperdagangan_laravel8\app_smileperdagangan_laravel8\resources\views/backend/laporan/index.blade.php ENDPATH**/ ?>