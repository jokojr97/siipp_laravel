@extends ('layouts/mainproyek')

@section('title'){{$paket->nama_paket}} - Analisis - @endsection
@section('metadeskription'){{$paket->nama_paket}}, {{$paket->deskripsi}} @endsection
@section('metakeywords', 'siipp, open data kontrak, bojonegoro, bos, bojonegoro open system')
@section('thumbnail', 'thumbnail.png')

@section('container')
<section class="ftco-section ftco-no-pt bg-light">
  <br>
  <div class="container">
    <div class="row bg-white p-3">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link" href="/proyek/perencanaan/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-calendar-check text-hijau"></i> <span class="text-hijau">Perencanaan</span></b></a>
              </li>
              @if($paket->tenders)
              <li class="nav-item">
                <a class="nav-link pr-0" href="/proyek/pengumuman/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-users text-hijau"></i> <span class="text-hijau">Pemilihan Penyedia</span></b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/proyek/kontrak/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-briefcase text-hijau"></i> <span class="text-hijau">Pemenang & Kontrak</span></b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/proyek/analisis/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-chart-line text-hijau"></i> <span class="text-hijau">Analisis</span></b></a>
              </li>
              @endif
              <li class="nav-item">
                <a class="nav-link" href="/proyek/implementasi/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-users text-hijau"></i> <span class="text-hijau">Implementasi</span></b></a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="text-dark mb-1"><b>Nilai Kontrak</b></label>
                  <div class="progress" style="height: 40px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $potensi->nkt*20 ?>%;font-size: 16px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b>{{$potensi->nkt}}/5</b></div>
                  </div>
                </div>
              </div><!-- col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="text-dark mb-1"><b>Monopoly</b></label>
                  <div class="progress" style="height: 40px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $potensi->w*20 ?>%;font-size: 16px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b>{{$potensi->w}}/5</b></div>
                  </div>
                </div>
              </div><!-- col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="text-dark mb-1"><b>Kontrak:HPS</b></label>
                  <div class="progress" style="height: 40px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $potensi->s*20 ?>%;font-size: 16px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b>{{$potensi->s}}/5</b></div>
                  </div>
                </div>
              </div><!-- col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="text-dark mb-1"><b>Partisipasi</b></label>
                  <div class="progress" style="height: 40px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $potensi->p*20 ?>%;font-size: 16px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b>{{$potensi->p}}/5</b></div>
                  </div>
                </div>
              </div><!-- col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="text-dark mb-1"><b>Waktu</b></label>
                  <div class="progress" style="height: 40px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $potensi->q*100 ?>%;font-size: 16px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b>{{$potensi->q}}/1</b></div>
                  </div>
                </div>
              </div><!-- col -->
            </div>  <!-- row -->
            <div class="row">
              <div class="col">
                <label class="text-dark mb-1"><b>Total</b></label>
                <div class="progress" style="height: 40px;">
                  <div class="progress-bar bg-success" role="progressbar" style="width: <?= $potensi->total*5 ?>%;font-size: 16px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b>{{$potensi->total}}/21</b></div>
                </div>
              </div><!-- col -->
            </div><!-- row -->
            <br>
            <div class="row">
              <div class="col">
                <div id="accordion">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link text-hijau" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Detail Analisis
                        </button>
                      </h5>
                    </div><!-- card header -->
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="table table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th class="text-center text-dark">No</th>
                                <th class="text-center text-dark">Nama</th>
                                <th class="text-center text-dark">Kriteria</th>
                                <th class="text-center text-dark">Value</th>
                                <th class="text-center text-dark">Skor</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="text-center text-dark">1</td>
                                <td class="text-dark">Nilai Kontrak Tertinggi</td>
                                <td class="text-dark text-center">> 200 Jt = 1<br>
                                201-500 Jt = 2<br>
                                501 Jt - 1 M = 3<br>
                                1,01 M - 5 M = 4<br>
                                > 5 M = 5</td>
                                <?php $duit = $paket->tenders->hasil_negosiasi; ?>
                                <td class="text-dark text-center"><?="Rp. ".number_format((float)"$duit",0,",","."); ?></td>
                                <td class="text-dark text-center">{{$potensi->nkt}}</td>
                              </tr>
                              <tr>
                                <td class="text-center text-dark">2</td>
                                <td class="text-dark">Menang Berulang/Monoply</td>
                                <td class="text-dark text-center">W = 2x ? 1 <br>
                                  W = 3x ? 2<br>
                                  W = 4x ? 3<br>
                                  W = 5x ? 4<br>
                                  W > 5x ? 5</td>
                                <td class="text-dark text-center"> {{$jmlmenang}} Kali</td>
                                <td class="text-dark text-center"> {{$potensi->w}}</td>
                              </tr>
                              <tr>
                                <td class="text-center text-dark">3</td>
                                <td class="text-dark">Saving/Kontrak:HPS</td>
                                <td class="text-dark text-center">> 95,01% = 5<br>
                                  90,01% – 95 % = 4<br>
                                  85,01% - 90% = 3<br>
                                  80,01% – 85% = 2<br>
                                  < 80% = 1</td>
                                <td class="text-dark text-center"> {{$saving}} %</td>
                                <td class="text-dark text-center"> {{$potensi->s}}</td>
                              </tr>
                              <tr>
                                <td class="text-center text-dark">4</td>
                                <td class="text-dark">Jumlah Peserta Menawar/Partisipasi</td>
                                <td class="text-dark text-center">< 3 = 5<br>
                                  3 = 4<br>
                                  4 = 3<br>
                                  5 = 2<br>
                                  > 5 = 1</td>
                                <td class="text-dark text-center"> {{$menawar}} Peserta</td>
                                <td class="text-dark text-center"> {{$potensi->p}}</td>
                              </tr>
                              <tr>
                                <td class="text-center text-dark">5</td>
                                <td class="text-dark">Waktu</td>
                                <td class="text-dark text-center">Q1 = 0<br>
                                Q2 = 0<br>
                                Q3 = 0<br>
                                Q4 = 1</td>
                                <td class="text-dark text-center"> Triwulan ke {{$triwulan}}</td>
                                <td class="text-dark text-center"> {{$potensi->q}}</td>
                              </tr>
                              <tr>
                                <td class="text-dark" colspan="4"><b class="ml-3">Total</b></td>
                                <td class="text-dark text-center"><b>{{$potensi->total}}</b></td>
                              </tr>
                            </tbody>
                          </table>      
                        </div><!-- responsive -->
                      </div><!-- card body -->
                    </div><!-- collapse -->
                  </div><!-- card -->
                </div><!-- accordion -->
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- card -->
        </div><!-- card -->
      </div><!-- col -->
    </div><!-- row -->
    <br>
    <div class="row bg-white p-3">
      <div class="col">
        <div class="float-right">
           <a href="#" class="btn btn-danger edit-record" data-toggle="modal" data-target="#komenModal" ><i class="fa fa-comment"><strong> Formulir Komentar</strong></i></a>
        </div>
        <h5 class="text-hijau pb-2"><b><i class="fas fa-comment"></i> Komentar Publik</b></h5>
        <hr>
        <div class="row">
          <div class="col">
              @include('pages._partials.komen')
          </div>
        </div>
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
</section>

@include('pages._partials.modal')

<?php  

  function tanggal_indo($tanggal, $tahun)
  {

      $bulan = array (1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
          );
      $split = explode('-', $tanggal);
      return $bulan[ (int)$split[1] ] . ' ' . $split[0];
    
  }

?>
@endsection

@section('script_tambahan')
<script type="text/javascript">
  function myfunction() {
    var persentase = document.getElementById('persentase');
    var textsebelum = document.getElementById('dari').value;
    var sebelum = document.getElementById('dari').value;
    if (sebelum == 'negosiasi') {
      var dari = <?= $paket->tenders->hasil_negosiasi ?>;
    }else if(sebelum == 'pagu') {
      var dari = <?= $paket->pagu_rup ?>;
    }else if(sebelum == 'hps') {
      var dari = <?= $paket->tenders->hps ?>;
    }else if(sebelum == 'penawaran') {
      var dari = <?= $paket->tenders->harga_penawaran ?>;
    }else if(sebelum == 'koreksi') {
      var dari = <?= $paket->tenders->harga_terkoreksi ?>;
    }else if(sebelum == 'penawaran_kontraktor') {
      var dari = <?= $paket->tenders->penawaran_kontraktor ?>;
    }else if(sebelum == 'negosiasi_kontraktor') {
      var dari = <?= $paket->tenders->negosiasi_kontraktor ?>;
    }else {
      var dari = 0;
    }
    var textsesudah = document.getElementById('sampai').value;
    var sesudah = document.getElementById('sampai').value;
    if (sesudah == 'negosiasi') {
      var sampai = <?= $paket->tenders->hasil_negosiasi ?>;
    }else if(sesudah == 'pagu') {
      var sampai = <?= $paket->pagu_rup ?>;
    }else if(sesudah == 'hps') {
      var sampai = <?= $paket->tenders->hps ?>;
    }else if(sesudah == 'penawaran') {
      var sampai = <?= $paket->tenders->harga_penawaran ?>;
    }else if(sesudah == 'koreksi') {
      var sampai = <?= $paket->tenders->harga_terkoreksi ?>;
    }else if(sesudah == 'penawaran_kontraktor') {
      var sampai = <?= $paket->tenders->penawaran_kontraktor ?>;
    }else if(sesudah == 'negosiasi_kontraktor') {
      var sampai = <?= $paket->tenders->negosiasi_kontraktor ?>;
    }else {
      var sampai = 0;
    }
    var selisih = dari-sampai;
    var persen = dari/sampai;
    persen = persen.toFixed(2);
    dari = numberWithCommas(dari);
    sampai = numberWithCommas(sampai);
    selisih = numberWithCommas(selisih);

    persentase.innerHTML = '<div class="alert alert-success" style="font-size:12px">'+textsebelum+'-'+textsesudah+'= <samall><b>'+dari+'-'+sampai+'</b></small></div><div class="form-group"><label>Selisih:</label><input  type="text" class="form-control" id="selisih" value="'+selisih+'"></input></div><div class="form-group"><label>Persentase: </label><input type="text" class="form-control" id="persentase" value="'+persen+' %"></input></div>';
  }

  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

</script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>


<script type="text/javascript">
 var chart1; // globally available
 $(document).ready(function() {
    chart1 = new Highcharts.Chart({
       chart: {
          renderTo: 'grafikpagu',
          type: 'column'
       },
       credits: {
        enabled: false
       },   
       title: {
          text: 'Grafik Anggaran'
       },
       xAxis: {
          categories: ['Anggaran']
       },
       yAxis: {
          title: {
             text: 'Nilai Anggaran'
          }
       },
            series:             
          [
            {
                name: 'Pagu',
                data: [<?= $paket->tenders->pagu ?>]
            },
            {
                name: 'HPS',
                data: [<?= $paket->tenders->hps ?>]
            },
            {
                name: 'Harga Penawaran',
                data: [<?= $paket->tenders->harga_penawaran ?>]
            },
            {
                name: 'Harga Terkoreksi',
                data: [<?= $paket->tenders->harga_terkoreksi ?>]
            },
            {
                name: 'Hasil Negosiasi',
                data: [<?= $paket->tenders->hasil_negosiasi ?>]
            },
            {
                name: 'Harga Penawaran Kontraktor',
                data: [<?= $paket->tenders->penawaran_kontraktor ?>]
            },
            {
                name: 'Hasil Negosiasi Kontraktor',
                data: [<?= $paket->tenders->negosiasi_kontraktor ?>]
            },
          ]
      });
   }); 
</script>
@endsection