@extends ('layouts/mainproyek')

@section('title'){{$paket->nama_paket}} - Pengumuman - @endsection
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
                <a class="nav-link active pr-0" href="/proyek/pengumuman/{{$paket->tahun}}/{{$paket->kode_rup}}"><b><i class="fas fa-users text-hijau"></i> <span class="text-hijau">Pemilihan Penyedia</span></b></a>
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
                <th class="bg-warnings text-right" width="200">Kode LPSE</th>
                <td colspan="3" class="text-capitalize"><strong><a href="http://lpse.bojonegorokab.go.id/eproc4/lelang/{{$paket->tenders->kode_lelang}}/pengumumanlelang" target="_blank">{{$paket->tenders->kode_lelang}}</a></strong></td>
              </tr>
              <tr>
                <th class="bg-warnings text-right" width="200">Nama Proyek/ Paket Pekerjaan</th>
                <td colspan="3" class="text-capitalize"><strong>{{$paket->nama_paket}}</strong></td>
              </tr>
              <tr>
                <th class="bg-warnings text-right">Satuan Kerja</th>
                <td colspan="3" class="text-black" ><strong>{{$paket->satkers->nama}}</strong></td>      
              </tr>
              <tr>
                <th class="bg-warnings text-right">Lokasi</th>
                <td colspan="3" class="text-black" >
                    {{$paket->tenders->lokasi}}
                </td>
              </tr>
              <tr>
                <th class="bg-warnings text-right">Kategori</th>
                <td colspan="3" class="text-black" >
                    {{$paket->jenis_pengadaan}}
                </td>
              </tr>
              <tr>
                <th class="bg-warnings text-right">Metode Pengadaan</th>
                <td colspan="3" class="text-black" >
                    {{$paket->metode_pemilihan}}
                </td>
              </tr>
              <tr>
                <th class="bg-warnings text-right">Peserta Lelang</th>
                <td colspan="3" class="text-black" >
                    {{$paket->tenders->peserta}}
                </td>
              </tr>
              <tr>
                <th class="bg-warnings text-right">Pagu Anggaran</th>
                <td colspan="3" class="text-black" >
                    @php
                    $duit = $paket->pagu_rup;
                    @endphp
                    Rp. {{number_format((float)"$duit",0,",",".")}}
                </td>
              </tr>
              <tr>
                <th class="bg-warnings text-right">HPS</th>
                <td colspan="3" class="text-black" >
                    @php
                    $duit = $paket->tenders->hps;
                    @endphp
                    Rp. {{number_format((float)"$duit",0,",",".")}}
                </td>
              </tr>
              </tr>
            </table>
            <div class="table table-responsive">
              <table class="table table-bordered table-striped table-condensed">
                <thead>
                  <tr>
                    <th><center>No</center></th>
                    <th><center>Peserta</center></th>
                    <th><center>NPWP</center></th>
                    <th><center>Penawaran</center></th>                      
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
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
@php

@endphp
@endsection