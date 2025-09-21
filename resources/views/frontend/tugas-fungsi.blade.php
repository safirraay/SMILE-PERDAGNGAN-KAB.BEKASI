@extends('layouts.app-frontend')

@section('content')
<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Tugas & Fungsi</h1>
                        <p class="mb-0">Berdasarkan Peraturan Bupati Kabupaten Bekasi Nomor 18 Tahun 2023</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Tugas & Fungsi</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="tugas-fungsi" class="about section">
        <div class="container">

            <div class="row gy-4 gx-5 justify-content-center">
                <div class="col-lg-10 content text-center" data-aos="fade-up" data-aos-delay="100">
                    <h3>Tugas Pokok</h3>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <p class="fst-italic fs-5 mb-0">
                                Dinas Perdagangan Kabupaten Bekasi mempunyai tugas melaksanakan urusan pemerintahan
                                daerah di bidang perdagangan yang menjadi kewenangan daerah dan tugas pembantuan yang
                                diberikan oleh Pemerintah Pusat dan/atau Pemerintah Provinsi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-4 gx-5 mt-5">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3 class="text-center">Fungsi</h3>
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fa-solid fa-check-double fa-fw text-primary me-3 mt-1"></i>
                                    <p>Perumusan kebijakan teknis di bidang perdagangan.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fa-solid fa-check-double fa-fw text-primary me-3 mt-1"></i>
                                    <p>Pelaksanaan kebijakan di bidang perdagangan, termasuk pengawasan distribusi
                                        barang dan perlindungan konsumen.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fa-solid fa-check-double fa-fw text-primary me-3 mt-1"></i>
                                    <p>Pelaksanaan evaluasi dan pelaporan atas pelaksanaan urusan perdagangan.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fa-solid fa-check-double fa-fw text-primary me-3 mt-1"></i>
                                    <p>Pelaksanaan administrasi dinas, termasuk pengelolaan keuangan, kepegawaian, dan
                                        aset.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fa-solid fa-check-double fa-fw text-primary me-3 mt-1"></i>
                                    <p>Pelaksanaan koordinasi lintas sektor dengan instansi pemerintah, swasta, dan
                                        masyarakat dalam rangka pengembangan perdagangan daerah.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="fa-solid fa-check-double fa-fw text-primary me-3 mt-1"></i>
                                    <p>Pelaksanaan tugas lain yang diberikan oleh Bupati sesuai dengan ketentuan
                                        peraturan perundang-undangan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- [UPDATE] Menambahkan tombol redirect --}}
            <div class="row mt-5">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="alert alert-light" role="alert">
                        <small class="text-muted d-block mb-3">Informasi ini disusun berdasarkan dokumen resmi yang
                            dapat diakses melalui tautan berikut:</small>
                        <a href="https://peraturan.bpk.go.id/Details/256535/perbup-kab-bekasi-no-18-tahun-2023"
                            class="btn btn-primary" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-box-arrow-up-right me-2"></i>Lihat Perbup No. 18 Tahun 2023
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection