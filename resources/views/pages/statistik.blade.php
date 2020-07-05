@extends ('layouts/main')

@section('title', 'Statistic - ')
@section('metadeskription', 'Aplikasi Keterbukaan Data dan Informasi Seluruh Proses Pengadaan Barang dan Jasa di Lingkungan Pemerintah Kabupaten Bojonegoro.')
@section('metakeywords', 'siipp, open data kontrak, bojonegoro, bos, bojonegoro open system')
@section('thumbnail', 'thumbnail.png')

@section('container')

<section id="hero-area header-joe" >
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="block wow fadeInUp" data-wow-delay=".3s">
                    <!-- Slider -->
                    <section class="cd-intro">
                        <div class="headerex wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" style="color:black" ><strong>
                        </div><br>
                    </section> <!-- cd-intro -->
                        <!-- /.slider -->
                </div>
            </div>
        </div>
    </div>
</section><!--/#main-slider-->
<br><br><br>
<div class="container-fluid" style="background-color: white">
   <div class="container">
       <div class="row">
        <br>
            <h2 style="color: red"><b><span>|</span> Statistik Pengaduan </b></h2><br>
            <h5 style="margin-top: -10px;text-align: justify;line-height: 1.5em">Berisi Statistik Grafik dari Pengaduan Aplikasi Bojonegoro Open System (BOS) atau SIIPP.NET :</h5> <br>
            <div class="col-sm-8" >
                <br>
                <div style="padding:10px">
                    <div id="grafik3"></div>
                </div>
                <br>
                <div style="padding:10px">
                    <div id="grafik4"></div>
                </div>
                <br>
                <div style="padding:10px">
                    <div id="grafik1"></div>
                </div>
                <br>
                <div style="padding:10px">
                    <div id="grafik2"></div>
                </div>
                <br>
            </div>
        <div class="col-sm-4">
            <!--<div class="row"  style="border: 1px solid grey">-->
            <!--    <div id="grafik2"></div>-->
            <!--</div>-->
            <!--<br>-->
            <a href="/Assets/images/panduanbos.pdf" target="_blank">
                <img src="/Assets/images/posterbos.png" class="img-thumbnail img-responsive">
            </a>
            <div class="well" style="background-color:white;margin-bottom:-10px"> <a href="images/panduanbos.pdf" target="_blank">Download Panduan Penggunaan Aplikasi</a></div>
            <br>

            <div class="well">
                <p>Hubungi Kami :</p>
                
                <p><i class="fa fa-whatsapp"></i> 0822 3092 7569</p>
                <p>Atau <a href="https://api.whatsapp.com/send?phone=6282230927569&text=Halo%20Admin%20Siipp.net" target="_blank">Klik Di sini</a></p>
            </div>
        </div><br>

    </div>
   </div>
</div>

@endsection
@section('script_tambahan')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>


@endsection