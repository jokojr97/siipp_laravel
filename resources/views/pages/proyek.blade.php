@extends ('layouts/mainproyek')

@section('title', 'Data Proyek - ')
@section('metadeskription', 'Aplikasi Keterbukaan Data dan Informasi Seluruh Proses Pengadaan Barang dan Jasa di Lingkungan Pemerintah Kabupaten Bojonegoro.')
@section('metakeywords', 'siipp, open data kontrak, bojonegoro, bos, bojonegoro open system')
@section('thumbnail', 'thumbnail.png')

@section('container')
	
<div class="notika-status-area">
        <div class="container">
            <div class="row">                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="notika-shadow sm-res-mg-t-30 tb-res-mg-t-30" style="background-color: white;padding: 25px">
                       	<div class="row">
                        	<form action="/proyek" method="POST">
	                            <div class="form-group col-sm-6">
	                                <label for="Tahun">Tahun Anggaran:</label>
	                                <select class="form-control" id="sel1" name="tahun">
                                    @if($tahun)
                                    <option>{{$tahun}}</option>
                                    @endif
                                    @foreach($tahun_angs as $hasil)
                                    <option>{{$hasil->tahun}}</option>
                                    @endforeach
	                                </select>
	                            </div>
	                              
	                            <div class="form-group col-sm-6">
              									<label for="opd">Nama OPD</label>
              									<select class="form-control" id="sel2" name="opd" style="text-transform: capitalize;">
                                  @if($satker)
                                  <option style="text-transform: capitalize;" value="{{$satker->kd_satker_sirup}}">{{strtolower($satker->nama)}}</option>
                                  @else
                                  <option value="">-- Pilih salah satu --</option>
                                  @endif
                                  @foreach($satkers as $hasil)
                                  <option style="text-transform: capitalize;" value="{{$hasil->kd_satker_sirup}}">{{strtolower($hasil->nama)}}</option>
                                  @endforeach
              									</select>
	                            </div>

	                            <div class="form-group col-sm-6">
	                                <label for="Kategori">Sumber Dana:</label>
	                                <select class="form-control" id="sel3" name="sumber" style="text-transform: capitalize;">
                                    @if($sumber)
                                    <option style="text-transform: capitalize;" value="{{$sumber}}">{{$sumber}}</option>
                                    @else
                                    <option value="">-- Pilih salah satu --</option>
                                    @endif
                                    @foreach($sumber_danas as $hasil)
                                    <option style="text-transform: capitalize;" value="{{$hasil->nama}}">{{$hasil->nama}}</option>
                                    @endforeach
	                                </select>
	                            </div>

	                            <div class="form-group col-sm-6">
	                                <label for="Kategori">Metode Pengadaan:</label>
	                                <select class="form-control" id="sel4" name="metode" style="text-transform: capitalize;">
                                    @if($metode)
                                    <option style="text-transform: capitalize;" value="{{$metode}}">{{$metode}}</option>
                                    @else
                                    <option value="">-- Pilih salah satu --</option>
                                    @endif
                                    @foreach($metode_lelangs as $hasil)
                                    <option style="text-transform: capitalize;" value="{{$hasil->slug}}">{{$hasil->nama}}</option>
                                    @endforeach
	                                </select>
	                            </div>
	                              
	                            <div class="form-group col-sm-6">
		                            <label for="jenisPengadaan">Jenis Pekerjaan:</label>
		                            <select class="form-control" id="sel5" name="jenisPengadaan" style="text-transform: capitalize;">
                                    @if($jenis)
                                    <option style="text-transform: capitalize;" value="{{$jenis->slug}}">{{$jenis->nama}}</option>
                                    @else
                                    <option value="">-- Pilih salah satu --</option>
                                    @endif
                                    @foreach($jenis_pekerjaans as $hasil)
                                    <option style="text-transform: capitalize;" value="{{$hasil->nama}}">{{$hasil->nama}}</option>
                                    @endforeach
		                            </select>
	                            </div>

	                            <div class="form-group pull-right" style="margin-right: 20px;margin-top: 30px">        
	                                <a href="/proyek" class="btn btn-default" style="background-color: #f0f0f0"><span class="glyphicon glyphicon-refresh"></span> Reset</a>&nbsp;
	                                <button type="submit" class="btn btn-success"><span class="fa fa-filter"></span> Filter</button>
	                            </div>
                    		</form>
                        </div>
                	</div> 
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="notika-status-area">
    <div class="container">
        <div class="row">                
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="notika-shadow sm-res-mg-t-30 tb-res-mg-t-30" style="background-color: white;padding: 25px">
                	<h3><i class="fas fa-chart-bar"></i> Data Kontrak Terbuka Tahun 2020</h3>
                	<hr>
					<div class="table table-responsive">
                    	<table class="table table-striped table-bordered" id="bosdttable" >
                    		<thead class="bg-primary" style="background-color:#59af4b">
                            	<tr>
                              		<th></th>
                          			<th scope="col" style="color: white"><center>Paket</center></th>
                              		<th scope="col" style="color: white"><center>OPD</center></th>
                              		<th scope="col" style="color: white;"><center>Nilai Pagu <br>(Rp)</center></th>
                              		<th scope="col" style="color: white"><center>Sumber Dana</center></th>
                              		<th scope="col" style="color: white"><center>Metode</center></th>
                            	</tr>
                          	</thead>
                          	<tbody>
                          	</tbody>
                      	</table>
                        <div class="preloader">
                          <div class="loading">
                            <img src="/poi2.gif" width="80">
                            <p>Harap Tunggu</p>
                          </div>
                        </div>
                  	</div>
              	</div>
          	</div>
      	</div>
  	</div>
</div>

<br>
<div class="notika-status-area">
	<div class="container">
		<div class="row">
	        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2>Rp. <span class="counter">0</span></h2>
	                    <p>Total Pagu</p>
                    </div>
                    <div class="sparkline-bar-stats2"><i class="fas fa-chart-bar"></i> </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"></span> Paket Pekerjaan</h2>
                        <p>Jumlah Paket Pekerjaan</p>
                    </div>
                    <div class="sparkline-bar-stats3"><i class="fas fa-chart-bar"></i> </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script_tambahan')
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>  

@php
$sample_data = json_encode($datatable);
@endphp

<script>

	$(function() {
	    var jsonData = <?= $sample_data ?>;
	    $('#bosdttable').dataTable({
      "order": [[ 3, "desc" ]],
      "processing" : true,
      dom: 'Bfrtip',
      buttons: ['copy', 'excel', 'pdf', 'csv'],
      "pageLength": 25,
	    "processing" : true,
		data: jsonData,
	        columns: [
	            { data: 'proses' },
	            { data: 'nama_paket' },
	            { data: 'nama_satker' },
	            { data: 'pagu_rup' },
	            { data: 'sumber_dana' },
	            { data: 'metode_pemilihan' }
	        ], 
              columnDefs : [
              {

                "aTargets":[0],
                "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                  if(sData != 0) {
                    $(nTd).css('background-color', '#ff4141')
                  } else {
                    $(nTd).css('background-color', '#faffc6')
                  }
                }
              },
              {
                targets : [0],
                render : function (data, type, full, meta) {
                  var btn = "<a href=\"/proyek/perencanaan/"+jsonData[meta.row]['tahun']+"/"+jsonData[meta.row]['id_rup']+"\" class=\"btn btn-success btn-round btn-xs\" target=\"_blank\"><span class=\"glyphicon glyphicon-plus\"></a></span><span style=\"visibility: hidden;\">"+data+"</span>";
                  return btn;
    
                }
              },
              {
                targets : [3],
                render : function (data, type, row) {
                  var btn = numberWithCommas(data);
                  return btn;
                }
              }]
      });
	});

	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
  $(document).ready(function(){
      $(".preloader").fadeOut();
    })
</script>
@endsection