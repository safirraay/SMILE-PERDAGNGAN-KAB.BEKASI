@extends('layouts.app-frontend')

@section('content')
<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Tera Ulang</h1>
                        <p class="mb-0">Informasi mengenai pengujian ulang alat ukur, takar, timbang, dan
                            perlengkapannya (UTTP).</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Tera Ulang</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="tera-ulang" class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                    <p class="fst-italic">
                        Tera ulang adalah kegiatan pengujian ulang terhadap alat ukur, takar, timbang, dan
                        perlengkapannya (UTTP) yang telah ditera sebelumnya, untuk memastikan keakuratannya dan
                        memberikan jaminan kepada konsumen. Tujuan utama tera ulang adalah untuk melindungi konsumen dan
                        pedagang dengan memastikan bahwa transaksi jual beli yang menggunakan alat ukur tersebut
                        dilakukan secara adil dan tepat.
                    </p>
                </div>
            </div>

            <div class="row gy-4 mt-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <h3>Definisi & Tujuan</h3>
                    <p><strong>Definisi:</strong> Proses pengecekan dan penandaan ulang pada UTTP yang sudah pernah
                        ditera, untuk memastikan kebenaran dan akurasinya.</p>
                    <p><strong>Tujuan:</strong></p>
                    <ul class="no-bullets">
                        <li><i class="bi bi-check-circle-fill text-success"></i> Melindungi konsumen dari kerugian.</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Memberikan kepastian hukum dan
                            keadilan.</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Memastikan alat ukur sesuai standar.
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <h3>Regulasi & Retribusi</h3>
                    <p><strong>Regulasi:</strong> Dilakukan oleh petugas metrologi legal yang berwenang. Alat ukur yang
                        lolos akan diberi tanda tera sah, dan yang tidak akan diberi tanda tera batal.</p>
                    <p><strong>Retribusi:</strong> Pelayanan ini dikenakan retribusi sesuai peraturan daerah, namun
                        beberapa daerah memberikan pembebasan biaya untuk alat ukur tertentu demi kepentingan publik
                        (contoh: timbangan posyandu).</p>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="card shadow-sm border-left-primary">
                        <div class="card-body">
                            <h3 class="text-center mb-4">Pentingnya Tera Ulang dalam Kehidupan Sehari-hari</h3>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="text-center">
                                        <i class="fas fa-gas-pump fa-3x text-primary mb-3"></i>
                                        <h5>SPBU</h5>
                                        <p>Memastikan takaran bahan bakar sesuai dengan jumlah yang dibayar konsumen.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="text-center">
                                        <i class="fas fa-balance-scale fa-3x text-primary mb-3"></i>
                                        <h5>Pasar</h5>
                                        <p>Memastikan berat barang (daging, buah, dll.) sesuai dengan harga yang
                                            dibayarkan.</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="text-center">
                                        <i class="fas fa-baby fa-3x text-primary mb-3"></i>
                                        <h5>Posyandu</h5>
                                        <p>Memastikan data berat badan balita akurat untuk pemantauan gizi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>
@endsection

@push('css')
<style>
    .border-left-primary {
        border-left: 5px solid var(--accent-color);
    }

    .no-bullets {
        list-style-type: none;
    }
</style>
@endpush