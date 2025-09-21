@extends('layouts.app-frontend')

@section('content')
<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Visi & Misi</h1>
                        <p class="mb-0">Arah dan tujuan strategis Dinas Perdagangan dalam mewujudkan Kabupaten Bekasi
                            BERSINAR.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Visi & Misi</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="visi-misi" class="about section">
        <div class="container">

            <div class="row gy-4 gx-5">
                <div class="col-lg-12 content" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-center">Visi</h3>
                    <p class="fst-italic text-center fs-5">
                        "Terwujudnya Kabupaten Bekasi BERSINAR (Berdaya Saing, Sejahtera, Indah, dan Ramah Lingkungan)"
                    </p>
                    <hr>
                    <h4>Makna Visi:</h4>
                    <ul>
                        <li>
                            <i class="fa-solid fa-rocket"></i>
                            <div>
                                <h5>Berdaya Saing</h5>
                                <p>Kondisi daerah dan masyarakat Kabupaten Bekasi yang memiliki keunggulan komparatif,
                                    baik sebagai pusat pertumbuhan ekonomi baru maupun kualitas SDM yang mampu menjawab
                                    tantangan regional maupun global.</p>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-hands-holding-child"></i>
                            <div>
                                <h5>Sejahtera</h5>
                                <p>Kondisi Kabupaten Bekasi yang menjamin kemakmuran, kesehatan, dan keamanan warganya,
                                    serta terpenuhinya kebutuhan dasar masyarakat untuk berkarya dan mengaktualisasi
                                    diri.</p>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-city"></i>
                            <div>
                                <h5>Indah</h5>
                                <p>Lingkungan dan tata kota yang nyaman, tertata, dan indah sebagai citra daerah maju
                                    dan modern.</p>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-leaf"></i>
                            <div>
                                <h5>Ramah Lingkungan</h5>
                                <p>Pembangunan dilaksanakan dengan memperhatikan kelestarian lingkungan dan prinsip
                                    keberlanjutan, sehingga daya dukung lingkungan terjaga bagi generasi mendatang.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row gy-4 gx-5 mt-5">
                <div class="col-lg-12 content" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-center">Misi</h3>
                    <hr>
                    <ol>
                        <li class="mb-3">Meningkatkan Kualitas Pendidikan dan Keterampilan SDM.</li>
                        <li class="mb-3">Mendorong Pertumbuhan Ekonomi Berkelanjutan.</li>
                        <li class="mb-3">Mewujudkan Kesejahteraan Sosial.</li>
                        <li class="mb-3">Menata Lingkungan dan Tata Kota yang Nyaman dan Indah.</li>
                        <li class="mb-3">Melaksanakan Pembangunan Ramah Lingkungan dan Berkelanjutan.</li>
                        <li class="mb-3">Meningkatkan Keterlibatan Masyarakat dalam Pembangunan.</li>
                        <li class="mb-3">Memperkuat Infrastruktur dan Aksesibilitas Antar Wilayah.</li>
                        <li class="mb-3">Mengembangkan Potensi Pariwisata dan Budaya Lokal.</li>
                    </ol>
                </div>
            </div>

        </div>
    </section>
</main>
@endsection