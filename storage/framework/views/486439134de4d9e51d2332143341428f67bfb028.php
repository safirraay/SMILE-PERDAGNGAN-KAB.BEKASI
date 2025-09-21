

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-7">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Detail Pengaduan</h3>
                <div>
                    <?php if($pengaduan->status == '0'): ?> <span class="badge badge-danger">Masuk</span>
                    <?php elseif($pengaduan->status == 'proses'): ?> <span class="badge badge-warning">Diproses</span>
                    <?php else: ?> <span class="badge badge-success">Selesai</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <h4 class="mb-3"><?php echo e($pengaduan->title); ?></h4>
                <dl class="row">
                    <dt class="col-sm-4">Pelapor</dt>
                    <dd class="col-sm-8">: <?php echo e(optional(optional($pengaduan->masyarakat)->user)->name ?? 'N/A'); ?></dd>
                    <dt class="col-sm-4">NIK</dt>
                    <dd class="col-sm-8">: <?php echo e(optional($pengaduan->masyarakat)->nik ?? 'N/A'); ?></dd>
                    <hr class="col-12 my-2">
                    <dt class="col-sm-4">Tanggal Lapor</dt>
                    <dd class="col-sm-8">: <?php echo e(\Carbon\Carbon::parse($pengaduan->report_date)->isoFormat('dddd, D MMMM
                        Y')); ?></dd>
                    <dt class="col-sm-4">Tanggal Kejadian</dt>
                    <dd class="col-sm-8">: <?php echo e(\Carbon\Carbon::parse($pengaduan->incident_date)->isoFormat('dddd, D MMMM
                        Y')); ?></dd>
                    <dt class="col-sm-4">Lokasi Kejadian</dt>
                    <dd class="col-sm-8">: <?php echo e($pengaduan->location); ?></dd>
                    <hr class="col-12 my-2">
                    <dt class="col-sm-12">Isi Laporan:</dt>
                    <dd class="col-sm-12 mt-2"><?php echo e($pengaduan->content); ?></dd>
                </dl>
                <?php if($pengaduan->photo): ?>
                <hr>
                <h5>Foto Bukti:</h5>
                <a href="<?php echo e(Storage::url($pengaduan->photo)); ?>" target="_blank">
                    <img src="<?php echo e(Storage::url($pengaduan->photo)); ?>" alt="Foto Bukti" class="img-fluid rounded"
                        style="max-height: 400px;">
                </a>
                <?php endif; ?>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary"><i
                        class="fas fa-arrow-left mr-2"></i>Kembali</a>
                <div>
                    <?php if(in_array(Auth::user()->level, ['admin', 'petugas']) && $pengaduan->status != 'selesai'): ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tanggapanModal"><i
                            class="fas fa-reply mr-2"></i>Beri Tanggapan</button>
                    <?php elseif(Auth::user()->level == 'masyarakat' && $pengaduan->status == '0'): ?>
                    <a href="<?php echo e(route('pengaduan.edit', $pengaduan->id)); ?>" class="btn btn-primary"><i
                            class="fas fa-edit mr-2"></i>Edit Pengaduan</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Riwayat Tanggapan</h3>
            </div>
            <div class="card-body">
                <?php if($pengaduan->tanggapan->isEmpty()): ?>
                <div class="alert alert-warning text-center" role="alert"><i class="fas fa-info-circle mr-2"></i>Belum
                    ada tanggapan dari petugas.</div>
                <?php else: ?>
                <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                    <?php $__currentLoopData = $pengaduan->tanggapan->sortBy('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="timeline-block">
                        <span class="timeline-step badge-success"><i class="ni ni-bell-55"></i></span>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between pt-1">
                                <div><span class="text-sm font-weight-bold"><?php echo e($item->user->name); ?> (<?php echo e(ucfirst($item->user->level)); ?>)</span></div>
                                <small class="text-muted"><i class="fas fa-clock mr-1"></i><?php echo e(\Carbon\Carbon::parse($item->response_date)->diffForHumans()); ?></small>
                            </div>
                            <p class="text-sm mt-1 mb-0"><?php echo e($item->response); ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php if(in_array(Auth::user()->level, ['admin', 'petugas'])): ?>
<div class="modal fade" id="tanggapanModal" tabindex="-1" role="dialog" aria-labelledby="tanggapanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tanggapanModalLabel">Formulir Tanggapan & Verifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?php echo e(route('tanggapan.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="pengaduan_id" value="<?php echo e($pengaduan->id); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="response" class="form-control-label">Isi Tanggapan</label>
                        <textarea name="response" id="response"
                            class="form-control <?php $__errorArgs = ['response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4"
                            placeholder="Ketikkan tanggapan Anda untuk pengaduan ini..."
                            required><?php echo e(old('response')); ?></textarea>
                        <?php $__errorArgs = ['response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-control-label">Perbarui Status Pengaduan</label>
                        <select name="status" id="status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>
                            <option value="proses" <?php echo e($pengaduan->status == 'proses' || $pengaduan->status == '0' ?
                                'selected' : ''); ?>>Proses</option>
                            <option value="selesai" <?php echo e($pengaduan->status == 'selesai' ? 'selected' : ''); ?>>Selesai
                            </option>
                        </select>
                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\app_smileperdagangan_laravel8\resources\views/backend/pengaduan/show.blade.php ENDPATH**/ ?>