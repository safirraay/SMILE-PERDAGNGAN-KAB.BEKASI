

<?php $__env->startSection('content'); ?>
<main class="main">
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Galeri Kegiatan</h1>
                        <p class="mb-0">Dokumentasi kegiatan dan program kerja Dinas Perdagangan Kabupaten Bekasi.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li class="current">Galeri</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="gallery" class="gallery section">
        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-0">
                
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="<?php echo e(Storage::url($gallery->image)); ?>" class="glightbox" data-gallery="images-gallery"
                            title="<?php echo e($gallery->title); ?>">
                            <img src="<?php echo e(Storage::url($gallery->image)); ?>" alt="<?php echo e($gallery->title); ?>"
                                class="img-fluid">
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\syafira yudhanti\app_smileperdagangan_laravel8\app_smileperdagangan_laravel8\resources\views/frontend/gallery.blade.php ENDPATH**/ ?>