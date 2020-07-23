@extends ('layouts/mainadmin')

@section('title', 'Rup - Sistem Informasi Pemantauan Pengadaan Publik')
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
        <div class="row mt-3">
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
            <div class="form-inline">
              <h4 class="text-uppercase mt-3 mr-2" style="display: inline;"><b>Rencana Umum Pengadaan Tahun &nbsp;</b>
                <select class="form-control" style="width: 100px;display: inline;" onchange="changefucntion(this)">
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

              <form action="#" method="POST">
                @csrf

                <div class="form-group form-row">
                  <label for="inputPassword" class="col-sm-1 col-form-label">Sort By</label>
                  <div class="col-sm-2">
                    <select class="form-control">
                      <option>Nama</option>
                      <option>Satuan kerja</option>
                      <option>Sumber dana</option>
                      <option>Metode</option>
                      <option>Jenis Pengadaan</option>
                    </select>
                  </div>
                  <div class="col-sm-3">&nbsp;</div>
                  <label for="inputPassword" class="col-sm-1 col-form-label">Search</label>
                  <div class="col-sm-4 col-9">
                    <select class="form-control">
                      <option>Nama</option>
                      <option>Satuan kerja</option>
                      <option>Sumber dana</option>
                      <option>Metode</option>
                      <option>Jenis Pengadaan</option>
                    </select>
                  </div>
                  <div class="col-sm-1 col-2">
                    <button type="submit" class="btn btn-secondary">Search</button>
                  </div>
                </div>
              </form>
            <div class="table-responsive border">
              <table class="table table-striped">
                <thead class="bg-white">
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Paket</th>
                    <th class="text-center">Satuan Kerja</th>
                    <th class="text-center">Sumber Dana</th>
                    <th class="text-center">Metode</th>
                    <th class="text-center">Jenis Pekerjaan</th>
                    <th class="text-center" style="width: 13%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($rups as $result)
                  <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$result->nama_paket}}</td>
                    <td>{{$result->nama_satker}}</td>
                    <td>{{$result->sumber_dana}}</td>
                    <td>{{$result->metode_pemilihan}}</td>
                    <td>
                      @php
                      $jenis = $result->jenis_pengadaan;
                      $jenis = explode(";", $jenis);
                      $jml_jenis = count($jenis) - 1;
                      $jenis = $jenis[$jml_jenis];
                      echo $jenis;
                      @endphp
                    </td>
                    <td>
                      <a href="/admin/rup/{{$result->tahun}}/{{$result->kode_rup}}" class="btn btn-info btn-sm mb-1" target="_blank"><i class="fas fa-eye"></i></a>
                      <a href="/admin/rup/{{$result->tahun}}/{{$result->kode_rup}}/edit" class="btn btn-success btn-sm mb-1" target="_blank"><i class="fas fa-edit"></i></a>
                      <a href="#" class="btn btn-danger btn-sm mb-1" target="_blank"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="float-sm-right">
                <h6>{{$rups->links()}}</h6>
              </div>
            </div>
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
@endsection