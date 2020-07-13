@extends ('layouts/mainproyek')

@section('title'){{$paket->nama_paket}} - Kontrak - @endsection
@section('metadeskription'){{$paket->nama_paket}}, {{$paket->deskripsi}} @endsection
@section('metakeywords', 'siipp, open data kontrak, bojonegoro, bos, bojonegoro open system')
@section('thumbnail', 'thumbnail.png')

@section('container')
	
  <div class="container">
    <div class="panel panel-default" style="padding: 20px;margin-top: 10px">        
      <ul class="nav nav-tabs h5">
        <li><a href="/proyek/perencanaan/{{$paket->tahun}}/{{$paket->kode_rup}}"><i class="fa fa-calendar-check-o"></i> Perencanaan</a></li>
        @if($paket->tenders)
        <li><a href="/proyek/pengumuman/{{$paket->tahun}}/{{$paket->kode_rup}}"><i class="fa fa-users"></i> Pemilihan Penyedia</a></li>  
        <li class="active"><a href="/proyek/kontrak/{{$paket->tahun}}/{{$paket->kode_rup}}"><i class="glyphicon glyphicon-briefcase"></i> Pemenang & Kontrak</a></li> 
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
                        Rp. {{number_format((float)"$paket->pagu_rup",0,",",".")}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">HPS</th>
                    <td colspan="3" >
                        @php
                        $hps = $paket->tenders->hps;
                        @endphp
                        Rp. {{number_format((float)"$hps",0,",",".")}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Nama Pemenang</th>
                    <td colspan="3">
                        {{$paket->tenders->nama_pemenang}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Alamat Pemenang</th>
                    <td colspan="3">
                        {{$paket->tenders->alamat_pemenang}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Harga Penawaran</th>
                    <td colspan="3">
                        @php
                        $duit = $paket->tenders->harga_penawaran;
                        @endphp
                        Rp. {{number_format((float)"$duit",0,",",".")}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Harga Terkoreksi</th>
                    <td colspan="3">
                        @php
                        $duit = $paket->tenders->harga_terkoreksi;
                        @endphp
                        Rp. {{number_format((float)"$duit",0,",",".")}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Hasil Negoisasi</th>
                    <td colspan="3">
                        @php
                        $duit = $paket->tenders->hasil_negosiasi;
                        @endphp
                        Rp. {{number_format((float)"$duit",0,",",".")}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Nama Kontraktor</th>
                    <td colspan="3">
                        {{$paket->tenders->nama_kontraktor}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Alamat Kontraktor</th>
                    <td colspan="3">
                        {{$paket->tenders->alamat_kontraktor}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Penawaran Kontraktor</th>
                    <td colspan="3">
                        @php
                        $duit = $paket->tenders->penawaran_kontraktor;
                        @endphp
                        Rp. {{number_format((float)"$duit",0,",",".")}}
                    </td>
                </tr>
                <tr>
                    <th class="bg-warning" style="text-align: right">Hasil Negosiasi Kontraktor</th>
                    <td colspan="3">
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
                                <div class="form-group col-sm-12">
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
                                <div class="form-group col-sm-12">
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