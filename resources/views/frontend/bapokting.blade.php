@extends('layouts.app-frontend')

@section('content')
<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Komoditas Bahan Pokok dan Penting (Bapokting)</h1>
                        <p class="mb-0">Daftar komoditas yang dipantau dan dikelola oleh Dinas Perdagangan Kabupaten
                            Bekasi.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Komoditas Bapokting</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="bapokting" class="section">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title text-center"><i class="bi bi-cart3 me-2"></i>Barang Kebutuhan Pokok
                            </h3>
                            <hr>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Beras</li>
                                <li class="list-group-item">Kedelai</li>
                                <li class="list-group-item">Cabe</li>
                                <li class="list-group-item">Bawang Merah</li>
                                <li class="list-group-item">Gula</li>
                                <li class="list-group-item">Minyak Goreng</li>
                                <li class="list-group-item">Tepung Terigu</li>
                                <li class="list-group-item">Daging Sapi</li>
                                <li class="list-group-item">Daging Ayam Ras</li>
                                <li class="list-group-item">Telur Ayam Ras</li>
                                <li class="list-group-item">Ikan Kembung</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title text-center"><i class="bi bi-tools me-2"></i>Barang Penting</h3>
                            <hr>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Benih (Padi, Jagung, Kedelai)</li>
                                <li class="list-group-item">Pupuk</li>
                                <li class="list-group-item">Gas Elpiji 3 kg</li>
                                <li class="list-group-item">Triplek</li>
                                <li class="list-group-item">Semen</li>
                                <li class="list-group-item">Besi Baja Konstruksi</li>
                                <li class="list-group-item">Baja Ringan</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</main>
@endsection