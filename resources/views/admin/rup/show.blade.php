@extends ('layouts/mainadmin')

@section('title', 'Rup Detail - Sistem Informasi Pemantauan Pengadaan Publik')
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
            <h1 class="m-0 text-dark">Rup Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <hr>
    <!-- Main content -->
    <section class="content bg-white">
      <div class="container-fluid p-3">
        <div class="row">
          <div class="col">
            <h4><b>{{$paket->nama_paket}}</b> <a href="/admin/rup/{{$paket->tahun}}/{{$paket->kode_rup}}"><i class="fas fa-edit"></i>Edit</a></h4>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 pl-3 pr-3">
            <table class="table table-hover">
              <thead>
                <tr>
                  <td class="text-capitalize jdl"><b>MAK</b></td>
                  <td>
                      @php
                      $mak = $paket->mak;
                      $maks = explode(";", $mak);
                      $jml_mak = count($maks) - 1;
                      $mak = $mak[$jml_mak];
                      foreach($maks as $hsl){
                        echo '<p style="margin-bottom: 0px">'.$hsl.'</p>';
                      }
                      @endphp                    
                  </td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>KDLI</b></td>
                  <td>{{$paket->kdli}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>TKDN</b></td>
                  <td>{{$paket->tkdn}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>UMKM</b></td>
                  <td>{{$paket->umkm}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>jenis</b></td>
                  <td>{{$paket->jenis}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>volume</b></td>
                  <td>{{$paket->volume}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>lokasi</b></td>
                  <td>{{$paket->lokasi}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>program</b></td>
                  <td>{{$paket->program}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>pradipa</b></td>
                  <td>{{$paket->pradipa}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>nip PPK</b></td>
                  <td>{{$paket->nip_ppk}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>nip KPA</b></td>
                  <td>{{$paket->nip_kpa}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>kode RUP</b></td>
                  <td>{{$paket->kode_rup}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>kegiatan</b></td>
                  <td>{{$paket->kegiatan}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>Pagu</b></td>
                  <td>Rp. {{number_format((float)"$paket->pagu_rup",0,",",".")}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>nama KPA</b></td>
                  <td>{{$paket->nama_kpa}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>nama PPK</b></td>
                  <td>{{$paket->nama_ppk}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>kode KDLI</b></td>
                  <td>{{$paket->kode_kdli}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>id satker</b></td>
                  <td>{{$paket->id_satker}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>id client</b></td>
                  <td>{{$paket->id_client}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>deskripsi</b></td>
                  <td>{{$paket->deskripsi}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>nama paket</b></td>
                  <td>{{$paket->nama_paket}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>nama satker</b></td>
                  <td>{{$paket->nama_satker}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>sumber dana</b></td>
                  <td>{{$paket->sumber_dana}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>id swakelola</b></td>
                  <td>{{$paket->id_swakelola}}</td>
                </tr>
              </thead>
            </table>
          </div><!-- col -->
          <div class="col-sm-6 pl-3 pr-3">
            <table class="table table-hover">
              <thead>
                <tr>
                  <td class="text-capitalize jdl"><b>spesifikasi</b></td>
                  <td>{{$paket->spesifikasi}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>status aktif</b></td>
                  <td>{{$paket->status_aktif}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>detail lokasi</b></td>
                  <td>
                    @php
                    $data = $paket->detail_lokasi;
                    $datas = explode(";", $data);
                    $jml_data = count($datas) - 1;
                    $data = $data[$jml_data];
                    foreach($datas as $hsl){
                      echo '<p style="margin-bottom: 0px">'.$hsl.'</p>';
                    }
                    @endphp
                  </td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>awal pengadaan</b></td>
                  <td>{{$paket->awal_pengadaan}}</td>
                <tr>
                <tr>
                  <td class="text-capitalize jdl"><b>awal pekerjaan</b></td>
                  <td>{{$paket->awal_pekerjaan}}</td>
                <tr>
                  <td class="text-capitalize jdl"><b>status umumkan</b></td>
                  <td>{{$paket->status_umumkan}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>jenis pengadaan</b></td>
                  <td>
                    @php
                    $data = $paket->jenis_pengadaan;
                    $datas = explode(";", $data);
                    $jml_data = count($datas) - 1;
                    $data = $data[$jml_data];
                    foreach($datas as $hsl){
                      echo '<p style="margin-bottom: 0px">'.$hsl.'</p>';
                    }
                    @endphp
                  </td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>akhir pengadaan</b></td>
                  <td>{{$paket->akhir_pengadaan}}</td>
                <tr>
                <tr>
                  <td class="text-capitalize jdl"><b>akhir pekerjaan</b></td>
                  <td>{{$paket->akhir_pekerjaan}}</td>
                <tr>
                <tr>
                  <td class="text-capitalize jdl"><b>kode satker asli</b></td>
                  <td>{{$paket->kode_satker_asli}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>metode pemilihan</b></td>
                  <td>{{$paket->metode_pemilihan}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>tanggal kebutuhan</b></td>
                  <td>{{$paket->tanggal_kebutuhan}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>kode string program</b></td>
                  <td>{{$paket->kode_string_program}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>pagu perjenis pengadaan</b></td>
                  <td>
                    @php
                    $data = $paket->pagu_perjenis_pengadaan;
                    $datas = explode(";", $data);
                    $jml_data = count($datas) - 1;
                    $data = $data[$jml_data];
                    foreach($datas as $hsl){
                      echo '<p style="margin-bottom: 0px">Rp. '.number_format((float)"$hsl",0,",",".").'</p>';
                    }
                    @endphp
                  </td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>tanggal terakhir update</b></td>
                  <td>{{$paket->tanggal_terakhir_update}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>penyedia didalam swakelola</b></td>
                  <td>{{$paket->penyedia_didalam_swakelola}}</td>
                </tr>
                <tr>
                  <td class="text-capitalize jdl"><b>tahun</b></td>
                  <td>{{$paket->tahun}}</td>
                </tr>
              </thead>
            </table>
          </div><!-- col -->
        </div>
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