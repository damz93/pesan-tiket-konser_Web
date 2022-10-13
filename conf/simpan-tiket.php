<?php
error_reporting(0);	
include '../admin-agent-x/config/koneksi.php';
date_default_timezone_set('Asia/Hong_Kong');
$waktu_s = date("d/m/Y h:i:s A");
$tgl_s = date("Y/m/d");
$phone = $_POST['phoned'];
$nik = $_POST['nik'];


	$data_tiket = mysqli_query($koneksi, "SELECT ID,KODE_TIKET FROM t_tiket ORDER BY ID DESC LIMIT 1");
	while ($d = mysqli_fetch_array($data_tiket)) {
		$jum_tiket = substr($d['KODE_TIKET'], 4);
	}

	if ($jum_tiket == 0) {
		$kode_tiket = "ID-0000000001";
	} else {
		$jum_tiket++;
		if (strlen($jum_tiket) == 1) {
			$kode_tiket = "ID-000000000" . $jum_tiket;
		} else if (strlen($jum_tiket) == 2) {
			$kode_tiket = "ID-00000000" . $jum_tiket;
		} else if (strlen($jum_tiket) == 3) {
			$kode_tiket = "ID-0000000" . $jum_tiket;
		} else if (strlen($jum_tiket) == 4) {
			$kode_tiket = "ID-000000" . $jum_tiket;
		} else if (strlen($jum_tiket) == 5) {
			$kode_tiket = "ID-00000" . $jum_tiket;
		} else if (strlen($jum_tiket) == 6) {
			$kode_tiket = "ID-0000" . $jum_tiket;
		} else if (strlen($jum_tiket) == 7) {
			$kode_tiket = "ID-000" . $jum_tiket;
		} else if (strlen($jum_tiket) == 8) {
			$kode_tiket = "ID-00" . $jum_tiket;
		} else if (strlen($jum_tiket) == 9) {
			$kode_tiket = "ID-0" . $jum_tiket;
		} else if (strlen($jum_tiket) == 10) {
			$kode_tiket = "ID-" . $jum_tiket;
		}
	}

		$query="INSERT INTO t_tiket(KODE_TIKET,NIK,PHONE,TGL,WAKTU,KETERANGAN)VALUES('$kode_tiket','$nik','$phone','$tgl_s','$waktu_s','NCI')";
			if (mysqli_query($koneksi, $query)) {
				echo "<script>alert('saved data');window.location.href='cetak-tiket';</script>";		
			} else {
				echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
			}
	
?>