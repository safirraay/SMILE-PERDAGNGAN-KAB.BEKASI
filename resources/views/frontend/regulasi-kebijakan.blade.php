@extends('layouts.app-frontend')

@section('content')
<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Regulasi dan Kebijakan</h1>
                        <p class="mb-0">Dasar hukum dan kebijakan operasional Dinas Perdagangan Kabupaten Bekasi.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Regulasi dan Kebijakan</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="regulasi-kebijakan" class="section">
        <div class="container">
            <div class="row gy-4">

                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="card-title">Peraturan Bupati No. 18 Tahun 2023</h4>
                            <p class="card-text">Tentang Kedudukan, Susunan Organisasi, Tugas Pokok dan Fungsi serta
                                Tata Kerja UPTD Pengelolaan dan Pembinaan Pasar Pada Dinas Perdagangan Kabupaten Bekasi.
                            </p>
                            <a href="https://peraturan.bpk.go.id/Details/256535/perbup-kab-bekasi-no-18-tahun-2023"
                                class="btn btn-outline-primary">
                                <i class="bi bi-search me-2"></i>Telusuri Peraturan
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="card-title">Peraturan Menteri Perdagangan Nomor 17 Tahun 2024</h4>
                            <p class="card-text">Regulasi teknis terkait pengelolaan pasar, distribusi barang, dan
                                perlindungan konsumen.</p>
                            <a href="https://peraturan.bpk.go.id/Details/294666/permendag-no-17-tahun-2024"
                                class="btn btn-outline-primary">
                                <i class="bi bi-search me-2"></i>Telusuri Peraturan
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="card-title">Peraturan Presiden No. 59 Tahun 2020</h4>
                            <p class="card-text">Perubahan atas Peraturan Presiden No. 71 Tahun 2015 tentang Penetapan
                                dan Penyimpanan Barang Kebutuhan Pokok dan Barang Penting. Regulasi ini menjadi dasar
                                hukum dalam pengelolaan dan perlindungan distribusi komoditas Bapokting di daerah.</p>
                            <a href="https://peraturan.bpk.go.id/Details/136174/perpres-no-59-tahun-2020"
                                class="btn btn-outline-primary">
                                <i class="bi bi-search me-2"></i>Telusuri Peraturan
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection