<div class="modal fade" id="komenModal" tabindex="-1" role="dialog" aria-labelledby="komenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <div style="padding: 0 25px">
        <h2 style="color: red"><b><span>|</span> Sampaikan Aspirasi Anda</b></h2><br>
        <p style="margin-top: -10px;text-align: justify;line-height: 1.5em;color: black">Anda dapat menyampaikan aspirasi / pengaduan terkait pengadaan barang dan jasa daerah kabupaten bojonegoro dengan mengisi kolom-kolom di bawah ini :</p>
        <br>
        </div>
        <div style="padding-left: 30px">            
          <form class="form-horizontal" action="/proyek/aspirasi" method="POST" enctype="multipart/form-data">          
            @csrf
            <input type="hidden" name="keterangan" value="D">
            <input type="hidden" name="id_sub" value="0">
            <input type="hidden" name="status" value="0">
            <input type="hidden" name="kd_satker" value="{{$paket->id_satker}}">
            <input type="hidden" name="thn" value="{{$paket->tahun}}">
            <input type="hidden" name="tahap" value="{{$tahap}}">
            <input type="hidden" name="aktif" value="0">
            <input type="hidden" name="ocid" value="{{$paket->kode_rup}}">
            <div class="form-group row">
              <div class="col-md-4 col-12">
                <label class="control-label" for="nama" >Nama Lengkap:</label>
              </div>
              <div class="col-md-8 col-12">
                <input type="text" class="form-control" id="nama" placeholder=" Masukkan Nama Lengkap Anda" name="nama" class="text-black" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4 col-12">
                <label class="control-label">&nbsp;</label>
              </div>
              <div class="col-md-8 col-12">
                <label class="radio-inline" for="anonim">
                  <input type="radio" name="anonim" value="0" class="text-black" checked> &nbsp;Tampilkan Nama
                </label>
                <label class="radio-inline ml-2">
                  <input type="radio" name="anonim" class="text-black" value="1"> &nbsp;Anonim
                </label>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4 col-12">
                <label class="control-label" for="telpon" required>No. Telp:</label>
              </div>
              <div class="col-md-8 col-12">          
                <input type="tel" class="form-control" id="telpon" placeholder="Masukkan Nomor Telpon" class="text-black" name="telpon">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4 col-12">
                <label class="control-label" for="nik">Jenis Kelamin:</label>
              </div>
              <div class="col-md-8 col-12">
                <label class="radio-inline"  for="jk">
                  <input type="radio" name="jk" value="Laki-Laki" class="text-black" checked> &nbsp;Laki-Laki
                </label>
                <label class="radio-inline ml-2">
                  <input type="radio" name="jk" value="Perempuan" class="text-black"> &nbsp;Perempuan
                </label>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4 col-12">
                <label class="control-label" for="alamat" required>Alamat:</label>
              </div>
              <div class="col-md-8 col-12">          
                <input type="text" class="form-control" id="alamat" class="text-black" placeholder=" Masukkan Alamat Anda" name="alamat">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4 col-12">
                <label class="control-label" for="aspirasi">Aspirasi / Pengaduan Anda:</label>
              </div>
              <div class="col-md-8 col-12">          
                <textarea name="aspirasi" class="form-control" class="text-black" placeholder="Masukkan Aspirasi Anda" style="height: 100px" required></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4 col-12">
                <label class="control-label" for="filefoto">File pendukung</label>
              </div>
              <div class="col-md-8 col-12">          
                <input type="file" name="image" class="form-control" class="text-black"><br>
              </div>
            </div>
            <input type="hidden" name="tanggal" value="<?= date('Y-m-d H:i:s'); ?>">
            <div class="form-group row">        
              <div class="col-12">
                <button type="submit" class="btn btn-danger float-right mr-3"><i class="fas fa-paper-plane"></i>&nbsp;&nbsp;Kirim</button>
              </div>
            </div>
          </form>
          <center><p style="color: red;line-height: 1.5em"><strong>Data Pemohon Informasi/Pemberi Komentar Dilindungi Keamanannya dan Tidak Dipublikasikan dalam<br>Sistem Open Data Contract Ini.</strong></p></center>
        </div>
      </div>
    </div>
  </div>
</div>

