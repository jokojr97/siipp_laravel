@extends ('layouts/mainadmin')

@section('title', 'Import Peserta - Sistem Informasi Pemantauan Pengadaan Publik')
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
            <h1 class="m-0 text-dark">Import Peserta</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Import</li>
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
          <div class="col-sm-8">
            <form method="post" action="{{route('admin.peserta.importdata')}}" enctype="multipart/form-data">
              <div class="form-inline">
                @csrf
                <label>Pilih file excel</label>
                <div class="form-group ml-3">
                  <select name="tahun" class="form-control" onchange="changefunction(this)">
                    <option>{{$tahun}}</option>
                    @foreach($tahuns as $hsl)
                    <option>{{$hsl->tahun}}</option>
                    @endforeach
                  </select>
                  <input type="file" name="file" required="required" class="form-control ml-2">
                </div><!-- form group -->
                <div class="float-right ml-2">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-file-import"></i> &nbsp;Import</button>
                </div>
              </div><!-- form inline -->
            </form><!-- form -->
          </div><!-- col -->
        </div><!-- row -->
        <div class="row">
          <div class="col">
            <br>
            <h4 class="text-uppercase mt-3 mr-2" style="display: inline;"><b>Import Peserta</b></h4>
            <hr class="mt-2">
            <div class="table-responsive border p-3">
              <table class="table table-striped" id="datapeserta">
                <thead class="bg-white">
                  <tr>
                    <th class="text-center">Peserta</th>
                    <th class="text-center">NPWP</th>
                    <th class="text-center">Paket Pekerjaan</th>
                    <th class="text-center">Penawaran</th>
                    <th class="text-center" style="width: 13%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tenders as $result)
                  <tr>
                    <td>{{$result->peserta}}</td>
                    <td class="text-center">{{$result->npwp}}</td>
                    <td class="text-center">
                      @if($result->paket)
                      {{$result->paket->nama_paket}}
                      @endif
                    </td>
                    <td class="text-center">
                      @if($result->penawaran)
                      {{$result->penawaran}}
                      @else
                      {{0}}
                      @endif
                    </td>
                    <td>
                      <a href="/admin/tender/{{$result->tahun}}/{{$result->kode_tender}}" class="btn btn-info btn-sm mb-1" target="_blank"><i class="fas fa-eye"></i></a>
                      <a href="/admin/tender/{{$result->tahun}}/{{$result->kode_tender}}/edit" class="btn btn-success btn-sm mb-1" target="_blank"><i class="fas fa-edit"></i></a>
                      <a href="#" class="btn btn-danger btn-sm mb-1" target="_blank"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="float-right">
                {{$tenders->links()}}
              </div>
            </div><!-- table responsive -->
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
    window.location.replace("/admin/peserta/import/"+idss+"");  
  }
</script>
<!-- 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>  

<script type="text/javascript">
  $(document).ready(function() {
    $('#datapeserta').DataTable();
  });
</script> -->
@endsection