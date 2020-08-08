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
            <h1 class="m-0 text-dark">Add Progress</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item"><a href="/progress">Progress</a></li>
              <li class="breadcrumb-item active">Add</li>
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
            @if($progres)
              <a class="btn btn-primary text-light mb-3" href="/admin/rup/{{$tahun}}/{{$progres->ocid}}" target="_blank"><span class="fa fa-arrow-right"></span> Lihat Informasi Paket</a>
            @endif
            <br>
            <form action="{{route('admin.progress.store')}}" method="POST">
              @csrf
              <input type="hidden" name="ocid" value="{{$ocid}}">
              <input type="hidden" name="tahun" value="{{$tahun}}">
              <input type="hidden" name="id_user" value="{{$user->id}}">

              <div class="row">
                <div class="col">
                  <div class="form-group bg-white card mb-3 py-3 border-bottom-primary">
                    <div class="col-md-9 col-sm-12">
                      <label class="radio-inline ml-1" for="anonim">
                      <input type="radio" name="anonim" value="0" checked> &nbsp;Tampilkan Nama
                    </label>
                    <label class="radio-inline ml-3">
                      <input type="radio" name="anonim" value="1"> &nbsp;Anonim
                    </label>
                    </div>
                  </div>
                </div><!-- col -->
              </div><!-- row -->
              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-3 border-bottom-primary" style="padding: 20px">
                    <h6>Foto 1</h6>
                    <div class="form-group mb-3">
                      <div class="row"> 
                        <div class="col-sm-4">
                          @if($progres1)
                          <img src="/Assets/proyek/images/pelaksanaan/{{$progres1->images}}" class="img-fluid img-thumbnail mb-2 mb-2">
                          @else
                          <img src="/Assets/proyek/images/pelaksanaan/kosong.png" class="img-fluid img-thumbnail mb-2 mb-2">
                          @endif
                        </div><!-- col -->
                        <div class="col-sm-8">
                          <input type="file" class="form-control" name="image1">
                          @if($progres1)
                          <label class="mt-2">Tanggal</label>
                          <input type="date" class="form-control" name="tanggal1"  value="{{$progres1->tanggal}}">
                          <label class="mt-2">Keterangan</label>
                          <textarea class="form-control" name="keterangan1" style="height:90px" placeholder="isikan keterangan terkait gambar">{{$progres1->tanggal}}</textarea>
                          @else
                          <label class="mt-2">Tanggal</label>
                          <input type="date" class="form-control" name="tanggal1"  value="{{date('Y-m-d')}}">
                          <label class="mt-2">Keterangan</label>
                          <textarea class="form-control" name="keterangan1" style="height:90px" placeholder="isikan keterangan terkait gambar"></textarea>
                          @endif
                        </div><!-- col -->
                      </div><!-- row -->
                    </div><!-- form group -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-md-6">
                  <div class="card mb-3 border-bottom-primary" style="padding: 20px">
                    <h6>Foto 2</h6>
                    <div class="form-group mb-3">
                      <div class="row"> 
                        <div class="col-sm-4">
                          @if($progres2)
                          <img src="/Assets/proyek/images/pelaksanaan/{{$progres2->images}}" class="img-fluid img-thumbnail mb-2 mb-2">
                          @else
                          <img src="/Assets/proyek/images/pelaksanaan/kosong.png" class="img-fluid img-thumbnail mb-2 mb-2">
                          @endif
                        </div><!-- col -->
                        <div class="col-sm-8">
                          <input type="file" class="form-control" name="image2">
                          @if($progres2)
                          <label class="mt-2">Tanggal</label>
                          <input type="date" class="form-control" name="tanggal2"  value="{{$progres2->tanggal}}">
                          <label class="mt-2">Keterangan</label>
                          <textarea class="form-control" name="keterangan2" style="height:90px" placeholder="isikan keterangan terkait gambar">{{$progres2->tanggal}}</textarea>
                          @else
                          <label class="mt-2">Tanggal</label>
                          <input type="date" class="form-control" name="tanggal2"  value="{{date('Y-m-d')}}">
                          <label class="mt-2">Keterangan</label>
                          <textarea class="form-control" name="keterangan2" style="height:90px" placeholder="isikan keterangan terkait gambar"></textarea>
                          @endif
                        </div><!-- col -->
                      </div><!-- row -->
                    </div><!-- form group -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-md-6">
                  <div class="card mb-3 border-bottom-primary" style="padding: 20px">
                    <h6>Foto 3</h6>
                    <div class="form-group mb-3">
                      <div class="row"> 
                        <div class="col-sm-4">
                          @if($progres3)
                          <img src="/Assets/proyek/images/pelaksanaan/{{$progres3->images}}" class="img-fluid img-thumbnail mb-2 mb-2">
                          @else
                          <img src="/Assets/proyek/images/pelaksanaan/kosong.png" class="img-fluid img-thumbnail mb-2 mb-2">
                          @endif
                        </div><!-- col -->
                        <div class="col-sm-8">
                          <input type="file" class="form-control" name="image3">
                          @if($progres3)
                          <label class="mt-2">Tanggal</label>
                          <input type="date" class="form-control" name="tanggal3"  value="{{$progres3->tanggal}}">
                          <label class="mt-2">Keterangan</label>
                          <textarea class="form-control" name="keterangan3" style="height:90px" placeholder="isikan keterangan terkait gambar">{{$progres3->tanggal}}</textarea>
                          @else
                          <label class="mt-2">Tanggal</label>
                          <input type="date" class="form-control" name="tanggal3"  value="{{date('Y-m-d')}}">
                          <label class="mt-2">Keterangan</label>
                          <textarea class="form-control" name="keterangan3" style="height:90px" placeholder="isikan keterangan terkait gambar"></textarea>
                          @endif
                        </div><!-- col -->
                      </div><!-- row -->
                    </div><!-- form group -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-md-6">
                  <div class="card mb-3 border-bottom-primary" style="padding: 20px">
                    <h6>Foto 4</h6>
                    <div class="form-group mb-3">
                      <div class="row"> 
                        <div class="col-sm-4">
                          @if($progres4)
                          <img src="/Assets/proyek/images/pelaksanaan/{{$progres4->images}}" class="img-fluid img-thumbnail mb-2 mb-2">
                          @else
                          <img src="/Assets/proyek/images/pelaksanaan/kosong.png" class="img-fluid img-thumbnail mb-2 mb-2">
                          @endif
                        </div><!-- col -->
                        <div class="col-sm-8">
                          <input type="file" class="form-control" name="image4">
                          @if($progres4)
                          <label class="mt-2">Tanggal</label>
                          <input type="date" class="form-control" name="tanggal4"  value="{{$progres4->tanggal}}">
                          <label class="mt-2">Keterangan</label>
                          <textarea class="form-control" name="keterangan4" style="height:90px" placeholder="isikan keterangan terkait gambar">{{$progres4->tanggal}}</textarea>
                          @else
                          <label class="mt-2">Tanggal</label>
                          <input type="date" class="form-control" name="tanggal4"  value="{{date('Y-m-d')}}">
                          <label class="mt-2">Keterangan</label>
                          <textarea class="form-control" name="keterangan4" style="height:90px" placeholder="isikan keterangan terkait gambar"></textarea>
                          @endif
                        </div><!-- col -->
                      </div><!-- row -->
                    </div><!-- form group -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col">
                  <button type="submit" class="btn btn-danger btn-block btn-lg"><i class="fa fa-upload"></i>&nbsp;&nbsp; Upload</button>
                  <br>
                  <br>
                  <br>
                </div>
              </div><!-- row -->
            </form>
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script_tambahan')

@endsection