@extends ('layouts/mainproyek')

@section('title'){{$paket->nama_paket}} - Perencananaan - @endsection
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
                <a class="nav-link active" href="/proyek/perencanaan/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-calendar-check text-hijau"></i> <span class="text-hijau">Perencanaan</span></b></a>
              </li>
              @if($paket->tenders)
              <li class="nav-item">
                <a class="nav-link pr-0" href="/proyek/pengumuman/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-users text-hijau"></i> <span class="text-hijau">Pemilihan Penyedia</span></b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/proyek/kontrak/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-briefcase text-hijau"></i> <span class="text-hijau">Pemenang & Kontrak</span></b></a>
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
                    <th class="bg-warnings text-right" width="200">Kode RUP</th>
                    <td  class="text-black text-capitalize" colspan="3" class="text-black"><strong>{{$paket->kode_rup}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-warnings text-right" width="200">Nama Proyek/ Paket Pekerjaan</th>
                    <td  class="text-black text-capitalize" colspan="3"><strong>{{$paket->nama_paket}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-warnings text-right">Satuan Kerja</th>
                    <td  class="text-black" colspan="3" ><strong>{{$paket->satkers->nama}}</strong></td>      
                </tr>
                <tr>
                    <th class="bg-warnings text-right">Kegiatan</th>
                    <td  class="text-black" colspan="3" >
                        {{$paket->kegiatan}}
                    </td>
                </tr>                
                <tr>
                    <th class="bg-warnings text-right">Deskripsi</th>
                    <td  class="text-black" colspan="3" >
                        {{$paket->deskripsi}}
                    </td>
                </tr>                
                <tr>
                    <th class="bg-warnings text-right">Lokasi</th>
                    <td  class="text-black" colspan="3" class="ml-0">
                      @php
                      $lok = $paket->detail_lokasi;
                      $lok = explode(";", $lok);
                      $jml_lok = count($lok) - 1;
                      $loka = $lok[$jml_lok];
                      @endphp
                      @foreach($lok as $hsl)
                        <p>{{$hsl}}</p>
                      @endforeach
                      </ol>
                    </td>
                </tr>                
                @php
                $pengadaanmulai = tanggal_indo($paket->awal_pengadaan, $paket->tahun);
                if(!$pengadaanmulai) {
                  $pengadaanmulai = "";
                }
                $pengadaanselesai = tanggal_indo($paket->akhir_pengadaan, $paket->tahun);
                if(!$pengadaanselesai) {
                  $pengadaanselesai = "";
                } 
                $pekerjaanmulai = tanggal_indo($paket->awal_pengadaan, $paket->tahun); 
                if(!$pekerjaanmulai) {
                  $pekerjaanmulai = "";
                }
                $pekerjaanselesai = tanggal_indo($paket->akhir_pekerjaan, $paket->tahun); 
                if(!$pekerjaanselesai) {
                  $pekerjaanselesai = "";
                }
                @endphp

                <tr>
                    <th class="bg-warnings text-right">Waktu Pengadaan</th>
                    <td  class="text-black"><?= $pengadaanmulai ?></td>
                    <th class="bg-warnings text-right">s/d</th>
                    <td  class="text-black"><?= $pengadaanselesai ?></td>
                </tr>
                <tr>
                    <th class="bg-warnings text-right">Waktu Pekerjaan</th>
                    <td  class="text-black"><?= $pekerjaanmulai ?> </td>
                    <th class="bg-warnings text-right">s/d</th>
                    <td  class="text-black"><?= $pekerjaanselesai ?></td>
                </tr>
                <tr>
                    <th class="bg-warnings text-right">Kategori Pengadaan</th>
                    <td  class="text-black" colspan="3" >
                      @php
                      $jenis = $paket->jenis_pengadaan;
                      $jenis = explode(";", $jenis);
                      $jml_jenis = count($jenis) - 1;
                      $jenis = $jenis[$jml_jenis];
                      echo $jenis;
                      @endphp
                    </td>
                </tr>
                <tr>
                    <th class="bg-warnings text-right">Metode Pengadaan</th>
                    <td  class="text-black" colspan="3">{{$paket->metode_pemilihan}}</td>
                </tr>
                <tr>
                    <th class="bg-warnings text-right">Volume</th>
                    <td  class="text-black" colspan="3"> {{$paket->volume}}</td>
                </tr>
                <tr>
                    <th class="bg-warnings text-right">Tahap Tender Saat Ini</th>
                      <td  class="text-black" colspan="3">
                      @if($paket->tenders)
                      <a href="http://lpse.bojonegorokab.go.id/eproc4/nontender/{{$paket->tenders->kode_lelang}}/jadwal" target="_blank"> {{$paket->tenders->tahap_tender}}</a>
                      @endif
                    @if($paket->nontenders)
                      <td  class="text-black" colspan="3"><a href="http://lpse.bojonegorokab.go.id/eproc4/lelang/{{$paket->nontenders->kd_lelang}}/jadwal" target="_blank"> {{$paket->nontenders->tahap_tender}}</a></td>
                    @endif

                </tr>
                <tr>
                    <th class="bg-warnings text-right">Tahun Anggaran</th>
                    <td  class="text-black" colspan="3"> 

                      @php
                      $sumb = $paket->sumber_dana;
                      $sumb = explode(",", $sumb);
                      $jml_sumb = count($sumb) - 1;
                      $sumb = $sumb[$jml_sumb];
                      echo $sumb;
                      @endphp
                    {{$paket->tahun}}</td>
                </tr>
                <tr>
                    <th class="bg-warnings text-right">Pagu Anggaran</th>
                    <td  class="text-black" colspan="3"> <?="Rp. ".number_format((float)"$paket->pagu_rup",0,",","."); ?></td>
                </tr>
                
                <tr>
                    <th class="bg-warnings text-right">Dokumen</th>
                    <td  class="text-black" colspan="3"><a href="proyek/kak" target="_blank"><i class="fas fa-file"></i><b> &nbsp;Download Kerangka Acuan Kerja (KAK)</b></a></td>
                </tr>  
                
                <tr>
                </tr>
              </table>
              <ul style="list-style-type: circle;">
                <li style="color: red;font-size: 12px;"><b>Perencanaan:</b> berdasarkan data <a href="https://sirup.lkpp.go.id/" target="_blank" style="color: red">SiRUP</a></li>
              </ul>
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
@php

@endphp
@endsection