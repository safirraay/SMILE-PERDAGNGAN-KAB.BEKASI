@extends('layouts.app-frontend')

@section('content')
<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Struktur Organisasi</h1>
                        <p class="mb-0">Bagan struktur organisasi resmi Dinas Perdagangan Kabupaten Bekasi.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Struktur Organisasi</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="struktur-organisasi" class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                    <p class="fst-italic text-center">
                        Berikut adalah bagan struktur organisasi Dinas Perdagangan Kabupaten Bekasi.
                    </p>
                    <hr class="w-25 mx-auto">
                </div>
                <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/frontend/img/struktur_organisasi.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
</main>
@endsection