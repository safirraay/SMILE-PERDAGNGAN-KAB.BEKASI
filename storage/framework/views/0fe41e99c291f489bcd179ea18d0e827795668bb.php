

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-8">
        <form action="<?php echo e(route('pengaduan.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0"><?php echo e($title); ?></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-control-label">Judul Pengaduan</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="ni ni-ruler-pencil"></i></span></div><input type="text" name="title"
                                id="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Ketik judul pengaduan..." value="<?php echo e(old('title')); ?>" required>
                        </div>
                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback d-block"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="incident_date" class="form-control-label">Tanggal Kejadian</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="ni ni-calendar-grid-58"></i></span></div><input
                                        name="incident_date" id="incident_date"
                                        class="form-control datepicker <?php $__errorArgs = ['incident_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Pilih tanggal" type="text"
                                        value="<?php echo e(old('incident_date', date('Y-m-d'))); ?>" required>
                                </div>
                                <?php $__errorArgs = ['incident_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location" class="form-control-label">Lokasi Kejadian</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="ni ni-pin-3"></i></span></div><input type="text" name="location"
                                        id="location" class="form-control <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Contoh: Jl. Merdeka No. 10" value="<?php echo e(old('location')); ?>" required>
                                </div>
                                <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback d-block"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-control-label">Isi Laporan / Pengaduan</label>
                        <textarea name="content" id="content"
                            class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="5"
                            placeholder="Tuliskan laporan Anda secara detail..."
                            required><?php echo e(old('content')); ?></textarea>
                        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="form-control-label">Foto Bukti (Opsional)</label>
                        <div class="custom-file"><input type="file" name="photo"
                                class="custom-file-input <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="photo" lang="id"
                                accept="image/*"><label class="custom-file-label text-left" for="photo">Pilih
                                gambar...</label></div>
                        <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback d-block"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo e(route('pengaduan.index')); ?>" class="btn btn-secondary"><i
                            class="fas fa-arrow-left mr-2"></i>Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane mr-2"></i>Kirim
                        Pengaduan</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-4">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0">Preview Foto</h5>
            </div>
            <div class="card-body text-center p-4">
                <img src="<?php echo e(asset('assets/backend/img/image-default.png')); ?>" alt="preview" class="img-fluid rounded"
                    id="photo-preview" style="max-height: 300px; border: 1px solid #ddd;">
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
    $(document).ready(function() {
    $('.datepicker').datepicker({ format: 'yyyy-mm-dd', autoclose: true, todayHighlight: true });
    $('#photo').on('change', function(event){
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName || 'Pilih gambar...');
        if (event.target.files[0]) {
            var output = document.getElementById('photo-preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() { URL.revokeObjectURL(output.src) }
        }
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app-backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\app_smileperdagangan_laravel8\resources\views/backend/pengaduan/create.blade.php ENDPATH**/ ?>