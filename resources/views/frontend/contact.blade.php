@extends('layouts.app-frontend')

@section('content')
<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Kontak Kami</h1>
                        <p class="mb-0">Hubungi kami melalui alamat, telepon, email, atau formulir kontak di bawah ini.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Kontak</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="contact" class="contact section">
        <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
            <iframe style="border:0; width: 100%; height: 270px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9778.81048110899!2d107.17422!3d-6.365584!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699b000af74a6f%3A0xc2b1fb82cbe4bc52!2sDinas%20Perdagangan%20Kabupaten%20Bekasi!5e1!3m2!1sen!2sid!4v1758272922594!5m2!1sen!2sid"
                frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Alamat</h3>
                            <p>Komplek Perkantoran Pemda Kabupaten Bekasi, Blok B1 Lantai 1, Cikarang Pusat, Jawa Barat
                                17530</p>
                        </div>
                    </div>
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Telepon</h3>
                            <p>(021) 123 4567</p>
                        </div>
                    </div>
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email</h3>
                            <p>disdagin@bekasikab.go.id</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <form action="#" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">
                            <div class="col-md-6"><input type="text" name="name" class="form-control"
                                    placeholder="Nama Anda" required=""></div>
                            <div class="col-md-6 "><input type="email" class="form-control" name="email"
                                    placeholder="Email Anda" required=""></div>
                            <div class="col-md-12"><input type="text" class="form-control" name="subject"
                                    placeholder="Subjek" required=""></div>
                            <div class="col-md-12"><textarea class="form-control" name="message" rows="6"
                                    placeholder="Pesan" required=""></textarea></div>
                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>
                                <button type="submit">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection