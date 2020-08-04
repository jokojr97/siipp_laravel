@extends ('layouts/mainadmin')

@section('title')Peserta Lelang {{$tahun}} - Sistem Informasi Pemantauan Pengadaan Publik @endsection
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
            <h1 class="m-0 text-dark">Peserta Lelang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Peserta Lelang</li>
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
              <h4 class="text-uppercase mt-3 mr-2" style="display: inline;"><b>Peserta Lelang Tahun &nbsp;</b>
                <select class="form-control" style="width: 100px;display: inline;" onchange="changefunction(this)">
                  <option>{{$tahun}}</option>
                  @foreach($tahuns as $hasil)
                  <option>{{$hasil->tahun}}</option>
                  @endforeach
                </select>
              </h4>
              <a href="{{route('admin.peserta.sync', $tahun)}}" class="btn btn-info mr-2 mt-2"><i class="fas fa-sync"></i> &nbsp;Sinkronisasi</a>
              <a href="{{route('admin.peserta.import', $tahun)}}" class="btn btn-primary mr-2 mt-2"><i class="fas fa-file-import"></i> &nbsp;Import</a>
              <a href="{{route('admin.peserta.export', $tahun)}}" class="btn btn-danger mr-2 mt-2"><i class="fas fa-file-export"></i> &nbsp;Eksport</a>              
            </div>
            <br>  

            <div class="table-responsive border p-3">
              <table class="table table-striped" id="datapeserta">
                <thead class="bg-secondary">
                  <tr>
                    <!-- <th class="text-center">No</th> -->
                    <th class="text-center">Peserta</th>
                    <th class="text-center">NPWP</th>
                    <th class="text-center">Paket Pekerjaan</th>
                    <th class="text-center">Penawaran</th>
                    <th class="text-center" style="width: 10%">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                  
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#datapeserta').DataTable({
      processing : true,
      serverSide : true,
      order: [[0, 'asc']],
      ajax : {
        url : "{{route('admin.peserta.tahun', $tahun)}}",
        type : 'GET'
      },
      columns: [
        {data:'peserta',name:'peserta'},
        {data:'npwp',name:'npwp'},
        {data:'nama_paket',name:'nama_paket'},
        {data:'penawaran',name:'penawaran'},
        {data:'ocid',name:'ocid'},
      ],
      columnDefs : [
      {
        targets : [4],
        render : function (data, type, row) {
          var btn = "<a href=\"/admin/tender/<?= $tahun ?>/"+data+"\" class=\"btn btn-info btn-sm\"><i class=\"fas fa-eye\"> Detail</i></a>";
          return btn;
        }
      }

      ],
    });
  });
</script>
@endsection