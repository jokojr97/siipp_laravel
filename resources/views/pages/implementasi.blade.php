@extends ('layouts/mainproyek')

@section('title'){{$paket->nama_paket}} - Implementasi - @endsection
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
                <a class="nav-link" href="/proyek/analisis/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-chart-line text-hijau"></i> <span class="text-hijau">Analisis</span></b></a>
              </li>
              @endif
              <li class="nav-item" style="margin-left: -10px">
                <a class="nav-link active" href="/proyek/implementasi/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-users text-hijau"></i> <span class="text-hijau">Implementasi</span></b></a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <table class="table table-condensed table-bordered">  
              <tr>
                  <th class="bg-warnings text-dark text-right" width="200">Kode RUP</th>
                  <td colspan="3" class="text-black text-capitalize"><strong>{{$paket->kode_rup}}</strong></td>
              </tr>
              <tr>
                  <th class="bg-warnings text-dark text-right" width="200">Nama Proyek/ Paket Pekerjaan</th>
                  <td colspan="3" class="text-black text-capitalize"><strong>{{$paket->nama_paket}}</strong></td>
              </tr>
              <tr>
                  <th class="bg-warnings text-dark text-right">Satuan Kerja</th>
                  <td colspan="3" class="text-black" ><strong>{{$paket->satkers->nama}}</strong></td>      
              </tr>
              <tr>
                  <th class="bg-warnings text-dark text-right">Kegiatan</th>
                  <td colspan="3" class="text-black" >
                      {{$paket->kegiatan}}
                  </td>
              </tr>                
              <tr>
                  <th class="bg-warnings text-dark text-right">Deskripsi</th>
                  <td colspan="3" class="text-black" >
                      {{$paket->deskripsi}}
                  </td>
              </tr>                
              <tr>
                  <th class="bg-warnings text-dark text-right">Lokasi</th>
                  <td colspan="3" class="text-black" >
                      {{$paket->detail_lokasi}}
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
                  <th class="bg-warnings text-dark text-right">Waktu Pengadaan</th>
                  <td><?= $pengadaanmulai ?></td>
                  <th class="bg-warnings text-dark text-right">s/d</th>
                  <td><?= $pengadaanselesai ?></td>
              </tr>
              <tr>
                  <th class="bg-warnings text-dark text-right">Waktu Pekerjaan</th>
                  <td><?= $pekerjaanmulai ?> </td>
                  <th class="bg-warnings text-dark text-right">s/d</th>
                  <td><?= $pekerjaanselesai ?></td>
              </tr>
              <tr>
                  <th class="bg-warnings text-dark text-right">Kategori Pengadaan</th>
                  <td colspan="3" class="text-black" >{{$paket->jenis_pekerjaan}}</td>
              </tr>
              <tr>
                  <th class="bg-warnings text-dark text-right">Metode Pengadaan</th>
                  <td colspan="3" class="text-black">{{$paket->metode_pemilihan}}</td>
              </tr>
              <tr>
                  <th class="bg-warnings text-dark text-right">Volume</th>
                  <td colspan="3" class="text-black"> {{$paket->volume}}</td>
              </tr>
              <tr>
                  <th class="bg-warnings text-dark text-right">Tahap Tender Saat Ini</th>
                    <td colspan="3" class="text-black">
                    @if($paket->tenders)
                    <a href="http://lpse.bojonegorokab.go.id/eproc4/nontender/{{$paket->tenders->kode_lelang}}/jadwal" target="_blank"> {{$paket->tenders->tahap_tender}}</a>
                    @endif
                  @if($paket->nontenders)
                    <td colspan="3" class="text-black"><a href="http://lpse.bojonegorokab.go.id/eproc4/lelang/{{$paket->nontenders->kd_lelang}}/jadwal" target="_blank"> {{$paket->nontenders->tahap_tender}}</a></td>
                  @endif

              </tr>
              <tr>
                  <th class="bg-warnings text-dark text-right">Tahun Anggaran</th>
                  <td colspan="3" class="text-black"> {{$paket->sumber_dana}} {{$paket->tahun}}</td>
              </tr>
              <tr>
                  <th class="bg-warnings text-dark text-right">Pagu Anggaran</th>
                  <td colspan="3" class="text-black"> <?="Rp. ".number_format((float)"$paket->pagu_rup",0,",","."); ?></td>
              </tr>
              
              <tr>
                  <th class="bg-warnings text-dark text-right">Dokumen</th>
                  <td colspan="3" class="text-black"><a href="proyek/kak" target="_blank"><i class="glyphicon glyphicon-file"></i> Download Kerangka Acuan Kerja (KAK)</a></td>
              </tr>  
            </table>
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