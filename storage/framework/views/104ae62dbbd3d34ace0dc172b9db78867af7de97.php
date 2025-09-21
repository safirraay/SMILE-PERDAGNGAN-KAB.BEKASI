

<?php $__env->startSection('content'); ?>
<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Berita & Pengumuman</h1>
                        <p class="mb-0">Informasi terkini seputar kegiatan, kebijakan, dan pengumuman resmi dari Dinas
                            Perdagangan Kabupaten Bekasi.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li class="current">Berita & Pengumuman</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="berita-pengumuman" class="section">
        <div class="container">
            
            <div class="row gy-4">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo e(($loop->index % 3 + 1) * 100); ?>">
                    <div class="card h-100">
                        <img src="<?php echo e($post->image ? Storage::url($post->image) : asset('assets/backend/img/image-default.png')); ?>"
                            class="card-img-top" alt="<?php echo e($post->title); ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><a href="#"><?php echo e(Str::limit($post->title, 50)); ?></a></h5>
                            <p class="card-text"><?php echo e(Str::limit(strip_tags($post->body), 100)); ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><i class="bi bi-calendar-event me-2"></i><?php echo e($post->published_at->isoFormat('D MMMM Y')); ?></small>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="row mt-5" data-aos="fade-up">
                <div class="col-12 d-flex justify-content-center">
                    <?php echo e($posts->links()); ?>

                </div>
            </div>
        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    .card-title a {
        color: var(--heading-color);
        transition: color .3s;
    }

    .card-title a:hover {
        color: var(--accent-color);
    }

    .card-footer {
        background-color: #f8f9fa;
        border-top: 1px solid #dee2e6;
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app-frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\app_smileperdagangan_laravel8\resources\views/frontend/berita-pengumuman.blade.php ENDPATH**/ ?>