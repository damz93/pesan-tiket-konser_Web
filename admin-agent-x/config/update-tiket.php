<?php
	include 'koneksi.php';
	date_default_timezone_set('Asia/Hong_Kong');
	session_start();
	error_reporting(0);	
	// menyimpan data kedalam variabel
	$waktu_skg2 = date("d/m/Y h:i:s");
	$tgl = date("Y/m/d");
	$oleh = $_SESSION['username'];
	$keterangan = "diedit oleh ".$oleh." pada tgl dan jam ".$waktu_skg2;
	$phon = $_POST['PHONE'];
	$nik = $_POST['NIK'];
	$kode_t = $_POST['KODE_TIKET'];

	if ($_SESSION['status']!="login") {
		echo "<script>alert('Anda belum login.....');window.location.href='index.php?pesan=belum_login';</script>";
	}
	else {
		$query="UPDATE t_tiket SET NIK='$nik',PHONE='$phon',TGL='$tgl',WAKTU='$waktu_skg2',KETER='$keterangan',OLEH='$oleh' where KODE_TIKET='$kode_t'";
		if (mysqli_query($koneksi, $query)) {
				echo "<script>alert('Data Terupdate');window.location.href='../list-tiket';</script>";		
			} else {
				echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
			}
	}
?>