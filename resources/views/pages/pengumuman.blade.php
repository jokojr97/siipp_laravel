@extends ('layouts/mainproyek')

@section('title'){{$paket->nama_paket}} - Pengumuman - @endsection
@section('metadeskription'){{$paket->nama_paket}}, {{$paket->deskripsi}} @endsection
@section('metakeywords', 'siipp, open data kontrak, bojonegoro, bos, bojonegoro open system')
@section('thumbnail', 'thumbnail.png')

@section('container')
	
  <div class="container">
    <div class="panel panel-default" style="padding: 20px;margin-top: 10px">        
      <ul class="nav nav-tabs h5">
        <li><a href="/proyek/perencanaan/{{$paket->tahun}}/{{$paket->kode_rup}}"><i class="fa fa-calendar-check-o"></i> Perencanaan</a></li>
        @if($paket->tenders)
        <li class="active"><a href="/proyek/pengumuman/{{$paket->tahun}}/{{$paket->kode_rup}}"><i class="fa fa-users"></i> Pemilihan Penyedia</a></li>  
        <li><a href="/proyek/kontrak/{{$paket->tahun}}/{{$paket->kode_rup}}"><i class="glyphicon glyphicon-briefcase"></i> Pemenang & Kontrak</a></li> 
        @endif
        <li><a href="/proyek/implementasi/{{$paket->tahun}}/{{$paket->kode_rup}}"><i class="fa fa-check-square"></i> Implementasi</a></li>
      </ul>
        <div class="tab-content">
          <div id="perencanaan" class="tab-pane fade in active"><br>

              <table class="table table-condensed table-bordered">  
                <tr>
                    <th class="bg-warning" style="text-align: right" width="200">Kode LPSE</th>
                    <td colspan="3" style="text-transform: capitalize;"><strong><a href="http://lpse.bojonegorokab.go.id/eproc4/lelang/{{$paket->tenders->kode_lelang}}/pengumumanlelang" target="_blank">{{$paket->tenders->kode_lelang}}</a></strong></td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right" width="200">Nama Proyek/ Paket Pekerjaan</th>
                    <td colspan="3" style="text-transform: capitalize;"><strong>{{$paket->nama_paket}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Satuan Kerja</th>
                    <td colspan="3" ><strong>{{$paket->satkers->nama}}</strong></td>      
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Lokasi</th>
                    <td colspan="3" >
                        {{$paket->tenders->lokasi}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Kategori</th>
                    <td colspan="3" >
                        {{$paket->jenis_pengadaan}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Metode Pengadaan</th>
                    <td colspan="3" >
                        {{$paket->metode_pemilihan}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Peserta Lelang</th>
                    <td colspan="3" >
                        {{$paket->tenders->peserta}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Pagu Anggaran</th>
                    <td colspan="3" >
                        @php
                        $duit = $paket->pagu_rup;
                        @endphp
                        Rp. {{number_format((float)"$duit",0,",",".")}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">HPS</th>
                    <td colspan="3" >
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
              <div class="row" style="margin:8px">
                <h4>Komentar Publik</h4>
                <hr>
              <div class="pull-right">
                <a href="#" class="btn btn-danger edit-record" data-toggle="modal" data-target="#komenModal" ><i class="fa fa-comment"><strong>&nbsp;&nbsp;&nbsp; Formulir Komentar</strong></i></a>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                @include('pages._partials.komen')
              </div>
            </div>
          </div>
        </div>
      </div>          
    </div>

  </section>
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