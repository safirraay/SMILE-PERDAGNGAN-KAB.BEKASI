@extends('layouts.app-frontend')

@section('content')
<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Unit Kerja</h1>
                        <p class="mb-0">Struktur organisasi dan pembagian tugas di lingkungan Dinas Perdagangan
                            Kabupaten Bekasi.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Unit Kerja</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="unit-kerja" class="services section">
        <div class="container">

            <div class="row gy-4">
                <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                    <p class="fst-italic text-center">
                        Dinas Perdagangan Kabupaten Bekasi dipimpin oleh seorang Kepala Dinas dan dibantu oleh
                        Sekretariat, sejumlah Bidang Teknis, serta UPTD Pasar yang melaksanakan tugas pokok dan
                        fungsinya masing-masing.
                    </p>
                </div>
            </div>

            <div class="row gy-4 justify-content-center mt-4">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="fas fa-user-tie"></i></div>
                        <h3 class="stretched-link">Kepala Dinas</h3>
                        <p>Memimpin, mengarahkan, dan mengoordinasikan seluruh pelaksanaan tugas Dinas Perdagangan
                            Kabupaten Bekasi serta bertanggung jawab kepada Bupati melalui Sekretaris Daerah.</p>
                    </div>
                </div>

            </div>

            <div class="row gy-4 mt-4">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-building me-2"></i>Sekretariat</h4>
                            <ul class="list-unstyled">
                                <li class="d-flex mb-2"><i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                    <div><strong>Sub Bagian Umum & Kepegawaian</strong><br>Mengelola administrasi
                                        perkantoran, kepegawaian, dan tata usaha.</div>
                                </li>
                                <li class="d-flex mb-2"><i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                    <div><strong>Sub Bagian Keuangan</strong><br>Menyusun dan mengelola anggaran,
                                        laporan keuangan, serta pengendalian pembiayaan.</div>
                                </li>
                                <li class="d-flex"><i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                    <div><strong>Sub Bagian Perencanaan & Pelaporan</strong><br>Menyusun rencana kerja,
                                        program, evaluasi, dan pelaporan kinerja dinas.</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-cogs me-2"></i>Bidang Teknis</h4>
                            <ul class="list-unstyled">
                                <li class="d-flex mb-2"><i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                    <div><strong>Bidang PPLNK</strong><br>Pengawasan Perdagangan Luar Negeri & Dalam
                                        Negeri.</div>
                                </li>
                                <li class="d-flex mb-2"><i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                    <div><strong>Bidang SARKUDIS</strong><br>Sarana Perdagangan & Distribusi.</div>
                                </li>
                                <li class="d-flex mb-2"><i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                    <div><strong>Bidang BAPOKTING</strong><br>Barang Pokok & Penting.</div>
                                </li>
                                <li class="d-flex"><i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                    <div><strong>Bidang METROLOGI</strong><br>Pelayanan tera/tera ulang dan pengawasan
                                        alat ukur.</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mt-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-store-alt me-2"></i>Unit Pelaksana Teknis Daerah
                                (UPTD) Pasar</h4>
                            <ul class="list-unstyled">
                                <li class="d-flex mb-2"><i
                                        class="fas fa-check-circle text-success me-2 mt-1"></i>Mengelola dan mengawasi
                                    operasional pasar rakyat milik daerah.</li>
                                <li class="d-flex mb-2"><i
                                        class="fas fa-check-circle text-success me-2 mt-1"></i>Melakukan pembinaan
                                    pedagang pasar agar tertib, bersih, dan sesuai aturan.</li>
                                <li class="d-flex"><i class="fas fa-check-circle text-success me-2 mt-1"></i>Memelihara
                                    fasilitas dan sarana pendukung di lingkungan pasar.</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</main>
@endsection