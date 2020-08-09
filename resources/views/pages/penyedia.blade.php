@extends ('layouts/mainproyek')

@section('title')Penyedia {{$tahun}} -  @endsection
@section('metadeskription', 'Aplikasi Keterbukaan Data dan Informasi Seluruh Proses Pengadaan Barang dan Jasa di Lingkungan Pemerintah Kabupaten Bojonegoro.')
@section('metakeywords', 'siipp, open data kontrak, bojonegoro, bos, bojonegoro open system')
@section('thumbnail', 'thumbnail.png')

@section('container')
<section class="ftco-section ftco-no-pt bg-light">
	<br>
	<div class="container">
		<br>
		
		<div class="row bg-white p-3">
			<div class="col">
              <h4 class="text-uppercase mt-3 mr-2 text-hijau" style="display: inline;"><b><i class="fas fa-users"></i> Peserta Lelang Tahun &nbsp;</b>
                <select class="form-control" style="width: 100px;display: inline;color: black" onchange="changefunction(this)">
                  <option><b>{{$tahun}}</b></option>
                  @foreach($tahuns as $hasil)
                  <option>{{$hasil->tahun}}</option>
                  @endforeach
                </select>
              </h4>
				<hr>
				<div class="table table-responsive">
	              <table class="table table-striped" id="datarup">
	                <thead class="bg-success">
	                  <tr>
	                    <th class="text-center text-white border">Nama Penyedia</th>
	                    <th class="text-center text-white border">NPWP</th>
	                    <th class="text-center text-white border">Alamat</th>
	                    <th class="text-center text-white border">Ikut Lelang</th>
	                    <th class="text-center text-white border">Jumlah Menang</th>
	                    <th class="text-center text-white border">Menang Berkontrak</th>
	                    <th class="text-center text-white border">Total Nilai Kontrak(Rp.)</th>
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
    window.location.replace("/proyek/penyedia/"+idss+"");  
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
      pageLength: 15,
      order: [[3, 'desc']],
      ajax : {
        url : "{{route('proyek.penyedia.index', ['tahun' => $tahun])}}",
        type : 'GET'
      },
      columns: [
        {data:'peserta',name:'peserta'},
        {data:'npwp',name:'npwp'},
        {data:'alamat',name:'alamat'},
        {data:'ikutlelang',name:'ikutlelang'},
        {data:'menang',name:'menang'},
        {data:'kontrak',name:'kontrak'},
        {data:'nilaikontrak',name:'nilaikontrak'},
      ], columnDefs : [
      {
        targets : [6],
        render : function (data, type, row) {
          var btn = numberWithCommas(data);
          return btn;
        }
      },
      {
        targets : [3],
        render : function (data, type, row) {
          var btn = "<center><a href=\"/proyek/penyedia/ikutlelang/<?= $tahun ?>/"+row['npwp']+"\" target=\"_blank\">"+data+"</a></center>";
          return btn;
        }
      },
      {
        targets : [4],
        render : function (data, type, row) {
          var btn = "<center><a href=\"/proyek/penyedia/menang/<?= $tahun ?>/"+row['npwp']+"\" target=\"_blank\">"+data+"</a></center>";
          return btn;
        }
      },
      {
        targets : [5],
        render : function (data, type, row) {
          var btn = "<center><a href=\"/proyek/penyedia/kontrak/<?= $tahun ?>/"+row['npwp']+"\" target=\"_blank\">"+data+"</a></center>";
          return btn;
        }
      },

      ],
    });

    function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

} );
</script>
@endsection