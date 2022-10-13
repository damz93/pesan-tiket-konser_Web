<?php
	include 'koneksi.php';
	error_reporting(0);
	date_default_timezone_set('Asia/Hong_Kong');
	session_start();
	$waktu_skg2 = date("d/m/Y h:i:s A");
	$tgl        = date("Y/m/d");
	$oleh       = $_SESSION['username'];
	$keterangan_upd = "update oleh " . $oleh . " pada tgl dan jam " . $waktu_skg2;
	$kode_t   = $_POST['kode_t'];	
	
	
    
         session_start();
         if ($_SESSION['status']!="login") {
			echo "<script>alert('Anda belum login.....');window.location.href='index?pesan=belum_login';</script>";
		}

		else{	
				$a = mysqli_query($koneksi, "UPDATE t_tiket SET KETERANGAN='CI',KETER='$keterangan_upd',WAKTU='$waktu_skg2',OLEH='$oleh',TGL='$tgl' where KODE_TIKET='$kode_t'");			
				if ($a){
					echo "<script>alert('Tiket Ter-checkin Tersimpan');window.location.href='../check-in';</script>";
				}
		} 	
?>