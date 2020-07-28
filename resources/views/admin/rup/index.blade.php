@extends ('layouts/mainadmin')

@section('title')RUP {{$tahun}} - Sistem Informasi Pemantauan Pengadaan Publik @endsection
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
            <h1 class="m-0 text-dark">Rup</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Rup</li>
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
        <div class="row mt-3">
          <div class="col">
            <div class="form-inline">
              <h4 class="text-uppercase mt-3 mr-2" style="display: inline;"><b>Rencana Umum Pengadaan Tahun &nbsp;</b>
                <select class="form-control" style="width: 100px;display: inline;" onchange="changefunction(this)">
                  <option>{{$tahun}}</option>
                  @foreach($tahuns as $hasil)
                  <option>{{$hasil->tahun}}</option>
                  @endforeach
                </select>
              </h4>
              <a href="{{route('admin.rup.create', $tahun)}}" class="btn btn-success mr-2 mt-2"><i class="fas fa-plus"></i> &nbsp;Tambahkan</a>
              <a href="{{route('admin.rup.import', $tahun)}}" class="btn btn-primary mr-2 mt-2"><i class="fas fa-file-import"></i> &nbsp;Import</a>
              <a href="{{route('admin.rup.export', $tahun)}}" class="btn btn-danger mr-2 mt-2"><i class="fas fa-file-export"></i> &nbsp;Eksport</a>
            </div>
            <br>  

            <div class="table-responsive border p-3">
              <table class="table table-striped" id="datarup">
                <thead class="bg-white">
                  <tr>
                    <th class="text-center"></th>
                    <th class="text-center">Nama Paket</th>
                    <th class="text-center">Pagu</th>
                    <th class="text-center">Satuan Kerja</th>
                    <th class="text-center">Jenis Pekerjaan</th>
                    <th class="text-center" style="width: 13%">Action</th>
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
    window.location.replace("/admin/rup/"+idss+"");  
  }
</script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> 

<script type="text/javascript">
  $(document).ready(function() {
    $('#datarup').DataTable({
      processing : true,
      serverSide : true,
      order: [[0, 'asc']],
      ajax : {
        url : "{{route('admin.rup.tahun', $tahun)}}",
        type : 'GET'
      },
      columns: [
        {data:'kdli',name:'kdli'},
        {data:'nama_paket',name:'nama_paket'},
        {data:'pagu_rup',name:'pagu_rup'},
        {data:'nama_satker',name:'nama_satker'},
        {data:'jenis_pengadaan',name:'jenis_pengadaan'},
        {data:'kode_rup',name:'kode_rup'},
      ],
      columnDefs : [
      {
        targets : [0],
        render : function (data, type, row) {
          if (data == 1) {
            var btn = "<i class=\"badge badge-success\"><i class=\"fas fa-check ml-1 pt-1 pb-1\"></i><span style=\"visibility: hidden;\">"+data+"</span></i>";
          }else {
            var btn = "<i class=\"badge badge-danger\"><i class=\"fas fa-times ml-1 pt-1 pb-1\"></i><span style=\"visibility: hidden;\">"+data+"</span></i>";
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
        targets : [5],
        render : function (data, type, row) {
          var btn = "<center><a href=\"/admin/rup/<?= $tahun ?>/"+data+"\" class=\"btn btn-info btn-sm\" target=\"_blank\"><i class=\"fas fa-eye\"> Detail</i></a></center>";
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