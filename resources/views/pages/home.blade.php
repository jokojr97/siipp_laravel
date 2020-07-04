@extends ('layouts/main')

@section('title', 'Home - ')
@section('metadeskription', 'Aplikasi Keterbukaan Data dan Informasi Seluruh Proses Pengadaan Barang dan Jasa di Lingkungan Pemerintah Kabupaten Bojonegoro.')
@section('metakeywords', 'siipp, open data kontrak, bojonegoro, bos, bojonegoro open system')
@section('thumbnail', 'thubnail.png')

@section('container')
<section id="hero-area" >
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="block wow fadeInUp" data-wow-delay=".3s">
                <!-- Slider -->
                    <section class="cd-intro">
                        <div class="headerex wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" style="color:black" ><strong>
                            <span>BOJONEGORO OPEN SYSTEM (<span class="cd-words-wrapper" style="color:#0f6926">BOS</span>)</span></strong>
                        </div><br>
                    </section> <!-- cd-intro -->
                    <!-- /.slider -->
                    <div class="wow example fadeInUp animated" data-wow-delay=".6s" style=";color:black">Aplikasi Keterbukaan Data dan Informasi Seluruh Proses Pengadaan Barang dan Jasa di Lingkungan Pemerintah Kabupaten Bojonegoro. Melalui Aplikasi ini, Warga Dapat Mengakses Data ataupun Dokumen Pengadaan, Serta Bisa Menyampaikan Aspirasi dan Pengaduan Pada Setiap Tahapan Kegiatan/Proyek Pengadaan  di Daerah.
                    Aplikasi Bojonegoro Open System (BOS) Bisa Diakses Melaui Smartphone atau Komputer yang Terkoneksi Dengan Internet.
                    </div><br>
                    <a href="/Assets/proyek/" class="btn btn-default">Data Proyek</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#main-slider-->

<section id="works" class="works">
    <div class="container">
        <div class="section-heading">
            <h1 class="title wow fadeInDown" data-wow-delay=".3s">Publikasi</h1>
            <p class="wow fadeInDown" data-wow-delay=".5s">
                Berisi informasi terkait publikasi tulisan seperti factsheet, policy brief, dll.
            </p>
        </div>
        <div class="row">
            <div class="col-sm-4 col-xs-6">
                <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
                    <div class="img-wrapper">
                        <img src="/Assets/images/portfolio/01.png" class="img-responsive" alt="this is a title" >
                        <div class="overlay">
                            <div class="buttons">
                                <a rel="gallery" class="fancybox" href="/Assets/images/portfolio/1.png">Demo</a>
                            </div>
                        </div>
                    </div>
                    <figcaption>
                    <h4>
                    <a href="#">
                        Poster: Bojonegoro Open System
                    </a>
                    </h4>
                    <p>
                        Aplikasi Keterbukaan Pengadaan Publik
                    </p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-sm-4 col-xs-6">
                <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                    <div class="img-wrapper">
                        <img src="/Assets/images/portfolio/02.png" class="img-responsive" alt="this is a title" >
                        <div class="overlay">
                            <div class="buttons">
                                <a rel="gallery" class="fancybox" href="/Assets/images/portfolio/2.png">Demo</a>
                            </div>
                        </div>
                    </div>
                    <figcaption>
                    <h4>
                    <a href="#">
                        Poster: Mengawal Pengadaan Publik
                    </a>
                    </h4>
                    <p>
                        Tingkatkan Kualitas Pelayanan Publik
                    </p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-sm-4 col-xs-6">
                <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                    <div class="img-wrapper">
                        <img src="/Assets/images/portfolio/03.png" class="img-responsive" alt="" >
                        <div class="overlay">
                            <div class="buttons">
                                <a rel="gallery" class="fancybox" href="/Assets/images/portfolio/3.png">Demo</a>
                            </div>
                        </div>
                    </div>
                    <figcaption>
                    <h4>
                    <a href="#">
                        Kalender Perencanaan & Penganggaran
                    </a>
                    </h4>
                    <p>
                        Kalender Tahun 2019 & Agenda Penyusunan Rencana/Anggaran 2020
                    </p>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</section>

<section id="call-to-action" style="background-color: black">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">APA ASPIRASI ANDA ?</h1>
                    <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Anda dapat menyampaikan masukan/aspirasi mengenai Bojonegoro Open System (BOS),<br> dengan mengisi dan mengirim formulir aspirasi berikut.</p>
                    <a href="https://docs.google.com/forms/d/1JIRCEoDu0phhB3WeRiRa_ut-OaEmEL93nFujebNizYo" target="_blank" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">KOLOM ASPIRASI</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script_tambahan')

@endsection