<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ config('app.name') }} - {{ $title }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link href="{{ asset('assets/frontend/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/frontend/img/favicon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/main.css') }}" rel="stylesheet">

    @stack('css')

</head>

<body class="index-page">
    <header id="header" class="header sticky-top">
        <div class="branding d-flex align-items-center">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
                    <h1 class="sitename">Disdagin Kab. Bekasi</h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home<br></a>
                        </li>
                        <li class="dropdown">
                            <a href="#">
                                <span>Profil Dinas</span>
                                <i class="bi bi-chevron-down toggle-dropdown"></i>
                            </a>
                            <ul>
                                <li><a href="{{ route('profil.visi-misi') }}">Visi & Misi</a></li>
                                <li><a href="{{ route('profil.ruang-lingkup') }}">Ruang Lingkup</a></li>
                                <li><a href="{{ route('profil.unit-kerja') }}">Unit Kerja</a></li>
                                <li><a href="{{ route('profil.struktur-organisasi') }}">Struktur Organisasi</a></li>
                                <li><a href="{{ route('profil.tugas-fungsi') }}">Tugas & Fungsi</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#">
                                <span>Informasi</span>
                                <i class="bi bi-chevron-down toggle-dropdown"></i>
                            </a>
                            <ul>
                                <li><a href="{{ route('informasi.regulasi-kebijakan') }}">Regulasi & Kebijakan</a></li>
                                <li><a href="{{ route('informasi.berita-pengumuman') }}">Berita & Pengumuman</a></li>
                                <li><a href="{{ route('informasi.bapokting') }}">Komoditas Bapokting</a></li>
                                <li><a href="{{ route('informasi.daftar-uptd') }}">Daftar UPTD</a></li>
                                <li><a href="{{ route('informasi.jenis-ska') }}">Jenis SKA</a></li>
                                <li><a href="{{ route('informasi.tera-ulang') }}">Tera Ulang</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('pelayanan') }}"
                                class="{{ request()->routeIs('pelayanan') ? 'active' : '' }}">Pelayanan</a></li>
                        <li>
                            <a href="{{ route('gallery') }}"
                                class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Galeri</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"
                                class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
                        </li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                @auth
                <a href="{{ route('dashboard.index') }}" class="cta-btn d-none d-sm-block">Dashboard</a>
                @else
                <a class="cta-btn d-none d-sm-block" href="{{ route('auth.index') }}">Login</a>
                @endauth

            </div>

        </div>

    </header>

    @yield('content')

    <footer id="footer" class="footer light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                        <span class="sitename">Dinas Perdagangan Kabupaten Bekasi</span>
                    </a>
                    <p>Website resmi Dinas Perdagangan Kabupaten Bekasi. Media informasi, publikasi, dan pelayanan
                        publik.</p>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Link Terkait</h4>
                    <ul>
                        <li><a href="#">Kabupaten Bekasi</a></li>
                        <li><a href="#">LPSE</a></li>
                        <li><a href="#">Pusat Informasi</a></li>
                    </ul>
                </div>

                <div class="col-lg-5 col-md-12 footer-contact text-center text-md-start">
                    <h4>Hubungi Kami</h4>
                    <p>Komplek Perkantoran Pemda Kabupaten Bekasi,</p>
                    <p>Blok B1 Lantai 1, Cikarang Pusat</p>
                    <p>Jawa Barat 17530</p>
                    <p class="mt-3"><strong>Telepon:</strong> <span>(021) 123 4567</span></p>
                    <p><strong>Email:</strong> <span>info@example.com</span></p>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span>
                <strong class="px-1 sitename">{{ config('app.name') }}</strong>
                <span>All Rights Reserved</span>
            </p>
        </div>

    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

    @stack('js')

</body>

</html>