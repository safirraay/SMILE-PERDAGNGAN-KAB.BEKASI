@extends('layouts.app-frontend')

@section('content')
<main class="main">

    <section id="hero" class="hero section light-background">

        <img src="{{ asset('assets/frontend/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

        <div class="container position-relative">

            <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                <h2>Selamat Datang di Layanan Pengaduan</h2>
                <p>Dinas Perdagangan Kabupaten Bekasi</p>
            </div>
            <div class="content row gy-4">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
                        <h3>Punya Keluhan atau Laporan?</h3>
                        <p>Sampaikan pengaduan Anda terkait isu perdagangan melalui tombol di bawah ini. Laporan Anda
                            akan kami proses secara transparan.</p>
                        <div class="text-center">
                            <a href="{{ route('register.index') }}" class="more-btn">
                                <span>Buat Pengaduan</span> <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="row gy-4">
                            <div class="col-xl-3 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                                    <i class="bi bi-pencil-square"></i>
                                    <h4>1. Tulis Pengaduan</h4>
                                </div>
                            </div>
                            <div class="col-xl-3 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                                    <i class="bi bi-check2-square"></i>
                                    <h4>2. Proses Verifikasi</h4>
                                </div>
                            </div>
                            <div class="col-xl-3 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                                    <i class="bi bi-chat-square-dots"></i>
                                    <h4>3. Tindak Lanjut</h4>
                                </div>
                            </div>
                            <div class="col-xl-3 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="600">
                                    <i class="bi bi-flag"></i>
                                    <h4>4. Selesai</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about section">
        <div class="container">
            <div class="row gy-4 gx-5">
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/frontend/img/about.jpg') }}" class="img-fluid" alt="">
                    <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
                </div>
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <h3>Tentang Kami</h3>
                    <p>
                        Dinas Perdagangan Kabupaten Bekasi merupakan unsur pelaksana urusan pemerintahan di bidang
                        perdagangan yang menjadi kewenangan daerah. Kami berkomitmen untuk mewujudkan sistem perdagangan
                        yang adil, berdaya saing, dan melindungi kepentingan konsumen.
                    </p>
                    <ul>
                        <li>
                            <i class="fa-solid fa-store"></i>
                            <div>
                                <h5>Pembinaan Pasar Rakyat</h5>
                                <p>Meningkatkan kualitas pengelolaan dan infrastruktur pasar tradisional di seluruh
                                    Kabupaten Bekasi.</p>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-shield-halved"></i>
                            <div>
                                <h5>Perlindungan Konsumen</h5>
                                <p>Melakukan pengawasan barang beredar dan jasa untuk memastikan hak-hak konsumen
                                    terpenuhi.</p>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-chart-line"></i>
                            <div>
                                <h5>Pengembangan Ekspor</h5>
                                <p>Mendorong dan memfasilitasi para pelaku usaha lokal untuk menembus pasar
                                    internasional.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="stats" class="stats section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-journal-text"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $totalPengaduan }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Total Pengaduan</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-hourglass-split"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $pengaduanDiproses }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Pengaduan Diproses</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-check-circle"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $pengaduanSelesai }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Pengaduan Selesai</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
           {-- <h2>Pelayanan Kami</h2>
            <p>Kami menyediakan berbagai layanan publik untuk mendukung kegiatan perdagangan di Kabupaten Bekasi.</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="fas fa-file-signature"></i></div>
                        <a href="#" class="stretched-link">
                            <h3>Perizinan & Pendaftaran</h3>
                        </a>
                        <p>Layanan pengurusan Surat Izin Usaha Perdagangan (SIUP) dan Tanda Daftar Perusahaan (TDP).</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="fas fa-balance-scale"></i></div>
                        <a href="#" class="stretched-link">
                            <h3>Tera & Tera Ulang</h3>
                        </a>
                        <p>Pelayanan untuk memastikan keakuratan alat-alat Ukur, Takar, Timbang, dan Perlengkapannya
                            (UTTP).</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="fas fa-bullhorn"></i></div>
                        <a href="{{ route('auth.index') }}" class="stretched-link">
                            <h3>Pengaduan Masyarakat</h3>
                        </a>
                        <p>Saluran resmi untuk melaporkan pelanggaran di bidang perdagangan dan perlindungan konsumen.
                        </p>
                    </div>
                </div>
            </div>
        </div>--}        git add LICENSE        git add LICENSE
    </section>

    <section id="location-map" class="contact section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Lokasi Kami</h2>
        </div>
        <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
            <iframe style="border:0; width: 100%; height: 270px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9778.81048110899!2d107.17422!3d-6.365584!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699b000af74a6f%3A0xc2b1fb82cbe4bc52!2sDinas%20Perdagangan%20Kabupaten%20Bekasi!5e1!3m2!1sen!2sid!4v1758272922594!5m2!1sen!2sid"
                frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</main>
@endsection