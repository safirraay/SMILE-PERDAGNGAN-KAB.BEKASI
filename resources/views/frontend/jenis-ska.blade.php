@extends('layouts.app-frontend')

@section('content')
<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Jenis Surat Keterangan Asal (SKA)</h1>
                        <p class="mb-0">Informasi mengenai Surat Keterangan Asal (Certificate of Origin/COO) untuk
                            kegiatan ekspor.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Jenis SKA</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="jenis-ska" class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                    <p class="fst-italic">
                        Surat Keterangan Asal (SKA) atau Certificate of Origin (COO) adalah dokumen resmi yang
                        menyatakan bahwa barang ekspor berasal, dihasilkan, dan/atau diolah di Indonesia. Dokumen ini
                        diperlukan berdasarkan kesepakatan bilateral, regional, multilateral, atau ketentuan sepihak
                        dari negara tujuan ekspor.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="200">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-4">Jenis-Jenis SKA</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">Jenis SKA</th>
                                            <th scope="col">Fungsi dan Tujuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">SKA Preferensi</th>
                                            <td>
                                                <ul class="mb-0">
                                                    <li>Digunakan untuk memperoleh fasilitas preferensi seperti
                                                        pembebasan bea masuk.</li>
                                                    <li>Berlaku untuk ekspor ke negara/kelompok negara yang memiliki
                                                        perjanjian dagang.</li>
                                                    <li>Contoh: FTA, CEPA, dan lainnya.</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">SKA Non Preferensi</th>
                                            <td>
                                                <ul class="mb-0">
                                                    <li>Berfungsi sebagai dokumen pengawasan dan bukti asal barang tanpa
                                                        fasilitas bea masuk.</li>
                                                    <li>Diperlukan untuk ekspor ke negara yang tidak memberikan
                                                        preferensi tarif.</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 justify-content-center">
                <div class="col-lg-10 text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="alert alert-info" role="alert">
                        <p class="mb-3">Untuk pengajuan dan informasi teknis terkait SKA, silakan kunjungi layanan resmi
                            Kementerian Perdagangan melalui portal berikut:</p>
                        <a href="http://e-ska.kemendag.go.id/" class="btn btn-primary" target="_blank"
                            rel="noopener noreferrer">
                            <i class="bi bi-box-arrow-up-right me-2"></i>Kunjungi e-SKA Kemendag
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection