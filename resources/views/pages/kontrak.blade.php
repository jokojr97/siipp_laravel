@extends ('layouts/mainproyek')

@section('title'){{$paket->nama_paket}} - Kontrak - @endsection
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
                <a class="nav-link active" href="/proyek/kontrak/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-briefcase text-hijau"></i> <span class="text-hijau">Pemenang & Kontrak</span></b></a>
              </li>
              @endif
              <li class="nav-item" style="margin-left: -10px">
                <a class="nav-link" href="/proyek/implementasi/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-users text-hijau"></i> <span class="text-hijau">Implementasi</span></b></a>
              </li>
            </ul>
          </div>
          <div class="card-body">
              <table class="table table-condensed table-bordered">  
                <tr>
                  <th class="bg-warnings text-right" width="200">Kode LPSE</th>
                  <td colspan="3" class="text-capitalize text-black"><strong><a href="http://lpse.bojonegorokab.go.id/eproc4/lelang/{{$paket->tenders->kode_lelang}}/pengumumanlelang" target="_blank">{{$paket->tenders->kode_lelang}}</a></strong></td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right" width="200">Nama Proyek/ Paket Pekerjaan</th>
                  <td colspan="3" class="text-capitalize text-black"><strong>{{$paket->nama_paket}}</strong></td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Satuan Kerja</th>
                  <td colspan="3" class="text-black"><strong>{{$paket->satkers->nama}}</strong></td>      
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Lokasi</th>
                  <td colspan="3" class="text-black">
                    {{$paket->tenders->lokasi}} 
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Kategori</th>
                  <td colspan="3" class="text-black">
                    {{$paket->jenis_pengadaan}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Metode Pengadaan</th>
                  <td colspan="3" class="text-black">
                    {{$paket->metode_pemilihan}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Peserta Lelang</th>
                  <td colspan="3" class="text-black">
                    {{$paket->tenders->peserta}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Pagu Anggaran</th>
                  <td colspan="3" class="text-black">
                    Rp. {{number_format((float)"$paket->pagu_rup",0,",",".")}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">HPS</th>
                  <td colspan="3" class="text-black">
                    @php
                    $hps = $paket->tenders->hps;
                    @endphp
                    Rp. {{number_format((float)"$hps",0,",",".")}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Nama Pemenang</th>
                  <td colspan="3" class="text-black">
                    {{$paket->tenders->nama_pemenang}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Alamat Pemenang</th>
                  <td colspan="3" class="text-black">
                    {{$paket->tenders->alamat_pemenang}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Harga Penawaran</th>
                  <td colspan="3" class="text-black">
                    @php
                    $duit = $paket->tenders->harga_penawaran;
                    @endphp
                    Rp. {{number_format((float)"$duit",0,",",".")}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Harga Terkoreksi</th>
                  <td colspan="3" class="text-black">
                    @php
                    $duit = $paket->tenders->harga_terkoreksi;
                    @endphp
                    Rp. {{number_format((float)"$duit",0,",",".")}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Hasil Negoisasi</th>
                  <td colspan="3" class="text-black">
                    @php
                    $duit = $paket->tenders->hasil_negosiasi;
                    @endphp
                    Rp. {{number_format((float)"$duit",0,",",".")}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Nama Kontraktor</th>
                  <td colspan="3" class="text-black">
                    {{$paket->tenders->nama_kontraktor}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Alamat Kontraktor</th>
                  <td colspan="3" class="text-black">
                    {{$paket->tenders->alamat_kontraktor}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Penawaran Kontraktor</th>
                  <td colspan="3" class="text-black">
                    @php
                    $duit = $paket->tenders->penawaran_kontraktor;
                    @endphp
                    Rp. {{number_format((float)"$duit",0,",",".")}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-warnings text-right">Hasil Negosiasi Kontraktor</th>
                  <td colspan="3" class="text-black">
                    @php
                    $duit = $paket->tenders->negosiasi_kontraktor;
                    @endphp
                    Rp. {{number_format((float)"$duit",0,",",".")}}
                  </td>
                </tr>
                </tr>
              </table>

              <div class="row">
                <div class="col-md-9">                    
                  <div id="grafikpagu"></div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <form action="/proyek/detail/kontrak" method="GET">
                        @csrf
                        <input type="hidden" name="tahun" value="{{$paket->tahun}}">
                        <input type="hidden" name="kode" value="{{$paket->kode_rup}}">
                        <div class="form-group col-md-12">
                          <label for="jenisPengadaan">Dari :</label>
                          <select class="form-control" id="sel1" name="anggarandari">
                            <option value="">-- Pilih Salah Satu --</option>
                            <option value="pagu">Pagu Anggaran</option>
                            <option value="hps">Harga Perkiraan Sendiri (HPS)</option>
                            <option value="penawaran">Harga penawaran</option>
                            <option value="koreksi">Harga Terkoreksi</option>
                            <option value="negosiasi">Hasil Negosiasi</option>
                            <option value="penawaran_kontraktor">Penawaran Kontraktor</option>
                            <option value="negosiasi_kontraktor">Hasil Negosiasi Kontraktor</option>
                          </select>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="jenisPengadaan">Sampai :</label>
                          <select class="form-control" id="sel1" name="anggaransampai">
                            <option value="">-- Pilih Salah Satu --</option>              
                            <option value="pagu">Pagu Anggaran</option>
                            <option value="hps">Harga Perkiraan Sendiri (HPS)</option>
                            <option value="penawaran">Harga penawaran</option>
                            <option value="koreksi">Harga Terkoreksi</option>
                            <option value="negosiasi">Hasil Negosiasi</option>
                            <option value="penawaran_kontraktor">Penawaran Kontraktor</option>
                            <option value="negosiasi_kontraktor">Hasil Negosiasi Kontraktor</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="margin-right: 15px">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
              <br>
            <br>
          </div><!-- card -->
        </div>
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