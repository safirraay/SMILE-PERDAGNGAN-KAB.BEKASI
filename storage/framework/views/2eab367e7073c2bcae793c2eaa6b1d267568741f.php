

<?php $__env->startPush('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('posts.store')); ?>" method="POST" enctype="multipart/form-data" id="post-form">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0"><?php echo e($title); ?></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-control-label">Judul</label>
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
                                placeholder="Ketik judul..." value="<?php echo e(old('title')); ?>" required>
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
                    <div class="form-group">
                        <label for="body" class="form-control-label">Isi Konten</label>
                        
                        <div id="editor-container" style="height: 350px;"><?php echo old('body'); ?></div>
                        <input type="hidden" name="body" id="body-input">
                        <?php $__errorArgs = ['body'];
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
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-cog mr-2"></i>Pengaturan</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="category" class="form-control-label">Kategori</label>
                        <select name="category" id="category"
                            class="form-control select2 <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required
                            data-placeholder="Pilih Kategori">
                            <option></option>
                            <option value="Berita" <?php echo e(old('category')=='Berita' ? 'selected' : ''); ?>>Berita</option>
                            <option value="Pengumuman" <?php echo e(old('category')=='Pengumuman' ? 'selected' : ''); ?>>Pengumuman
                            </option>
                        </select>
                        <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-control-label">Gambar Utama</label>
                        <img src="<?php echo e(asset('assets/backend/img/image-default.png')); ?>" alt="preview"
                            class="img-fluid rounded mb-2" id="image-preview" style="border: 1px solid #ddd;">
                        <div class="custom-file"><input type="file" name="image"
                                class="custom-file-input <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="image" lang="id"
                                accept="image/*"><label class="custom-file-label text-left" for="image">Pilih
                                gambar...</label></div>
                        <small class="form-text text-muted">Ukuran file maksimal 2MB.</small>
                        <?php $__errorArgs = ['image'];
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
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-secondary"><i
                                class="fas fa-arrow-left mr-2"></i>Batal</a>
                        <div>
                            <button type="submit" name="draft" class="btn btn-outline-primary">Simpan sebagai
                                Draft</button>
                            <button type="submit" name="publish" class="btn btn-primary"><i
                                    class="fas fa-paper-plane mr-2"></i>Publish</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2({ theme: 'bootstrap-5' });

    // [UPDATE] Inisialisasi QuillJS
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    // [UPDATE] Hubungkan QuillJS dengan form submission
    var form = document.getElementById('post-form');
    form.onsubmit = function() {
        // Salin konten dari Quill editor ke hidden input sebelum form dikirim
        var bodyInput = document.getElementById('body-input');
        bodyInput.value = quill.root.innerHTML;
    };

    $('#image').on('change', function(event){
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName || 'Pilih gambar...');
        if (event.target.files[0]) {
            var output = document.getElementById('image-preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() { URL.revokeObjectURL(output.src) }
        }
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app-backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\app_smileperdagangan_laravel8\resources\views/backend/posts/create.blade.php ENDPATH**/ ?>