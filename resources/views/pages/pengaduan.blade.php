@extends ('layouts/main')

@section('title', 'Pengaduan - ')
@section('metadeskription', 'Aplikasi Keterbukaan Data dan Informasi Seluruh Proses Pengadaan Barang dan Jasa di Lingkungan Pemerintah Kabupaten Bojonegoro.')
@section('metakeywords', 'siipp, open data kontrak, bojonegoro, bos, bojonegoro open system')
@section('thumbnail', 'thubnail.png')

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
            <h2 style="color: red"><b><span>|</span> Pengaduan Publik </b></h2><br>
            <h5 style="margin-top: -10px;text-align: justify;line-height: 1.5em">Pengaduan/Aspirasi Publik dari aplikasi Bojonegoro Open System (BOS) atau SIIPP.NET :</h5> <br>
            <div class="col-sm-8" >
                <br>
                @foreach($aspirasi as $result)
                <div class="well" style="background-color: white;margin-bottom: -10px">
                    {{ $result->satkers->nama }}
                </div>

                <div class="well">                               
                    <div class="media" >
                        <div class="media-left media-top">
                            @if($result->jenis_kelamin == "Perempuan")
                            <img src="/Assets/images/img_avatar4.png" class="media-object " style="width:80px;border-radius: 50%;">
                            @else
                            <img src="/Assets/images/img_avatar2.png" class="media-object " style="width:80px;border-radius: 50%;">
                            @endif
                        </div>
                        <div class="media-body">
                            <div class="row">
                                <div class="col-xs-8 media-heading" style="text-transform: capitalize;">
                                    <h4>
                                        @if($result->anonim == 1)
                                        Anonim
                                        @else
                                        {{ $result->pengirim }}
                                        @endif
                                        <small>
                                            &nbsp;&nbsp;(<?= substr($result->no_hp, 0, -6) . 'XXXXXX'; ?>)&nbsp;&nbsp;
                                            @if($result->status == 0)
                                            <span class=" label label-success" >Warga</span>
                                            @else
                                            <span class=" label label-danger" >Admin</span>
                                            @endif
                                        </small>
                                    </h4>
                                </div>
                                <div class="col-xs-4 media-heading" >
                                    <h5 style="text-transform: bold" class="pull-right">{{$result->tanggal}}</h5>
                                </div>
                                <div class="col-xs-12 media-heading ">
                                    @if($result->pakets)
                                        <a href="/Assets/proyek/detail?name=Kontrak&op=KontrakDetail&tahun={{ $result->tahun_anggaran }}&kode={{$result->ocid}}" class="" style="margin-top: -5px" target="_blank"><?= substr($result->pakets->nama_paket, 0, 80)."..." ?></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-xs-12">
                                <p style="text-align: justify;">{{ $result->isi }}</p>
                                @if($result->foto)
                                
                                <div class="col-sm-3">
                                    <a href="/Assets/proyek/images/komentar/{{$result->foto}}" target="_blank"><img src="/Assets/proyek/images/komentar/{{$result->foto}}" class="img-thumbnail img-responsive"></a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div>
                            @php
                            if($result->likes){
                                $likes = count($result->likes);
                            }else {
                                $likes = 0;
                            }
                            @endphp

                            @php
                            if($result->jumlah_komen($result->id)){
                                $coment = count($result->jumlah_komen($result->id));
                            }else {
                                $coment = 0;
                            }
                            @endphp

                            <a href="#" class="btn btn-primary btn-sm" disabled><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;Like(<?= $likes ?>)</a>

                            <a href="/Assets/proyek/detail/detailKomen?id={{$result->id}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-comment "></span>&nbsp;Balasan({{ $coment }})</a>
                        </div>
                    </div>
                </div>
                @endforeach

                {{ $aspirasi->links() }}     
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