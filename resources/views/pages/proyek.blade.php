@extends ('layouts/mainproyek')

@section('title', 'Data Proyek - ')
@section('metadeskription', 'Aplikasi Keterbukaan Data dan Informasi Seluruh Proses Pengadaan Barang dan Jasa di Lingkungan Pemerintah Kabupaten Bojonegoro.')
@section('metakeywords', 'siipp, open data kontrak, bojonegoro, bos, bojonegoro open system')
@section('thumbnail', 'thumbnail.png')

@section('container')
<section class="ftco-section ftco-no-pt bg-light">
	<br>
	<div class="container">
		<div class="row bg-white p-3">
			<div class="col">
				<h5 class="text-hijau"><b><i class="fas fa-filter"></i> Filter</b></h5>
				<hr>
				<form action="/proyek" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6">
						    <div class="form-group">
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
						</div>		

						<div class="col-md-6">
	                        <div class="form-group">
								<label for="opd">Nama OPD</label>
								<select class="form-control text-capitalize" id="sel2" name="opd">
									@if($satker)
									<option  class="text-capitalize" value="{{$satker->kd_satker_sirup}}">{{strtolower($satker->nama)}}</option>
									@else
									<option  class="text-capitalize" value="">-- Pilih salah satu --</option>
									@endif
									@foreach($satkers as $hasil)
									<option  class="text-capitalize" value="{{$hasil->kd_satker_sirup}}">{{strtolower($hasil->nama)}}</option>
									@endforeach
									<option  class="text-capitalize" value="">-- Semua --</option>
								</select>
	                        </div>
						</div>

						<div class="col-md-6">						
	                        <div class="form-group">
	                            <label for="Kategori">Sumber Dana:</label>
	                            <select class="form-control text-capitalize" id="sel3" name="sumber">
	                            @if($sumber)
	                            <option class="text-capitalize" value="{{$sumber}}">{{$sumber}}</option>
	                            @else
	                            <option class="text-capitalize" value="">-- Pilih salah satu --</option>
	                            @endif
	                            @foreach($sumber_danas as $hasil)
	                            <option class="text-capitalize" value="{{$hasil->nama}}">{{$hasil->nama}}</option>
	                            @endforeach
	                            <option class="text-capitalize" value="">-- Semua --</option>
	                            </select>
	                        </div>
						</div>

						<div class="col-md-6">	
						    <div class="form-group">
						        <label for="Kategori">Metode Pengadaan:</label>
						        <select class="form-control text-capitalize" id="sel4" name="metode">
						          @if($metode)
						          <option value="{{$metode->slug}}">{{$metode->nama}}</option>
						          @else
						          <option value="">-- Pilih salah satu --</option>
						          @endif
						          @foreach($metode_lelangs as $hasil)
						          <option value="{{$hasil->slug}}">{{$hasil->nama}}</option>
						          @endforeach
						          <option value="">-- Semua --</option>
						        </select>
						    </div>
						</div>

						<div class="col-md-6">
						    <div class="form-group">
						      <label for="jenisPengadaan">Jenis Pekerjaan:</label>
						      <select class="form-control text-capitalize" id="sel5" name="jenispengadaan">
						          @if($jenis)
						          <option value="{{$jenis->slug}}">{{$jenis->nama}}</option>
						          @else
						          <option value="">-- Pilih salah satu --</option>
						          @endif
						          @foreach($jenis_pekerjaans as $hasil)
						          <option value="{{$hasil->slug}}">{{$hasil->nama}}</option>
						          @endforeach
						          <option value="">-- Semua --</option>
						      </select>
						    </div>
						</div>
						<div class="col-md-6">
							<br>
							<div class="pt-3 float-right">
					        	<a href="/proyek" class="btn btns btn-default btn-lg " style="border: 1px solid gray"><span class="fas fa-refresh"></span> Reset</a>&nbsp;
					        	<button type="submit" class="btn btn-success ml-1"><span class="fas fa-filter"></span> Filter</button>
							</div>
						</div>
					</div>
				</form>
			</div>		
		</div>
		<br>

		<div class="row bg-white p-3">
			<div class="col">
				<h5 class="text-hijau"><b><i class="fas fa-briefcase"></i> Data Kontrak Tahun {{$tahun}}</b></h5>
				<hr>
				<div class="table table-responsive">
	              <table class="table table-striped" id="datarup">
	                <thead class="bg-success">
	                  <tr>
	                    <th class="text-center text-white border" style="width: 8%"></th>
	                    <th class="text-center text-white border" style="width: 30%">Nama Paket</th>
	                    <th class="text-center text-white border" style="width: 15%">Pagu (Rp)</th>
	                    <th class="text-center text-white border" style="width: 30%">Satuan Kerja</th>
	                    <th class="text-center text-white border" style="width: 12%">Jenis Pekerjaan</th>
	                    <th class="text-center text-white border" style="width: 5%">Proses</th>
	                  </tr>
	                </thead>
	                <tbody class="bg-white">
	                </tbody>
	              </table>
				</div>
			</div>		
		</div>
	</div>
</section>

@endsection

@section('script_tambahan')
<script type="text/javascript">
  function changefunction(id) {
    var idss = id.value;
    window.location.replace("/admin/rup/"+idss+"");  
  }
</script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> 

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>  


<script type="text/javascript">

  $(document).ready(function() {
    $('#datarup').DataTable({
      processing : true,
      serverSide : true,
      dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      pageLength: 25,
      order: [[5	, 'desc']],
      ajax : {
        url : "{{route('proyek.rup')}}",
        type : 'GET'
      },
      columns: [
        {data:'kode_rup',name:'kode_rup'},
        {data:'nama_paket',name:'nama_paket'},
        {data:'pagu_rup',name:'pagu_rup'},
        {data:'nama_satker',name:'nama_satker'},
        {data:'jenis_pengadaan',name:'jenis_pengadaan'},
        {data:'kdli',name:'kdli'},
      ],
      columnDefs : [
      {
        targets : [5],
        render : function (data, type, row) {
          if (data == 1) {
            var btn = "<center><i class=\"badge badge-success\"><i class=\"fas fa-check ml-2 pt-1 pb-1\"></i></i> <span style=\"visibility: hidden;\">"+data+"</span></center>";
          }else {
            var btn = "<center><i class=\"badge badge-danger\"><i class=\"fas fa-times ml-2 pt-1 pb-1\"></i><span style=\"visibility: hidden;\">"+data+"</span></i></center>";
          }
          return btn;
        }
      },
      {
        targets : [2],
        render : function (data, type, row) {
          var btn = numberWithCommas(data);
          return btn;
        }
      },
      {
        targets : [0],
        render : function (data, type, row) {
          var btn = "<center><i class=\"badge badge-success p-2\"><a href=\"/proyek/perencanaan/<?= $tahun ?>/"+data+"\" class=\"text-white\" target=\"_blank\"><i class=\"fas fa-arrow-right\"></i> Detail</i></a></center>";
          return btn;
        }
      }

      ],
    });

    function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

} );
</script>
@endsection