@extends ('layouts/mainadmin')

@section('title', 'Add Rup - Sistem Informasi Pemantauan Pengadaan Publik')
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
            <h1 class="m-0 text-dark">Add Rup</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Add Rup</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <hr>
    <!-- Main content -->
    <section class="content">
      <div class="container">
        <form action="{{route('admin.rup.store')}}">
          <div class="row mt-3">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="mak">MAK</label>
                <input type="text" class="form-control" id="mak" placeholder="Masukkan MAK paket" name="mak">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="kldi">KDLI</label>
                <input type="text" class="form-control" id="kldi" placeholder="Masukkan kdli" value="Pemerintah Daerah Kabupaten Bojonegoro" name="kdli">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="nama_paket">Nama Paket</label>
                <input type="text" class="form-control" id="nama_paket" placeholder="Masukkan nama paket" name="nama_paket">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="nama_satker" class="text-capitalize">nama satker</label>
                <select class="form-control" id="nama_satker" name="nama_satker" onchange="satkerchange()">
                  @foreach($satkers as $hasil)
                  <option>{{$hasil->nama}}</option>
                  @endforeach
                </select>
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="tdkn">TDKN</label>
                <select class="form-control" id="tdkn" name="tdkn">
                  <option>Ya</option>
                  <option>Tidak</option>
                  <option></option>
                </select>
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="umkm">UMKM</label>
                <select class="form-control" id="umkm" name="umkm">
                  <option>Ya</option>
                  <option>Tidak</option>
                  <option></option>
                </select>
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="jenis">Jenis</label>
                <input type="text" class="form-control" id="jenis" placeholder="Masukkan jenis paket" value="Kabupaten" name="jenis">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="volume">Volume</label>
                <input type="text" class="form-control" id="volume" placeholder="Masukkan volume paket" name="volume">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" placeholder="Masukkan lokasi paket" name="lokasi">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="program" class="text-capitalize">program</label>
                <input type="text" class="form-control" id="program" placeholder="Masukkan program paket" name="program">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="pradipa" class="text-capitalize">pradipa</label>
                <select class="form-control" id="pradipa" name="pradipa">
                  <option>Ya</option>
                  <option>Tidak</option>
                  <option></option>
                </select>
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="nip_ppk" class="text-capitalize">NIP PPK</label>
                <input type="text" class="form-control" id="nip_ppk" placeholder="Masukkan nip ppk paket" name="nip_ppk">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="nip_kpa" class="text-capitalize">NIP KPA</label>
                <input type="text" class="form-control" id="nip_kpa" placeholder="Masukkan nip kpa paket" name="nip_kpa">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="kode_rup" class="text-capitalize">kode RUP</label>
                <input type="text" class="form-control" id="kode_rup" placeholder="Masukkan kode rup paket" name="kode_rup">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="kegiatan" class="text-capitalize">kegiatan</label>
                <input type="text" class="form-control" id="kegiatan" placeholder="Masukkan kegiatan paket" name="kegiatan">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="pagu_rup" class="text-capitalize">pagu RUP</label>
                <input type="number" class="form-control" id="pagu_rup" placeholder="Masukkan pagu rup paket" name="pagu_rup">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="nama_kpa" class="text-capitalize">nama KPA</label>
                <input type="text" class="form-control" id="nama_kpa" placeholder="Masukkan nama kpa paket" name="nama_kpa">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="nama_ppk" class="text-capitalize">nama PPK</label>
                <input type="text" class="form-control" id="nama_ppk" placeholder="Masukkan nama ppk paket" name="nama_ppk">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="kode_kdli" class="text-capitalize">kode KDLI</label>
                <input type="text" class="form-control" id="kode_kdli" placeholder="Masukkan kode kdli paket" name="kode_kdli" value="D171">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="id_satker" class="text-capitalize">id satker</label>
                <input type="text" class="form-control" id="id_satker" placeholder="Masukkan id satker paket" name="id_satker">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="id_client" class="text-capitalize">id client</label>
                <input type="text" class="form-control" id="id_client" placeholder="Masukkan id client paket" name="id_client">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="deskripsi" class="text-capitalize">deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi paket" name="deskripsi">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="sumber_dana" class="text-capitalize">sumber dana</label>
                <select class="form-control" id="sumber_dana" name="sumber_dana">
                  <option>APBD</option>
                  <option>APBN</option>
                  <option>APBDP</option>
                  <option>BLUD</option>
                </select>
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="spesifikasi" class="text-capitalize">spesifikasi</label>
                <input type="text" class="form-control" id="spesifikasi" placeholder="Masukkan spesifikasi paket" name="spesifikasi">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="id_swakelola" class="text-capitalize">id swakelola</label>
                <input type="text" class="form-control" id="id_swakelola" placeholder="Masukkan id swakelola paket" name="id_swakelola">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="status_aktif" class="text-capitalize">status aktif</label>
                <select class="form-control" id="status_aktif" name="status_aktif">
                  <option>Ya</option>
                  <option>Tidak</option>
                  <option></option>
                </select>
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="detail_lokasi" class="text-capitalize">detail lokasi</label>
                <input type="text" class="form-control" id="detail_lokasi" placeholder="Masukkan detail lokasi paket" name="detail_lokasi">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="awal_pengadaan" class="text-capitalize">awal pengadaan</label>
                <input type="date" class="form-control" id="awal_pengadaan" placeholder="Masukkan awal pengadaan paket" name="awal_pengadaan">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="awal_pekerjaan" class="text-capitalize">awal pekerjaan</label>
                <input type="date" class="form-control" id="awal_pekerjaan" placeholder="Masukkan awal pekerjaan paket" name="awal_pekerjaan">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="status_umumkan" class="text-capitalize">status umumkan</label>
                <select class="form-control" id="status_umumkan" name="status_umumkan">
                  <option>Sudah</option>
                  <option>Belum</option>
                  <option></option>
                </select>
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="jenis_pengadaan" class="text-capitalize">jenis pengadaan</label>
                <select class="form-control" id="jenis_pengadaan" name="jenis_pengadaan">
                  <option></option>
                </select>
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="akhir_pengadaan" class="text-capitalize">akhir pengadaan</label>
                <input type="date" class="form-control" id="akhir_pengadaan" placeholder="Masukkan akhir pengadaan paket" name="akhir_pengadaan">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="akhir_pekerjaan" class="text-capitalize">akhir pekerjaan</label>
                <input type="date" class="form-control" id="akhir_pekerjaan" placeholder="Masukkan akhir pekerjaan paket" name="akhir_pekerjaan">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="kode_satker_asli" class="text-capitalize">kode satker asli</label>
                <input type="date" class="form-control" id="kode_satker_asli" placeholder="Masukkan kode satker asli paket" name="kode_satker_asli">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="metode_pemilihan" class="text-capitalize">metode pemilihan</label>
                <select class="form-control" id="metode_pemilihan" name="metode_pemilihan">
                  <option></option>
                </select>
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="tanggal_kebutuhan" class="text-capitalize">tanggal kebutuhan</label>
                <input type="date" class="form-control" id="tanggal_kebutuhan" placeholder="Masukkan tanggal kebutuhan paket" name="tanggal_kebutuhan">
              </div><!-- form group -->
            </div><!-- col -->            
            <div class="col-sm-4">
              <div class="form-group">
                <label for="kode_string_program" class="text-capitalize">kode string program</label>
                <input type="text" class="form-control" id="kode_string_program" placeholder="Masukkan kode string program paket" name="kode_string_program">
              </div><!-- form group -->
            </div><!-- col -->         
            <div class="col-sm-4">
              <div class="form-group">
                <label for="kode_string_kegiatan" class="text-capitalize">kode string kegiatan</label>
                <input type="text" class="form-control" id="kode_string_kegiatan" placeholder="Masukkan kode string kegiatan paket" name="kode_string_kegiatan">
              </div><!-- form group -->
            </div><!-- col -->         
            <div class="col-sm-4">
              <div class="form-group">
                <label for="pagu_perjenis_pengadaan" class="text-capitalize">pagu perjenis pengadaan</label>
                <input type="number" class="form-control" id="pagu_perjenis_pengadaan" placeholder="Masukkan pagu perjenis pengadaan paket" name="pagu_perjenis_pengadaan">
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="penyedia_dalam_swakelola">penyedia dalam swakelola</label>
                <select class="form-control" id="penyedia_dalam_swakelola" name="penyedia_dalam_swakelola">
                  <option>Ya</option>
                  <option>Tidak</option>
                  <option></option>
                </select>
              </div><!-- form group -->
            </div><!-- col -->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="tahun" class="text-capitalize">tahun</label>
                <input type="number" class="form-control" id="tahun" placeholder="Masukkan tahun paket" name="tahun">
              </div><!-- form group -->
            </div><!-- col -->
          </div><!-- row -->  
          <div class="row">
            <div class="col">
              <div class="float-right">
                <button type="submit" class="btn btn-lg btn-primary h3"><i class="fas fa-save"></i> Simpan Paket</button>
              </div>
            </div>
          </div>
        </form>
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