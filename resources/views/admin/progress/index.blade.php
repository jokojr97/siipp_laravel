@extends ('layouts/mainadmin')

@section('title')Progress {{$tahun}} - Sistem Informasi Pemantauan Pengadaan Publik @endsection
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
            <h1 class="m-0 text-dark">Progress</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Progress</li>
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
              <h4 class="text-uppercase mt-3 mr-2" style="display: inline;"><b>Progress Pekerjaan Tahun &nbsp;</b>
                <select class="form-control" style="width: 100px;display: inline;" onchange="changefunction(this)">
                  <option>{{$tahun}}</option>
                  @foreach($tahuns as $hasil)
                  <option>{{$hasil->tahun}}</option>
                  @endforeach
                </select>
              </h4>
            </div>
            <br>  

            <div class="table-responsive border p-3">
              <table class="table table-striped" id="datatabel">
                <thead class="bg-secondary">
                  <tr>
                    <!-- <th class="text-center">No</th> -->
                    <th class="text-center">Nama Paket</th>
                    <th class="text-center">Pagu</th>
                    <th class="text-center">Satuan Kerja</th>
                    <th class="text-center">Jenis Pekerjaan</th>
                    <th class="text-center" style="width: 15%">Action</th>
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
    window.location.replace("/admin/progress/"+idss+"");  
  }
</script>

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>   -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>  

<script type="text/javascript">
  $(document).ready(function() {
    $('#datatabel').DataTable({
      processing : true,
      serverSide : true,
      order: [[0, 'asc']],
      ajax : {
        url : "{{route('admin.progress.tahun', $tahun)}}",
        type : 'GET'
      },
      columns: [
        {data:'nama_paket',name:'nama_paket'},
        {data:'pagu',name:'pagu'},
        {data:'satker',name:'satker'},
        {data:'kategori',name:'kategori'},
        {data:'id_rup',name:'id_rup'},
      ],
      columnDefs : [
      {
        targets : [1],
        render : function (data, type, row) {
          var btn = numberWithCommas(data);
          return btn;
        }
      },
      {
        targets : [4],
        render : function (data, type, row) {
          var btn = "<a href=\"/admin/progress/<?= $tahun ?>/"+data+"\" class=\"btn btn-success btn-sm\"><i class=\"fas fa-plus\"> Lihat Progress</i></a>";
          return btn;
        }
      }

      ],
    });

    function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
  });
</script>
@endsection