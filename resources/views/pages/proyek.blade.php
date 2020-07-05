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
	                                </select>
	                            </div>
	                              
	                            <div class="form-group col-sm-6">
									<label for="opd">Nama OPD</label>
									<select class="form-control" id="sel2" name="opd">

									</select>
	                            </div>

	                            <div class="form-group col-sm-6">
	                                <label for="Kategori">Sumber Dana:</label>
	                                <select class="form-control" id="sel3" name="sumber">
	                                </select>
	                            </div>

	                            <div class="form-group col-sm-6">
	                                <label for="Kategori">Metode Pengadaan:</label>
	                                <select class="form-control" id="sel4" name="metode">
	                                </select>
	                            </div>
	                              
	                            <div class="form-group col-sm-6">
		                            <label for="jenisPengadaan">Jenis Pekerjaan:</label>
		                            <select class="form-control" id="sel5" name="jenisPengadaan">
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
                	<h3>Data Kontrak Terbuka Tahun 2020</h3>
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
                    <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"></span> Paket Pekerjaan</h2>
                        <p>Jumlah Paket Pekerjaan</p>
                    </div>
                    <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script_tambahan')
<script type="text/javascript" src="/Assets/datatables/bootstrap.min.js"></script>  
<script src="/Assets/datatables/jquery.min.js"></script>  
<link rel="stylesheet" type="text/css" href="/Assets/datatables/datatables.min.css"/>  
<script type="text/javascript" src="/Assets/datatables/datatables.min.js"></script>
@php
$sample_data = json_encode($datatable);
@endphp

<script>

	$(function() {
	    var jsonData = <?= $sample_data ?>;
	    $('#bosdttable').dataTable({
	    "processing" : true,
		data: jsonData,
	        columns: [
	            { data: 'id_rup' },
	            { data: 'nama_paket' },
	            { data: 'nama_satker' },
	            { data: 'total_pagu' },
	            { data: 'sumber_dana_str' },
	            { data: 'metode_str' }
	        ], 
	    	columnDefs : [
	      	{
	        	targets : [0],
	        	render : function (data, type, row) {
		          	var btn = "<a href=\"/proyek/detail?tahun=2020&kode="+data+"\" class=\"btn btn-success btn-round btn-xs\" target=\"_blank\"><span class=\"glyphicon glyphicon-plus\"></span></a>";
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
</script>
@endsection