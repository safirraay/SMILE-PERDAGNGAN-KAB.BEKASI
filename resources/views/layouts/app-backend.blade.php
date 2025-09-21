<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Dashboard' }} | {{ config('app.name') }}</title>
    <link href="{{ asset('assets/frontend/img/favicon.png') }}" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ asset('assets/backend/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    @stack('css')
</head>

<body class="">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand pt-0 text-center" href="{{ route('dashboard.index') }}">
                <img src="{{ asset('assets/frontend/img/favicon.png') }}" class="navbar-brand-img mr-2">
                <h2>Smile Perdagangan</h2>
            </a>
            <ul class="nav align-items-center d-md-none">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img
                                    src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('assets/backend/img/avatars/user-default.png') }}">
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Selamat Datang!</h6>
                        </div>
                        <a href="{{ route('profile.show') }}" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>Profil Saya</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form-mobile" action="{{ route('auth.logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand text-center">
                            <a href="{{ route('dashboard.index') }}">
                                <img src="{{ asset('assets/frontend/img/favicon.png') }}" class="navbar-brand-img mr-2">
                                <h2>Smile Perdagangan</h2>
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                            href="{{ route('dashboard.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i> Dashboard
                        </a>
                    </li>

                    @if(in_array(Auth::user()->level, ['admin', 'petugas']))
                    <li class="nav-item {{ request()->routeIs('pengaduan.index', 'pengaduan.show') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->routeIs('pengaduan.index', 'pengaduan.show') ? 'active' : '' }}"
                            href="{{ route('pengaduan.index') }}">
                            <i class="ni ni-bullet-list-67 text-info"></i> Data Pengaduan
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->level == 'masyarakat')
                    <li class="nav-item {{ request()->routeIs('pengaduan.*') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->routeIs('pengaduan.*') ? 'active' : '' }}"
                            href="{{ route('pengaduan.create') }}">
                            <i class="ni ni-send text-primary"></i> Buat Pengaduan
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('pengaduan.*') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->routeIs('pengaduan.*') ? 'active' : '' }}"
                            href="{{ route('pengaduan.index') }}">
                            <i class="ni ni-archive-2 text-warning"></i> Riwayat Pengaduan
                        </a>
                    </li>
                    @endif
                </ul>

                @if(Auth::user()->level == 'admin')
                <hr class="my-3">
                <h6 class="navbar-heading text-muted">Manajemen Data</h6>
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                            href="{{ route('users.index') }}">
                            <i class="ni ni-circle-08 text-pink"></i> Manajemen User
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('gallery.*') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}"
                            href="{{ route('gallery.index') }}">
                            <i class="ni ni-image text-success"></i> Manajemen Galeri
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('posts.*') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}"
                            href="{{ route('posts.index') }}">
                            <i class="ni ni-single-copy-04 text-warning"></i> Manajemen Berita
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}"
                            href="{{ route('laporan.index') }}">
                            <i class="ni ni-books text-purple"></i> Laporan
                        </a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </nav>
    <div class="main-content">
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                    href="{{ route('dashboard.index') }}">{{ $title ?? 'Halaman' }}</a>
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img
                                        src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('assets/backend/img/avatars/user-default.png') }}">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Selamat Datang!</h6>
                            </div>
                            <a href="{{ route('profile.show') }}" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>Profil Saya</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0)" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                    @yield('header')
                </div>
            </div>
        </div>

        <div class="container-fluid mt--7">
            @yield('content')

            <footer class="footer">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            &copy; {{ date('Y') }} <a href="#" class="font-weight-bold ml-1" target="_blank">{{
                                config('app.name') }}</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                            <li class="nav-item">
                                <a href="#" class="nav-link" target="_blank">Tim Kreatif</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" target="_blank">Tentang Kami</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/backend/js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script src="{{ asset('assets/backend/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/backend/js/argon-dashboard.min.js?v=1.1.2') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>

    <script>
        // Setup CSRF Token untuk semua request AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Tampilkan notifikasi iziToast jika ada session
        @if (session('success'))
            iziToast.success({
                title: 'Berhasil!',
                message: '{{ session('success') }}',
                position: 'topRight'
            });
        @endif
        @if (session('error'))
            iziToast.error({
                title: 'Gagal!',
                message: '{{ session('error') }}',
                position: 'topRight'
            });
        @endif
    </script>
    @stack('js')
</body>

</html>