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
                <h5 style="margin-top: -10px;text-align: justify;line-height: 1.5em">Anda dapat menyampaikan aspirasi / pengaduan terkait pengadaan barang dan jasa daerah kabupaten bojonegoro dengan mengisi kolom-kolom di bawah ini :</h5>
                <br>
                </div>
                <div style="padding-left: 30px">            
                       <form class="form-horizontal" action="/proyek/detail/addKomen" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="keterangan" value="D">
                        <input type="hidden" name="id_sub" value="0">
                        <input type="hidden" name="status" value="0">
                        <input type="hidden" name="kd_satker" value="{{$paket->id_satker}}">
                        <input type="hidden" name="thn" value="{{$paket->tahun}}">
                        <input type="hidden" name="tahap" value="{{$tahap}}">
                        <input type="hidden" name="aktif" value="0">
                        <input type="hidden" name="ocid" value="{{$paket->kode_rup}}">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-12 h5" for="nama" >Nama Lengkap:</label>
                          <div class="col-md-8 col-sm-12">
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda" name="nama" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-12 h5">&nbsp;</label>
                          <div class="col-md-9 col-sm-12">
                            <label class="radio-inline h5" for="anonim">
                            <input type="radio" name="anonim" value="0" checked>Tampilkan Nama
                          </label>
                          <label class="radio-inline h5">
                            <input type="radio" name="anonim" value="1">Anonim
                          </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-12 h5" for="telpon" required>No. Telp:</label>
                          <div class="col-sm-8 col-sm-12">          
                            <input type="tel" class="form-control" id="telpon" placeholder="Masukkan Nomor Telpon" name="telpon">
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="control-label col-md-3 col-sm-12 h5" for="nik">Jenis Kelamin:</label>
                          <div class="col-sm-8 col-sm-12">
                            <label class="radio-inline h5"  for="jk">
                              <input type="radio" name="jk" value="Laki-Laki" checked>Laki-Laki
                            </label>
                            <label class="radio-inline h5">
                              <input type="radio" name="jk" value="Perempuan">Perempuan
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-12 h5" for="alamat" required>Alamat:</label>
                          <div class="col-sm-8 col-sm-12">          
                            <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Anda" name="alamat">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-12 h5" for="aspirasi">Aspirasi / Pengaduan Anda:</label>
                          <div class="col-sm-8 col-sm-12">          
                            <textarea name="aspirasi" class="form-control" placeholder="Masukkan Aspirasi Anda" style="height: 100px" required></textarea>
                          </div>
                        </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-12 h5" for="filefoto">File pendukung</label>
                          <div class="col-md-8 col-sm-12">          
                            <input type="file" name="filefoto" class="form-control"><br>
                          </div>
                        </div>
                        <input type="hidden" name="tanggal" value="<?= date('Y-m-d H:i:s'); ?>">
                        <div class="form-group">        
                          <div class="col-md-offset-2 col-md-9">
                            <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-send"></i>&nbsp;&nbsp;Kirim</button>
                          </div>
                        </div>
                      </form>
                    <center><h5 style="color: red;line-height: 1.5em"><strong>Data Pemohon Informasi/Pemberi Komentar Dilindungi Keamanannya dan Tidak Dipublikasikan dalam<br>Sistem Open Data Contract Ini.</strong></h5></center>
                </div>
              </div>
          </div>
      </div>
  </div>
