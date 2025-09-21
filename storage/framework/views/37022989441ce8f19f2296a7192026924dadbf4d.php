<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title ?? 'Authentication'); ?> | <?php echo e(config('app.name')); ?></title>
    <link href="<?php echo e(asset('assets/frontend/img/favicon.png')); ?>" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="<?php echo e(asset('assets/backend/js/plugins/nucleo/css/nucleo.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/backend/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')); ?>"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link href="<?php echo e(asset('assets/backend/css/argon-dashboard.css?v=1.1.2')); ?>" rel="stylesheet" />
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body class="bg-default">
    <div class="main-content">
        <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
            <div class="container px-4">
                <a class="navbar-brand d-flex align-middle" href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e(asset('assets/frontend/img/favicon.png')); ?>" class="mr-2">
                    <span style="font-size: 22px">Smile Perdagangan</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-collapse-main">
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="<?php echo e(url('/')); ?>">
                                    <img src="<?php echo e(asset('assets/backend/img/brand/blue.png')); ?>">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbar-collapse-main" aria-controls="sidenav-main"
                                    aria-expanded="false" aria-label="Toggle sidenav">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="<?php echo e(url('/')); ?>">
                                <i class="ni ni-planet"></i>
                                <span class="nav-link-inner--text">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon <?php echo e(request()->routeIs('register.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('register.index')); ?>">
                                <i class="ni ni-circle-08"></i>
                                <span class="nav-link-inner--text">Register</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon <?php echo e(request()->routeIs('auth.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('auth.index')); ?>">
                                <i class="ni ni-key-25"></i>
                                <span class="nav-link-inner--text">Login</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header bg-gradient-primary py-7 py-lg-8">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <h1 class="text-white">Selamat Datang!</h1>
                            <p class="text-lead text-light">Sistem Informasi Pengaduan Masyarakat Online Terpadu</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <?php echo $__env->yieldContent('content'); ?>

        <footer class="py-5">
            <div class="container">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-12">
                        <div class="copyright text-center text-xl-center text-muted">
                            &copy; <?php echo e(date('Y')); ?> <a href="#" class="font-weight-bold ml-1" target="_blank">Dinas
                                Perdagangan Kabupaten Bekasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="<?php echo e(asset('assets/backend/js/plugins/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script src="<?php echo e(asset('assets/backend/js/argon-dashboard.min.js?v=1.1.2')); ?>"></script>

    <script>
        // Menampilkan notifikasi iziToast
    <?php if(session('success')): ?>
        iziToast.success({
            title: 'Berhasil!',
            message: '<?php echo e(session('success')); ?>',
            position: 'topRight'
        });
    <?php endif; ?>

    <?php if(session('error')): ?>
        iziToast.error({
            title: 'Gagal!',
            message: '<?php echo e(session('error')); ?>',
            position: 'topRight'
        });
    <?php endif; ?>
    </script>
    <?php echo $__env->yieldPushContent('js'); ?>

</body>

</html><?php /**PATH D:\laragon\www\app_smileperdagangan_laravel8\resources\views/layouts/app-auth.blade.php ENDPATH**/ ?>