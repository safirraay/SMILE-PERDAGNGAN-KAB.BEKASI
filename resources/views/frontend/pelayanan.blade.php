@extends('layouts.app-frontend')

@section('content')
<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Alur Pelayanan Pengaduan</h1>
                        <p class="mb-0">Ikuti langkah-langkah mudah berikut untuk menyampaikan pengaduan Anda kepada
                            kami.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Pelayanan Pengaduan</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="pelayanan" class="section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    {{-- [UPDATE] Menggunakan desain timeline vertikal --}}
                    <div class="timeline">
                        <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="timeline-icon">1</div>
                            <div class="timeline-content card shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-user-plus me-2"></i>Daftar Akun</h4>
                                    <p>Langkah pertama adalah membuat akun baru. Klik tombol "Daftar" dan isi formulir
                                        dengan data diri yang valid untuk memulai proses pengaduan.</p>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="timeline-icon">2</div>
                            <div class="timeline-content card shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-sign-in-alt me-2"></i>Login ke Akun</h4>
                                    <p>Setelah akun berhasil dibuat, masuk ke sistem menggunakan username dan password
                                        yang telah Anda daftarkan sebelumnya.</p>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="timeline-icon">3</div>
                            <div class="timeline-content card shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-pencil-alt me-2"></i>Buat & Kirim Pengaduan
                                    </h4>
                                    <p>Di halaman dashboard Anda, temukan tombol "Buat Pengaduan". Tulis laporan Anda
                                        secara jelas dan lengkap, lalu kirimkan.</p>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="timeline-icon">4</div>
                            <div class="timeline-content card shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-hourglass-half me-2"></i>Tunggu Proses &
                                        Tanggapan</h4>
                                    <p>Pengaduan Anda akan diverifikasi dan ditindaklanjuti oleh petugas kami. Anda
                                        dapat memantau statusnya melalui dashboard hingga laporan dinyatakan selesai.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="500">
                    <h4>Siap Memulai?</h4>
                    <p>Daftar sekarang atau masuk jika Anda sudah memiliki akun.</p>
                    <a href="{{ route('register.index') }}" class="btn btn-primary btn-lg"><i
                            class="bi bi-person-plus me-2"></i>Buat Akun Sekarang</a>
                    <a href="{{ route('auth.index') }}" class="btn btn-outline-secondary btn-lg"><i
                            class="bi bi-box-arrow-in-right me-2"></i>Login</a>
                </div>
            </div>

        </div>
    </section>
</main>
@endsection

@push('css')
<style>
    .timeline {
        position: relative;
        padding: 20px 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        bottom: 0;
        width: 4px;
        background: #e9ecef;
        border-radius: 2px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 30px;
        padding-left: 60px;
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-icon {
        position: absolute;
        left: 0;
        top: 0;
        width: 44px;
        height: 44px;
        background: var(--accent-color);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.2rem;
        border: 4px solid #f8f9fa;
    }

    .timeline-content {
        background: #fff;
        border-radius: 0.5rem;
        border: 1px solid #dee2e6;
    }

    .timeline-content .card-title {
        color: var(--heading-color);
    }
</style>
@endpush