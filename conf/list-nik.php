<?php
	include '../admin-agent-x/config/koneksi.php';
	$nik = $_GET['nikx'];
	$query = mysqli_query($koneksi, "select * from t_tiket where NIK='$nik'");
	$us = mysqli_fetch_array($query);
	$data = array(
				'nik'      =>  $us['NIK'],);
	 echo json_encode($data);
?>