@extends('layouts.app-frontend')

@section('content')
<main class="main">
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Galeri Kegiatan</h1>
                        <p class="mb-0">Dokumentasi kegiatan dan program kerja Dinas Perdagangan Kabupaten Bekasi.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Galeri</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="gallery" class="gallery section">
        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-0">
                {{-- [UPDATE] Loop data dari database --}}
                @foreach ($galleries as $gallery)
                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ Storage::url($gallery->image) }}" class="glightbox" data-gallery="images-gallery"
                            title="{{ $gallery->title }}">
                            <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title }}"
                                class="img-fluid">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection