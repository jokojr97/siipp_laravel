<?php
include 'config.php';
$connect = mysqli_connect($dbhost, $dbuname, $dbpass, $dbname);
//$connect = mysqli_connect("localhost", "root", "", "odcbjn");
$id_komen = $_POST["id"];

$satu = mysqli_query($connect, "SELECT nukeurl FROM odcbjn_config");
while ($data = mysqli_fetch_array($satu)) {
	$base_url = $data["nukeurl"];
}
if ($_POST['status'] == "warga") {?>
	<div style="padding: 0 25px">
  		<h2 style="color: red"><b><span>|</span> Sampaikan Aspirasi Anda</b></h2><br>
		<h5 style="margin-top: -10px;text-align: justify;line-height: 1.5em">Anda dapat menyampaikan aspirasi / pengaduan terkait pengadaan barang dan jasa daerah kabupaten bojonegoro dengan mengisi kolom-kolom di bawah ini :</h5>
		<br>
  	</div>
  	<div style="padding-left: 30px">          			
      	<form class="form-horizontal" action="<?= $base_url ?>komen.php" method="get" enctype="multipart/form-data">
	    	<input type="hidden" name="akses" value="0">
  			<input type="hidden" name="id_sub" value="<?php echo $_POST['idkomen']; ?>">
	    	<input type="hidden" name="status" value="warga">
	    	<input type="hidden" name="thn" value="<?= $_POST['thn'] ?>">
      		<input type="hidden" name="tahap" value="<?php echo $_POST['id']; ?>">
      		<input type="hidden" name="ocid" value="<?php echo $_POST['ocid']; ?>">
		    <div class="form-group">
		      <label class="control-label col-md-3 col-sm-12 h5" for="alamat" required>No. KTP:</label>
		      <div class="col-sm-8 col-sm-12">          
		        <input type="text" class="form-control" id="nik" placeholder="Masukkan Nomor KTP" name="nik" required>
		      </div>
		    </div>
      		<div class="form-group">
		      <label class="control-label col-md-3 col-sm-12 h5" for="nama" >Nama Lengkap:</label>
		      <div class="col-md-8 col-sm-12">
		        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda" name="nama" required>
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-md-3 col-sm-12 h5">&nbsp;</label>
		      <div class="col-md-9 col-sm-12">
		        <label class="radio-inline h5">
			      <input type="radio" name="jk" value="Laki-Laki" checked>Laki-Laki
			    </label>
			    <label class="radio-inline h5">
			      <input type="radio" name="jk" value="Perempuan">Perempuan
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
		      <label class="control-label col-md-3 col-sm-12 h5" for="alamat" required>Alamat:</label>
		      <div class="col-sm-8 col-sm-12">          
		        <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Anda" name="alamat">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-md-3 col-sm-12 h5" for="email">Aspirasi / Pengaduan Anda:</label>
		      <div class="col-sm-8 col-sm-12">          
		        <textarea name="aspirasi" class="form-control" placeholder="Masukkan Aspirasi Anda" required></textarea>
		      </div>
		    </div>
			<div class="form-group">
		      <label class="control-label col-md-3 col-sm-12 h5" for="filefoto">File pendukung</label>
		      <div class="col-md-8 col-sm-12">          
		        <input type="file" name="filefoto" class="form-control"><br>
		      </div>
		    </div>
			<div class="form-group">
		      <div class="control-label col-md-3 col-sm-12 h5">&nbsp;</div>
		      <div class="col-md-8 col-sm-12">          
		        <input id="anonim" class="styled" type="checkbox" name="anonim" data-toggle="tooltip" data-placement="top" data-title="Nama anda tidak akan terpublish pada laporan">

                    <label for="anonim">
                        Anonim
                    </label>&nbsp;&nbsp;&nbsp;
                    <input id="Rahasia" class="styled" type="checkbox" name="is_secret" data-toggle="tooltip" data-placement="top" data-title="Laporan Anda tidak dapat dilihat publik">

                    <label for="Rahasia">
                        Rahasia
                    </label>
		      </div>
		    </div>

		    <input type="hidden" name="tanggal" value="<?= date('Y-m-d')?>">
		    <div class="form-group">        
		      <div class="col-md-offset-2 col-md-9">
		        <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-send"></i>&nbsp;&nbsp;Kirim</button>
		      </div>
		    </div>
      	</form>
      	<center><h5 style="color: red;line-height: 1.5em"><strong>Data Pemohon Informasi/Pemberi Komentar Dilindungi Keamanannya dan Tidak Dipublikasikan dalam<br>Sistem Open Data Contract Ini.</strong></h5></center>
  	</div>
<?php
} else if ($_POST['status'] == "opd") { ?>

	<div style="padding: 0 25px">
  		<h2 style="color: red"><b><span>|</span> Berikan Tanggapan Kepada Komentar</b></h2><br>
		<h5 style="margin-top: -10px;text-align: justify;line-height: 1.5em">Anda dapat untuk memberikan tanggapan anda bisa mengisi form di bawah ini :</h5><br>
		<?php 
		$sqlkom = mysqli_query($connect, "SELECT * FROM `odcbjn_aspirasi` where id='$id_komen'");
		while($komen1 = mysqli_fetch_array($sqlkom)){ // Ambil semua data dari hasil eksekusi
			//echo "<h4>Data Pengirim</h4><hr>";
			$id_komen = $komen1["id"];
			$tahap = $komen1['tahap'];
			$kd_satker = $komen1['kd_satker'];			
			$nik = $komen1['nik'];
			$ocid = $komen1['ocid'];
			$pengirim = $komen1['pengirim'];
			$no_hp = $komen1['no_hp'];
			$alamat_komen = $komen1['alamat'];
			$isi_komen = $komen1['isi'];
			$foto_komen = $komen1['foto'];
			$jk_komen = $komen1['jenis_kelamin'];
			$tanggal_komen = $komen1['tanggal'];
			?>
			<div class="row">
			
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p>NIK :</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p><strong><?= $komen1["nik"] ?></strong></p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p>Jenis Kelamin :</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p><strong><?= $komen1["jenis_kelamin"] ?></strong></p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p>Nama :</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p><strong><?= $pengirim ?></strong></p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p>No. HP :</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p><strong><?= $komen1["no_hp"] ?></strong></p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p>Alamat :</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p><strong><?= $komen1["alamat"] ?></strong></p>
				</div>	
			</div>
			<hr>
			<div class="well">
	          	<!-- Media top -->
				<div class="media">
				  <div class="media-left media-top">
				    <img src="<?= $base_url; ?>assets/images/220.jpg" class="media-object img-circle" style="width:60px">
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading"><?= $pengirim ?> <small><i>(<?= $no_hp; ?>))&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-success btn-xs" style="color:white">Warga</a></i><span class="pull-right"><?= $tanggal_komen ?></span></small></h4>
				    <p><?= $isi_komen ?></p>
				    <?php 
				    if ($foto_komen == "") {
				    	echo "";
				    }else{ ?>
				    	<div class="col-sm-3">
				    		<a href="<?= $base_url ?>images/komentar/<?= $foto_komen ?>" target="_blank"><img src="<?= $base_url ?>images/komentar/<?= $foto_komen ?>" class="img-thumbnail img-responsive"></a>
				    	</div>
			    	<?php } ?>
				  </div>

				  <a href="<?= $base_url ?>komen.php?kodekomen=<?= $id_komen; ?>" class="btn btn-danger btn-xs pull-right" onclick="return confirm('yakin hapus?')"><i class="fa fa-close"></i>&nbsp; Hapus</a>
				</div>
	          </div>
		<?php } ?>
			<?php 
		$sqlkom1 = mysqli_query($connect, "SELECT * FROM `odcbjn_aspirasi` where id_sub='$id_komen'");
		while($komen2 = mysqli_fetch_array($sqlkom1)){ // Ambil semua data dari hasil eksekusi
			//echo "<h4>Data Pengirim</h4><hr>";
			$pengirim1 = $komen2['pengirim'];
			$no_hp1 = $komen2['no_hp'];
			$alamat_komen1 = $komen2['alamat'];
			$isi_komen1 = $komen2['isi'];
			$foto_komen1 = $komen2['foto'];
			$jk_komen1 = $komen2['jenis_kelamin'];
			$tanggal_komen1 = $komen2['tanggal'];
			$status_komen1 = $komen2['status'];
			?>
			<div class="well">
	          	<!-- Media top -->
				<div class="media">
				  <div class="media-left media-top">
				    <img src="<?= $base_url; ?>assets/images/220.jpg" class="media-object img-circle" style="width:60px">
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading"><?= $pengirim1 ?> <small><i>(<?= $no_hp1; ?>))&nbsp;&nbsp;&nbsp;
				    <?php 
				    if ($status_komen1 == 0) { ?>
				    	<a href="#" class="btn btn-success btn-xs" style="color:white">Warga</a>
				    <?php }else if ($status_komen1 == 1){ ?>
				    	<a href="#" class="btn btn-danger btn-xs" style="color:white">OPD</a>
				    <?php }
				    ?>
				    
					</i><span class="pull-right"><?= $tanggal_komen1 ?></span></small></h4>
				    <p><?= $isi_komen1 ?></p>
				    <?php 
				    if ($foto_komen1 == "") {
				    	echo "";
				    }else{ ?>
				    	<div class="col-sm-3">
				    		<a href="<?= $base_url ?>images/komentar/<?= $foto_komen ?>" target="_blank"><img src="<?= $base_url ?>images/komentar/<?= $foto_komen1 ?>" class="img-thumbnail img-responsive"></a>
				    	</div>
			    	<?php } ?>
				  </div>

				  <a href="<?= $base_url ?>komen.php?kodekomen=<?= $id_komen; ?>" class="btn btn-danger btn-xs pull-right" onclick="return confirm('yakin hapus?')"><i class="fa fa-close"></i>&nbsp; Hapus</a>
				</div>
	          </div>
		<?php } ?>
			<?php 
			$sqlkom2 = mysqli_query($connect, "SELECT * FROM `odcbjn_satker` where id='$kd_satker'");
			while($komen3 = mysqli_fetch_array($sqlkom2)){ // Ambil semua data dari hasil eksekusi
			//echo "<h4>Data Pengirim</h4><hr>";
			$nama_satker = $komen3["nama"];
			$alamat_satker = $komen3["alamat"];
			$telpon_satker = $komen3["telpon"];}

			?>

			<form class="form-horizontal" action="<?= $base_url ?>komen.php" method="post" enctype="multipart/form-data">
				<div class="row">
	    		<input type="hidden" name="thn" value="<?= $_POST['thn'] ?>">
		    	<input type="hidden" name="status" value="opd">
		    	<input type="hidden" name="akses" value="1">
		    	<input type="hidden" name="tahap" value="<?= $tahap ?>">
      			<input type="hidden" name="ocid" value="<?php echo $ocid ?>">
      			<input type="hidden" name="id_sub" value="<?php echo $id_komen ?>">
      			<input type="hidden" name="nik" value="">
      			<input type="hidden" name="nama" value="<?php echo $nama_satker?>">
      			<input type="hidden" name="jk" value="">
      			<input type="hidden" name="telpon" value="<?php echo $telpon_satker; ?>">
      			<input type="hidden" name="alamat" value="<?php echo $alamat_satker; ?>">
		    	<input type="hidden" name="tanggal" value="<?= date('Y-m-d')?>">

					<div class="form-group">
						<label for="komentar"> Balas</label>
						<textarea class="form-control" placeholder="Berikan Tanggapan Pada Komentar ..." name="aspirasi" required></textarea>
					</div>
					<div class="form-group">		              
				      <input type="file" name="filefoto" class="form-control"><br>			      
				    </div>
					<div class="form-group">
						<button type="submit" class="btn btn-danger pull-right"><i class="fa fa-send"></i>&nbsp;&nbsp; Balas</button>
					</div>
				</div>
			</form>



	<?php } else if ($_POST['status'] == "admin") { ?>

	<div style="padding: 0 25px">
  		<h2 style="color: red"><b><span>|</span> Berikan Tanggapan Kepada Komentar</b></h2><br>
		<h5 style="margin-top: -10px;text-align: justify;line-height: 1.5em">Anda dapat untuk memberikan tanggapan anda bisa mengisi form di bawah ini :</h5><br>
		<?php 
		$sqlkom = mysqli_query($connect, "SELECT * FROM `odcbjn_aspirasi` where id='$id_komen'");
		while($komen1 = mysqli_fetch_array($sqlkom)){ // Ambil semua data dari hasil eksekusi
			//echo "<h4>Data Pengirim</h4><hr>";
			$id_komen = $komen1["id"];
			$tahap = $komen1['tahap'];
			$kd_satker = $komen1['kd_satker'];			
			$nik = $komen1['nik'];
			$ocid = $komen1['ocid'];
			$pengirim = $komen1['pengirim'];
			$no_hp = $komen1['no_hp'];
			$alamat_komen = $komen1['alamat'];
			$isi_komen = $komen1['isi'];
			$foto_komen = $komen1['foto'];
			$jk_komen = $komen1['jenis_kelamin'];
			$tanggal_komen = $komen1['tanggal'];
			?>
			<div class="row">
			
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p>NIK :</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p><strong><?= $komen1["nik"] ?></strong></p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p>Jenis Kelamin :</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p><strong><?= $komen1["jenis_kelamin"] ?></strong></p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p>Nama :</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p><strong><?= $pengirim ?></strong></p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p>No. HP :</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p><strong><?= $komen1["no_hp"] ?></strong></p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p>Alamat :</p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<p><strong><?= $komen1["alamat"] ?></strong></p>
				</div>	
			</div>
			<hr>
			<div class="well">
	          	<!-- Media top -->
				<div class="media">
				  <div class="media-left media-top">
				    <img src="<?= $base_url; ?>assets/images/220.jpg" class="media-object img-circle" style="width:60px">
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading"><?= $pengirim ?> <small><i>(<?= $no_hp; ?>))&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-success btn-xs" style="color:white">Warga</a></i><span class="pull-right"><?= $tanggal_komen ?></span></small></h4>
				    <p><?= $isi_komen ?></p>
				    <?php 
				    if ($foto_komen == "") {
				    	echo "";
				    }else{ ?>
				    	<div class="col-sm-3">
				    		<a href="<?= $base_url ?>images/komentar/<?= $foto_komen ?>" target="_blank"><img src="<?= $base_url ?>images/komentar/<?= $foto_komen ?>" class="img-thumbnail img-responsive"></a>
				    	</div>
			    	<?php } ?>
				  </div>
				  <a href="<?= $base_url ?>komen.php?kodekomen=<?= $id_komen; ?>" class="btn btn-danger btn-xs pull-right" onclick="return confirm('yakin hapus?')"><i class="fa fa-close"></i>&nbsp; Hapus</a>


				</div>
	          </div>
		<?php } ?>
			<?php 
		$sqlkom1 = mysqli_query($connect, "SELECT * FROM `odcbjn_aspirasi` where id_sub='$id_komen'");
		while($komen2 = mysqli_fetch_array($sqlkom1)){ // Ambil semua data dari hasil eksekusi
			//echo "<h4>Data Pengirim</h4><hr>";
			$pengirim1 = $komen2['pengirim'];
			$no_hp1 = $komen2['no_hp'];
			$alamat_komen1 = $komen2['alamat'];
			$isi_komen1 = $komen2['isi'];
			$foto_komen1 = $komen2['foto'];
			$jk_komen1 = $komen2['jenis_kelamin'];
			$tanggal_komen1 = $komen2['tanggal'];
			$status_komen1 = $komen2['status'];
			?>
			<div class="well">
	          	<!-- Media top -->
				<div class="media">
				  <div class="media-left media-top">
				    <img src="<?= $base_url; ?>assets/images/220.jpg" class="media-object img-circle" style="width:60px">
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading"><?= $pengirim1 ?> <small><i>(<?= $no_hp1; ?>))&nbsp;&nbsp;&nbsp;
				    <?php 
				    if ($status_komen1 == 0) { ?>
				    	<a href="#" class="btn btn-success btn-xs" style="color:white">Warga</a>
				    <?php }else if ($status_komen1 == 1){ ?>
				    	<a href="#" class="btn btn-danger btn-xs" style="color:white">OPD</a>
				    <?php }
				    ?>
				    
					</i><span class="pull-right"><?= $tanggal_komen1 ?></span></small></h4>
				    <p><?= $isi_komen1 ?></p>
				    <?php 
				    if ($foto_komen1 == "") {
				    	echo "";
				    }else{ ?>
				    	<div class="col-sm-3">
				    		<img src="<?= $base_url ?>images/komentar/<?= $foto_komen1 ?>" class="img-thumbnail img-responsive">
				    	</div>
			    	<?php } ?>
				  </div>
				  <a href="<?= $base_url ?>komen.php?kodekomen=<?= $komen2["id"]; ?>" class="btn btn-danger btn-xs pull-right" onclick="return confirm('yakin hapus?')"><i class="fa fa-close"></i>&nbsp; Hapus</a>

				</div>
	          </div>
		<?php } ?>
			<?php 
			$sqlkom2 = mysqli_query($connect, "SELECT * FROM `odcbjn_satker` where 	kd_satker_sirup='$kd_satker'");
			while($komen3 = mysqli_fetch_array($sqlkom2)){ // Ambil semua data dari hasil eksekusi
			//echo "<h4>Data Pengirim</h4><hr>";
			$nama_satker = $komen3["nama"];
			$alamat_satker = $komen3["alamat"];
			$telpon_satker = $komen3["telpon"];}

			?>

			<form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
				<div class="row">
	    			<input type="hidden" name="thn" value="<?= $_POST['thn'] ?>">
			    	<input type="hidden" name="status" value="opd">
			    	<input type="hidden" name="akses" value="1">
			    	<input type="hidden" name="tahap" value="<?= $tahap ?>">
	      			<input type="hidden" name="ocid" value="<?php echo $ocid ?>">
	      			<input type="hidden" name="id_sub" value="<?php echo $id_komen ?>">
	      			<input type="hidden" name="nik" value="">
	      			<input type="hidden" name="nama" value="<?php echo $nama_satker?>">
	      			<input type="hidden" name="jk" value="">
	      			<input type="hidden" name="telpon" value="<?php echo $telpon_satker; ?>">
	      			<input type="hidden" name="alamat" value="<?php echo $alamat_satker; ?>">
			    	<input type="hidden" name="tanggal" value="<?= date('Y-m-d')?>">

					<div class="form-group">
						<label for="komentar"> Balas</label>
						<textarea class="form-control" placeholder="Berikan Tanggapan Pada Komentar ..." name="aspirasi" required></textarea>
					</div>
					<div class="form-group">		              
				      <input type="file" name="filefoto" class="form-control"><br>			      
				    </div>
					<div class="form-group">
						<button class="btn btn-danger pull-right disabled"><i class="fa fa-send"></i>&nbsp;&nbsp; Balas</button>
					</div>
				</div>
			</form>



	<?php } ?>
	
	
 
<script type="text/javascript">
    $(function () {
        $('.media').media({width: 868});
    });
</script>