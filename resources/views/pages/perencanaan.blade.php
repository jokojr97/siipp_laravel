@extends ('layouts/mainproyek')

@section('title'){{$paket->nama_paket}} - Perencananaan - @endsection
@section('metadeskription'){{$paket->nama_paket}}, {{$paket->deskripsi}} @endsection
@section('metakeywords', 'siipp, open data kontrak, bojonegoro, bos, bojonegoro open system')
@section('thumbnail', 'thumbnail.png')

@section('container')
	
  <div class="container">
    <div class="panel panel-default" style="padding: 20px;margin-top: 10px">        
      <ul class="nav nav-tabs h5">
        <li class="active"><a href="/proyek/perencanaan/{{$paket->tahun}}/{{$paket->kode_rup}}"><i class="fa fa-calendar-check-o"></i> Perencanaan</a></li>
        @if($paket->tenders)
        <li><a href="/proyek/pengumuman/{{$paket->tahun}}/{{$paket->kode_rup}}"><i class="fa fa-users"></i> Pemilihan Penyedia</a></li>  
        <li><a href="/proyek/kontrak/{{$paket->tahun}}/{{$paket->kode_rup}}"><i class="glyphicon glyphicon-briefcase"></i> Pemenang & Kontrak</a></li> 
        @endif
        <li><a href="/proyek/implementasi/{{$paket->tahun}}/{{$paket->kode_rup}}"><i class="fa fa-check-square"></i> Implementasi</a></li>
      </ul>
        <div class="tab-content">
          <div id="perencanaan" class="tab-pane fade in active"><br>

              <table class="table table-condensed table-bordered">  
                <tr>
                    <th class="bg-warning" style="text-align: right" width="200">Kode RUP</th>
                    <td colspan="3" style="text-transform: capitalize;"><strong>{{$paket->kode_rup}}</strong></td>
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
                    <th class="bg-warning" style="text-align: right">Kegiatan</th>
                    <td colspan="3" >
                        {{$paket->kegiatan}}
                    </td>
                </tr>                
                <tr>
                    <th class="bg-warning" style="text-align: right">Deskripsi</th>
                    <td colspan="3" >
                        {{$paket->deskripsi}}
                    </td>
                </tr>                
                <tr>
                    <th class="bg-warning" style="text-align: right">Lokasi</th>
                    <td colspan="3" >
                      @php
                      $lok = $paket->detail_lokasi;
                      $lok = explode(";", $lok);
                      $jml_lok = count($lok) - 1;
                      $loka = $lok[$jml_lok];
                      @endphp
                      <ol style="margin-left: 10px">
                      @foreach($lok as $hsl)
                        <li>{{$hsl}}</li>
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
                    <th class="bg-warning" style="text-align: right">Waktu Pengadaan</th>
                    <td><?= $pengadaanmulai ?></td>
                    <th class="bg-warning" style="text-align: right">s/d</th>
                    <td><?= $pengadaanselesai ?></td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Waktu Pekerjaan</th>
                    <td><?= $pekerjaanmulai ?> </td>
                    <th class="bg-warning" style="text-align: right">s/d</th>
                    <td><?= $pekerjaanselesai ?></td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Kategori Pengadaan</th>
                    <td colspan="3" >
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
                    <th class="bg-warning" style="text-align: right">Metode Pengadaan</th>
                    <td colspan="3">{{$paket->metode_pemilihan}}</td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Volume</th>
                    <td colspan="3"> {{$paket->volume}}</td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Tahap Tender Saat Ini</th>
                      <td colspan="3">
                      @if($paket->tenders)
                      <a href="http://lpse.bojonegorokab.go.id/eproc4/nontender/{{$paket->tenders->kode_lelang}}/jadwal" target="_blank"> {{$paket->tenders->tahap_tender}}</a>
                      @endif
                    @if($paket->nontenders)
                      <td colspan="3"><a href="http://lpse.bojonegorokab.go.id/eproc4/lelang/{{$paket->nontenders->kd_lelang}}/jadwal" target="_blank"> {{$paket->nontenders->tahap_tender}}</a></td>
                    @endif

                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Tahun Anggaran</th>
                    <td colspan="3"> 

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
                    <th class="bg-warning" style="text-align: right">Pagu Anggaran</th>
                    <td colspan="3"> <?="Rp. ".number_format((float)"$paket->pagu_rup",0,",","."); ?></td>
                </tr>
                
                <tr>
                    <th class="bg-warning" style="text-align: right">Dokumen</th>
                    <td colspan="3"><a href="proyek/kak" target="_blank"><i class="glyphicon glyphicon-file"></i> Download Kerangka Acuan Kerja (KAK)</a></td>
                </tr>  
                
                <tr>
                </tr>
              </table>
                <ul style="list-style-type: circle;">
                  <li style="color: red;font-size: 12px;margin-left: 20px"><b>Perencanaan:</b> berdasarkan data <a href="https://sirup.lkpp.go.id/" target="_blank" style="color: red">SiRUP</a></li>
                </ul>
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