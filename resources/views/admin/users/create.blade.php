@extends ('layouts/mainadmin')

@section('title')Tambah user - Sistem Informasi Pemantauan Pengadaan Publik @endsection
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
            <h1 class="m-0 text-dark">Tambah user</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Tambah user</li>
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
          <div class="col-md-7">
            <form action="{{route('admin.users.store')}}" method="post">
              @csrf
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control"  placeholder="isikan email baru">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="name" class="form-control" placeholder="Isikan nama baru">
              </div>
              <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role">
                  @foreach($roles as $hasil)
                  <option value="{{$hasil->id}}" class="text-capitalize">{{$hasil->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="newpassword" class="form-control" placeholder="Masukkan password baru">
              </div>
              <div class="form-group">
                <label>Ulangi Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Ulangi password">
              </div>
              <button class="btn btn-block btn-primary p-3"><b><i class="fas fa-plus"></i> Tambah User</b></button>
            </form>
          </div><!-- col -->
          <div class="col-md-5">
            <a href="/Assets/images/panduanbos.pdf" target="_blank">
                <img src="/Assets/images/posterbos.png" class="img-thumbnail img-fluid">
            </a>
          </div>
        </div><!-- row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script_tambahan')

@endsection