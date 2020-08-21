@extends ('layouts/mainadmin')

@section('title')List Users - Sistem Informasi Pemantauan Pengadaan Publik @endsection
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
            <h1 class="m-0 text-dark">List Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">List Users</li>
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
          <div class="col-md-8 bg-white p-3">
            <a href="{{route('admin.users.create')}}" class="btn btn-primary"><i class="fas fa-plus text-white"></i> <span class="text-white">Tambah User</span></a>
            <br>
            <br>
            <div class="table table-responsive">
              <table class="table table-striped table-bordered">
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Role</th>
                  <th class="text-center">Action</th>
                </tr>
                @foreach($users as $result)
                <tr>
                  <td class="text-center">{{$loop->iteration}}</td>
                  <td>{{$result->email}}</td>
                  <td>{{$result->name}}</td>
                  <td>
                    @if(isset($result->roles[0]->name))
                    {{$result->roles[0]->name}}
                    @endif
                  </td>
                  <td class="text-center">
                    <a href="{{route('admin.users.edit', $result->id)}}" class="p-2 text-white badge badge-success"><i class="fas fa-edit"></i> Edit</a>
                    <a href="{{route('admin.users.destroy', $result->id)}}" class="p-2 text-white badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                  </td>
                </tr>
                @endforeach
              </table>

              {{$users->links()}}
            </div><!-- responsive -->
          </div><!-- col -->
          <div class="col-md-4">
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