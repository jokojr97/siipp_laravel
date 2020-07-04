<?php
include 'config.php';
$connect = mysqli_connect($dbhost, $dbuname, $dbpass, $dbname);
//$connect = mysqli_connect("localhost", "root", "", "odcbjn");
if (isset($_GET['kodekomen'])) {
	if ($_GET['perintah'] == "update") {	
	$kodekomen = $_GET['kodekomen'];
	$query3 = "UPDATE odcbjn_aspirasi SET aktif = 0 WHERE id='$kodekomen'";
	mysqli_query($connect, $query3);
	header("location:".$_SERVER['HTTP_REFERER']);
	}else if ($_GET['perintah'] == "delete") {
		
		$kodekomen = $_GET['kodekomen'];
		$query3 = "UPDATE odcbjn_aspirasi SET aktif = 1 WHERE id='$kodekomen'";
		mysqli_query($connect, $query3);
		header("location:".$_SERVER['HTTP_REFERER']);

	}
}
else {


$tahun = $_GET["thn"];
$tahap = $_GET["tahap"];
$id_sub = $_GET["id_sub"];
$nik = $_GET["nik"];
$ocid = $_GET["ocid"];
$akses = $_GET["akses"];
$nama = $_GET["nama"];
$jk = $_GET["jk"];
$no_hp = $_GET["telpon"];
$alamat = $_GET["alamat"];
$tanggal = $_GET["tanggal"];
$aspirasi = $_GET["aspirasi"];
$lokasi_foto = $_FILES["filefoto"]["tmp_name"];
$nama_foto   = $_FILES["filefoto"]["name"];
$status = $_GET["status"];

if ($_GET['anonim'] == "on") {
	$anonim = 1;
}
if ($_GET['anonim'] == "on") {
	$anonim = 1;
}

// $tahun = $_POST["thn"];
// $tahap = $_POST["tahap"];
// $id_sub = $_POST["id_sub"];
// $nik = $_POST["nik"];
// $ocid = $_POST["ocid"];
// $akses = $_POST["akses"];
// $nama = $_POST["nama"];
// $jk = $_POST["jk"];
// $no_hp = $_POST["telpon"];
// $alamat = $_POST["alamat"];
// $tanggal = $_POST["tanggal"];
// $aspirasi = $_POST["aspirasi"];
// $lokasi_foto = $_FILES["filefoto"]["tmp_name"];
// $nama_foto   = $_FILES["filefoto"]["name"];
// $status = $_POST["status"];

if ($status == "opd") {
	$status1 = "1";
	}else if ($status == "warga") {
		$status1 = "0";
	} 

$satu = mysqli_query($connect, "SELECT nukeurl FROM odcbjn_config");
while ($data = mysqli_fetch_array($satu)) {
	$base_url = $data["nukeurl"];
}

$folder = "images/komentar/$nama_foto";
if (isset($tahun) && $tahun != "") {
	$url = "SELECT id_satker FROM rup".$tahun." where id=$ocid";
}else {
	$url = "SELECT id_satker FROM rup2018 where id=$ocid";
}
	$dua = mysqli_query($connect, $url);	


while ($dt = mysqli_fetch_array($dua)) {
	$kd_satker = $dt["id_satker"];
}

if ($nama_foto == "") {	
	$query = "INSERT INTO odcbjn_aspirasi(id, id_sub, tahap, ocid,kd_satker, pengirim, no_hp, alamat, isi, nik, foto, jenis_kelamin, tanggal, status, keterangan, tahun_anggaran, anonim ) VALUES (NULL, '$id_sub', '$tahap', '$ocid','$kd_satker', '$nama', '$no_hp', '$alamat', '$aspirasi', '$nik', '$foto', '$jk', CURRENT_TIMESTAMP, '$status1', 'D','$tahun', '$anonim' )";
		mysqli_query($connect, $query);
		if ($status == "opd") {
			// header("location:".$_SERVER['HTTP_REFERER']);
		}else if ($status == "warga") {
			// header("location:".$_SERVER['HTTP_REFERER']);
		}else {
			// header("location:".$_SERVER['HTTP_REFERER']);		
		}
}else{	
	$move = move_uploaded_file($lokasi_foto, $folder);
	if ($move){
		$query = "INSERT INTO odcbjn_aspirasi(id, id_sub, tahap, ocid,kd_satker, pengirim, no_hp, alamat, isi, nik, foto, jenis_kelamin, tanggal, status, keterangan, tahun_anggaran) VALUES (NULL, '$id_sub', '$tahap', '$ocid','$kd_satker', '$nama', '$no_hp', '$alamat', '$aspirasi', '$nik', '$nama_foto', '$jk', CURRENT_TIMESTAMP, '$status1', 'D', $tahun )";
		mysqli_query($connect, $query);
		if ($status == "opd") {
			header("location:".$_SERVER['HTTP_REFERER']);
			// echo $query."<br>";
			// echo $url;
		}else if ($status == "warga") {
			header("location:".$_SERVER['HTTP_REFERER']);
			// echo $query."<br>";
			// echo $url;
		}else {
			header("location:".$_SERVER['HTTP_REFERER']);	
			// echo $query."<br>";
			// echo $url;
		}
		//echo "file berhasil diupload<br>".$folder."<br>".$nama_foto;
	}
		echo "file gagal diupload";

}
}
?>