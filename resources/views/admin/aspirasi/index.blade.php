@extends ('layouts/mainadmin')

@section('title')Aspirasi - Sistem Informasi Pemantauan Pengadaan Publik @endsection
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
            <h1 class="m-0 text-dark">Aspirasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Aspirasi</li>
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
          <div class="col-md-8 col-12 p-3">
            <h4 class="text-uppercase mt-3 mr-2" style="display: inline;"><b>Aspirasi Publik</b></h4>
            <hr class="mt-2">
              @foreach($aspirasi as $result)
              <div class="card mb-0 p-0 bg-light border">
                <div class="card-body mb-0 pb-0">
                    <p class="text-p text-capitalize"><?php echo strtolower($result->satkers->nama) ?></p>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-2 col-md-1">
                      <div>
                        @if($result->jenis_kelamin == "Perempuan")
                        <img src="/Assets/images/img_avatar4.png" style="border-radius: 50%;min-width: 50px;max-width: 55px" class="img-responsive">
                        @else
                            <img src="/Assets/images/img_avatar2.png" style="border-radius: 50%;" class="img-fluid">
                        @endif
                      </div>
                    </div><!-- col -->
                    <div class="col-10 col-md-8">
                      <h6 class="text-capitalize mb-0 mt-2 text-black"><b>
                        @if($result->anonim == 1)
                        Anonim
                        @else
                        {{ $result->pengirim }}
                        @endif</b>
                        <small>
                          &nbsp;&nbsp;(<?= substr($result->no_hp, 0, -6) . 'XXXXXX'; ?>)&nbsp;&nbsp;
                          @if($result->status == 0)
                          <span class=" badge badge-success p-1" style="margin-top: -5px">Warga</span>
                          @else
                          <span class=" badge badge-danger p-1" style="margin-top: -5px">Admin</span>
                          @endif
                        </small>
                      </h6>     

                      @if($result->rups)
                        <a href="/proyek/{{$result->tahaps->methodname}}/{{ $result->tahun_anggaran }}/{{$result->ocid}}" class="text-p" target="_blank"><?= substr($result->rups->nama_paket, 0, 80)."..." ?></a>
                      @endif
                    </div><!-- col -->
                    <div class="col-12 col-md-3">
                      <p style="font-size: 18px" class="float-sm-right"><small>{{$result->tanggal}}</small></p>
                    </div><!-- col -->
                  </div><!-- row -->
                  <div class="row">
                    <div class="col">
                      
                    <p class="text-justify">{{ $result->isi }}</p>
                    @if($result->foto)
                    
                    <div class="col-sm-3">
                      <a href="/Assets/proyek/images/komentar/{{$result->foto}}" target="_blank"><img src="/Assets/proyek/images/komentar/{{$result->foto}}" class="img-thumbnail img-responsive"></a>
                    </div>
                    @endif
                    <a href="/admin/aspirasi/{{$result->id}}" class="btn btn-success btn-block btn-sm"><i class="fas fa-comment"></i> &nbsp;Balas</a>
                    </div>
                  </div>
                </div><!-- card-body -->
              </div><!-- card -->


              @endforeach
              <div class="bg-light">
                {{ $aspirasi->links() }}     
              </div>  
              <br>
          </div><!-- col -->
          <div class="col-md-4 col-12 p-3">
            <a href="/Assets/images/panduanbos.pdf" target="_blank">
                <img src="/Assets/images/posterbos.png" class="img-thumbnail img-fluid">
            </a>
            <div class="card">
              <div class="card-body">
                <a href="images/panduanbos.pdf" target="_blank">Download Panduan Penggunaan Aplikasi</a>
              </div>
            </div>
            <br>
          </div>
        </div><!-- row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script_tambahan')

@endsection