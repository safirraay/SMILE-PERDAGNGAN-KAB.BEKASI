@extends('layouts.app-frontend')

@section('content')
<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Daftar UPTD Pasar</h1>
                        <p class="mb-0">Unit Pelaksana Teknis Daerah (UPTD) Pengelolaan dan Pembinaan Pasar di
                            Lingkungan Dinas Perdagangan Kabupaten Bekasi.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Daftar UPTD</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="uptd" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-4">Wilayah Kerja UPTD Pasar</h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Wilayah</th>
                                            <th scope="col">Kecamatan yang Dikelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Wilayah I</td>
                                            <td>Tambun Selatan, Tambun Utara, Tambelang</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Wilayah II</td>
                                            <td>Cibitung, Sukatani, Sukakarya</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Wilayah III</td>
                                            <td>Setu, Cikarang Barat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Wilayah IV</td>
                                            <td>Cikarang Pusat, Cikarang Utara, Karangbahagia</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Wilayah V</td>
                                            <td>Cikarang Timur, Kedungwaringin, Pebayuran</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Wilayah VI</td>
                                            <td>Babelan, Sukawangi, Cabangbungin</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Wilayah VII</td>
                                            <td>Tarumajaya, Muaragembong</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">8</th>
                                            <td>Wilayah VIII</td>
                                            <td>Serang Baru, Cikarang Selatan</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">9</th>
                                            <td>Wilayah IX</td>
                                            <td>Cibarusah, Bojongmangu</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection