@extends ('layouts/mainadmin')

@section('title'){{$paket->nama_paket}} - Sistem Informasi Pemantauan Pengadaan Publik @endsection
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
            <h1 class="m-0 text-dark">Detail Paket</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item"><a href="/admin/pra/{{$tahun}}">Potensi Korupsi</a></li>
              <li class="breadcrumb-item active">Detail Paket</li>
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
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="text-dark mb-1"><b>Nilai Kontrak</b></label>
                  <div class="progress" style="height: 40px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $potensi->nkt*20 ?>%;font-size: 16px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b>{{$potensi->nkt}}/5</b></div>
                  </div>
                </div>
              </div><!-- col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="text-dark mb-1"><b>Monopoly</b></label>
                  <div class="progress" style="height: 40px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $potensi->w*20 ?>%;font-size: 16px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b>{{$potensi->w}}/5</b></div>
                  </div>
                </div>
              </div><!-- col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="text-dark mb-1"><b>Kontrak:HPS</b></label>
                  <div class="progress" style="height: 40px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $potensi->s*20 ?>%;font-size: 16px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b>{{$potensi->s}}/5</b></div>
                  </div>
                </div>
              </div><!-- col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="text-dark mb-1"><b>Partisipasi</b></label>
                  <div class="progress" style="height: 40px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $potensi->p*20 ?>%;font-size: 16px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b>{{$potensi->p}}/5</b></div>
                  </div>
                </div>
              </div><!-- col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="text-dark mb-1"><b>Waktu</b></label>
                  <div class="progress" style="height: 40px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $potensi->q*100 ?>%;font-size: 16px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b>{{$potensi->q}}/1</b></div>
                  </div>
                </div>
              </div><!-- col -->
            </div>  <!-- row -->
            <div class="row">
              <div class="col">
                <label class="text-dark mb-1"><b>Total</b></label>
                <div class="progress" style="height: 40px;">
                  <div class="progress-bar bg-success" role="progressbar" style="width: <?= $potensi->total*5 ?>%;font-size: 16px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b>{{$potensi->total}}/21</b></div>
                </div>
              </div><!-- col -->
            </div><!-- row -->
            <br>
            <div class="row">
              <div class="col">
                <div id="accordion">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link text-hijau" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <strong>Detail Analisis</strong>
                        </button>
                      </h5>
                    </div><!-- card header -->
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="table table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th class="text-center text-dark">No</th>
                                <th class="text-center text-dark">Nama</th>
                                <th class="text-center text-dark">Kriteria</th>
                                <th class="text-center text-dark">Value</th>
                                <th class="text-center text-dark">Skor</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="text-center text-dark">1</td>
                                <td class="text-dark">Nilai Kontrak Tertinggi</td>
                                <td class="text-dark text-center">> 200 Jt = 1<br>
                                201-500 Jt = 2<br>
                                501 Jt - 1 M = 3<br>
                                1,01 M - 5 M = 4<br>
                                > 5 M = 5</td>
                                <?php $duit = $paket->hasil_negosiasi; ?>
                                <td class="text-dark text-center"><?="Rp. ".number_format((float)"$duit",0,",","."); ?></td>
                                <td class="text-dark text-center">{{$potensi->nkt}}</td>
                              </tr>
                              <tr>
                                <td class="text-center text-dark">2</td>
                                <td class="text-dark">Menang Berulang/Monoply</td>
                                <td class="text-dark text-center">W = 2x ? 1 <br>
                                  W = 3x ? 2<br>
                                  W = 4x ? 3<br>
                                  W = 5x ? 4<br>
                                  W > 5x ? 5</td>
                                <td class="text-dark text-center"> {{$jmlmenang}} Kali</td>
                                <td class="text-dark text-center"> {{$potensi->w}}</td>
                              </tr>
                              <tr>
                                <td class="text-center text-dark">3</td>
                                <td class="text-dark">Saving/Kontrak:HPS</td>
                                <td class="text-dark text-center">> 95,01% = 5<br>
                                  90,01% – 95 % = 4<br>
                                  85,01% - 90% = 3<br>
                                  80,01% – 85% = 2<br>
                                  < 80% = 1</td>
                                <td class="text-dark text-center"> {{$saving}} %</td>
                                <td class="text-dark text-center"> {{$potensi->s}}</td>
                              </tr>
                              <tr>
                                <td class="text-center text-dark">4</td>
                                <td class="text-dark">Jumlah Peserta Menawar/Partisipasi</td>
                                <td class="text-dark text-center">< 3 = 5<br>
                                  3 = 4<br>
                                  4 = 3<br>
                                  5 = 2<br>
                                  > 5 = 1</td>
                                <td class="text-dark text-center"> {{$menawar}} Peserta</td>
                                <td class="text-dark text-center"> {{$potensi->p}}</td>
                              </tr>
                              <tr>
                                <td class="text-center text-dark">5</td>
                                <td class="text-dark">Waktu</td>
                                <td class="text-dark text-center">Q1 = 0<br>
                                Q2 = 0<br>
                                Q3 = 0<br>
                                Q4 = 1</td>
                                <td class="text-dark text-center"> Triwulan ke {{$triwulan}}</td>
                                <td class="text-dark text-center"> {{$potensi->q}}</td>
                              </tr>
                              <tr>
                                <td class="text-dark" colspan="4"><b class="ml-3">Total</b></td>
                                <td class="text-dark text-center"><b>{{$potensi->total}}</b></td>
                              </tr>
                            </tbody>
                          </table>      
                        </div><!-- responsive -->
                      </div><!-- card body -->
                    </div><!-- collapse -->
                  </div><!-- card -->
                </div><!-- accordion -->
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- col -->
        </div><!-- row -->
        <div class="row">
          <div class="col">
          <div class="col">
            <div class="table table-responsive">
              <table class="table table-condensed table-bordered bg-white">  
                <tr>
                  <th class="bg-light text-dark text-right" width="200">Kode LPSE</th>
                  <td colspan="3" class="text-capitalize text-black"><strong><a href="http://lpse.bojonegorokab.go.id/eproc4/lelang/{{$paket->kode_lelang}}/pengumumanlelang" target="_blank">{{$paket->kode_lelang}}</a></strong></td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right" width="200">Nama Proyek/ Paket Pekerjaan</th>
                  <td colspan="3" class="text-capitalize text-black"><strong>{{$paket->nama_paket}}</strong></td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Satuan Kerja</th>
                  <td colspan="3" class="text-black"><strong>{{$paket->satker}}</strong></td>      
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Lokasi</th>
                  <td colspan="3" class="text-black">
                    {{$paket->lokasi}} 
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Kategori</th>
                  <td colspan="3" class="text-black">
                    {{$paket->jenis_pengadaan}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Metode Pengadaan</th>
                  <td colspan="3" class="text-black">
                    {{$paket->metode_pemilihan}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Peserta Lelang</th>
                  <td colspan="3" class="text-black">
                    {{$paket->peserta}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Pagu Anggaran</th>
                  <td colspan="3" class="text-black">
                    Rp. {{number_format((float)"$paket->pagu_rup",0,",",".")}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">HPS</th>
                  <td colspan="3" class="text-black">
                    @php
                    $hps = $paket->hps;
                    @endphp
                    Rp. {{number_format((float)"$hps",0,",",".")}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Nama Pemenang</th>
                  <td colspan="3" class="text-black">
                    {{$paket->nama_pemenang}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Alamat Pemenang</th>
                  <td colspan="3" class="text-black">
                    {{$paket->alamat_pemenang}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Harga Penawaran</th>
                  <td colspan="3" class="text-black">
                    @php
                    $duit = $paket->harga_penawaran;
                    @endphp
                    Rp. {{number_format((float)"$duit",0,",",".")}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Harga Terkoreksi</th>
                  <td colspan="3" class="text-black">
                    @php
                    $duit = $paket->harga_terkoreksi;
                    @endphp
                    Rp. {{number_format((float)"$duit",0,",",".")}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Hasil Negoisasi</th>
                  <td colspan="3" class="text-black">
                    @php
                    $duit = $paket->hasil_negosiasi;
                    @endphp
                    Rp. {{number_format((float)"$duit",0,",",".")}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Nama Kontraktor</th>
                  <td colspan="3" class="text-black">
                    {{$paket->nama_kontraktor}}
                  </td>
                </tr>
                <tr>
                  <th lights="bg-warnings text-dark text-right">Alamat Kontraktor</th>
                  <td colspan="3" class="text-black">
                    {{$paket->alamat_kontraktor}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Penawaran Kontraktor</th>
                  <td colspan="3" class="text-black">
                    @php
                    $duit = $paket->penawaran_kontraktor;
                    @endphp
                    Rp. {{number_format((float)"$duit",0,",",".")}}
                  </td>
                </tr>
                <tr>
                  <th class="bg-light text-dark text-right">Hasil Negosiasi Kontraktor</th>
                  <td colspan="3" class="text-black">
                    @php
                    $duit = $paket->negosiasi_kontraktor;
                    @endphp
                    Rp. {{number_format((float)"$duit",0,",",".")}}
                  </td>
                </tr>
                </tr>
              </table>
            </div>
          </div><!-- col -->            
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
    window.location.replace("/admin/pra/"+idss+"");  
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