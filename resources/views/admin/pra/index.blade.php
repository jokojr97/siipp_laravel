@extends ('layouts/mainadmin')

@section('title')Potensi Korupsi Tahun {{$tahun}} - Sistem Informasi Pemantauan Pengadaan Publik @endsection
@section('metadeskription', '')
@section('metakeywords', '')

@section('container')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Potensi Korupsi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Potensi Korupsi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <hr>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
            @endif
            @if(session('failed'))
            <div class="alert alert-danger" role="alert">
              {{ session('failed') }}
            </div>
            @endif
          </div><!-- col -->
        </div><!-- row -->
        <div class="row">
          <div class="col">
            <div class="form-inline">
              <h4 class="text-uppercase mt-3 mr-2" style="display: inline;"><b>Potensi Korupsi Tahun &nbsp;</b>
                <select class="form-control" style="width: 100px;display: inline;" onchange="changefunction(this)">
                  <option>{{$tahun}}</option>
                  @foreach($tahuns as $hasil)
                  <option>{{$hasil->tahun}}</option>
                  @endforeach
                </select>
                <a href="{{route('admin.pra.sync', $tahun)}}" class="btn btn-info ml-2"><i class="fas fa-sync"></i> &nbsp;Sinkronisasi</a>

              </h4>
            </div>
            <br>  

            <div class="table-responsive border p-3">
              <table class="table table-striped" id="datapra">
                <thead class="bg-secondary">
                  <tr>
                    <!-- <th class="text-center">No</th> -->
                    <th class="text-center">Nama Paket</th>
                    <th class="text-center">Penyedia</th>
                    <th class="text-center">Nilai Kontrak</th>
                    <th class="text-center">NKT</th>
                    <th class="text-center">P</th>
                    <th class="text-center">S</th>
                    <th class="text-center">Q</th>
                    <th class="text-center">W</th>
                    <th class="text-center">Total</th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                  @foreach($tenders as $result)

                    <tr>
                      <td><a href="#">{{$result->nama_paket}}</a></td>
                      <td>{{$result->nama_pemenang}}</td>
                      <td> <?=number_format((float)"$result->hasil_negosiasi",0,",","."); ?></td>
                      <td class="text-center">{{$result->potensi->nkt}}</td>
                      <td class="text-center">{{$result->potensi->p}}</td>
                      <td class="text-center">{{$result->potensi->s}}</td>
                      <td class="text-center">{{$result->potensi->q}}</td>
                      <td class="text-center">{{$result->potensi->w}}</td>
                      @if($result->potensi->total >= 15)                      
                      <td class="text-center bg-red">{{$result->potensi->total}}</td>
                      @elseif($result->potensi->total >= 10 && $result->potensi->total < 15)
                      <td class="text-center bg-warning">{{$result->potensi->total}}</td>
                      @else
                      <td class="text-center bg-success">{{$result->potensi->total}}</td>                      
                      @endif

                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- table responsive -->
            <br>
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script_tambahan')
<script type="text/javascript">
  function changefunction(id) {
    var idss = id.value;
    window.location.replace("/admin/peserta/"+idss+"");  
  }
</script>

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>   -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>  

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>  

<script type="text/javascript">
  $(document).ready(function() {
    $('#datapra').DataTable({
      dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        order: [[8, 'desc']],
    });

  });
</script>
@endsection