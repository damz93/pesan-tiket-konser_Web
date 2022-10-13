<?php
   include 'koneksi.php';
    error_reporting(0);
	session_start();
   $kode_t   = $_GET['kode_tk'];     			
	if ($_SESSION['status']!="login") {
		echo "<script>alert('Anda belum login.....');window.location.href='index.php?pesan=belum_login';</script>";
	}
	else {   
		$query="DELETE from t_tiket where KODE_TIKET='$kode_t'";
		if (mysqli_query($koneksi, $query)) {
			echo "<script>alert('data terhapus');window.location.href='../list-tiket';</script>";		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
		}		
	}
?>