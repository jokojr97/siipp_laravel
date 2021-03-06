@extends ('layouts/mainproyek')

@section('title')Diikuti {{$ikuts[0]->peserta}} -  @endsection
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
              <h4 class="text-uppercase mt-3 mr-2 text-hijau" style="display: inline;"><b><i class="fas fa-briefcase"></i> Lelang yang diikuti {{$ikuts[0]->peserta}} tahun {{$tahun}} </b>
              </h4>
				<hr>
				<div class="table table-responsive">
	              <table class="table table-striped" id="datarup">
	                <thead class="bg-success">
	                  <tr>
	                    <th class="text-center text-white border"></th>
	                    <th class="text-center text-white border">Paket</th>
	                    <th class="text-center text-white border">OPD</th>
	                    <th class="text-center text-white border">Pagu (Rp.)</th>
	                    <th class="text-center text-white border">Sumber Dana</th>
	                    <th class="text-center text-white border">Metode</th>
	                  </tr>
	                </thead>
	                <tbody class="bg-white">
	                	@foreach($ikuts as $result)
	                	@if($result->paket)
	                	<tr>
	                		<td><a href="{{route('proyek.perencanaan', ['tahun' => $tahun, 'ocid' => $result->paket->kode_rup])}}" class="badge badge-success p-2"><i class="fas fa-plus"></i> Detail</a></td>
	                		<td>{{$result->paket->nama_paket}}</td>
	                		<td>{{$result->paket->nama_satker}}</td>
	                		<td><?php $duit = $result->paket->pagu_rup; echo number_format((float)"$duit",0,",",",") ?></td>
	                		<td>{{$result->paket->sumber_dana}}</td>
	                		<td>{{$result->paket->metode_pemilihan}}</td>
	                	</tr>
	                	@endif
	                	@endforeach
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
      dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
    });
 });
</script>
@endsection