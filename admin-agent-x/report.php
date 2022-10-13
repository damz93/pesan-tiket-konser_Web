<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
	<head>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title>Report Tiket - AGENT X PESAN TIKET KONSER</title>
			<!--<meta http-equiv="refresh" content="5; url=form-laporan">-->
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="css/journ_bootstrap.min.css">
			<link rel="shortcut icon" href="img/icon.png">
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
			<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
			<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
			<style type="text/css">
				.left    { text-align: left;}
				.right   { text-align: right;}
				.center  { text-align: center;}
				.justify { text-align: justify;}
			</style>
			<style type="text/css" media="print">
				@page {
				size: a4;   /* auto is the initial value */
				margin: 1;  /* this affects the margin in the printer settings */
				}
			</style>
	</head>
	</head>
	<body>
		<?php 
			error_reporting(0);
			session_start();
			if ($_SESSION['status']!="login") {
			echo "<script>alert('Anda belum login.....');window.location.href='index?pesan=belum_login';</script>";
			}
			else {
			
			}
			?>
		<u>
			<h1 class="center">LAPORAN DATA TIKET</h1>
		</u>
		<h3 class="center">AGENT X PESAN TIKET KONSER</h3>
		<?php
			include 'config/koneksi.php';
			date_default_timezone_set('Asia/Hong_Kong');
			$waktu_skg = date("d-M-Y");
			$jam=date("H:i:s a");
			
			
					function formatTanggal($date){
						return date('d-m-Y', strtotime($date));
					}	
			
			$tiket_nci = mysqli_query($koneksi, "SELECT * from t_tiket WHERE KETERANGAN='NCI' ORDER BY ID ASC");
			$tiket_ci = mysqli_query($koneksi, "SELECT * from t_tiket WHERE KETERANGAN='CI' ORDER BY ID ASC");
			
			$jumt_nc = mysqli_num_rows($tiket_nci);
			$jumt_nci = number_format($jumt_nc,0,',','.');
			$jumt_c = mysqli_num_rows($tiket_ci);
			$jumt_ci = number_format($jumt_c,0,',','.');
			$total = $jumt_nc + $jumt_c;
			?>
		<br>
		<br>
		<p class="right">[<?php echo $waktu_skg." - ".$jam; ?>]</p>
		<p class="right">Jumlah Tiket : <?php echo $total ?></p>
		
		<table border="1" style="width: 100%" align='left'>
			<tr align='left'>
				<td colspan="6"><b>Sudah Check-In</b></td>
			</tr>
			<tr align='center'>
				
				<th width="5%">No</th>
				<th>Kode Tiket</th>
				<th>Phone</th>
				<th>NIK</th>
				<th>Keterangan</th>
				<th>Waktu</th>
				
			</tr>
			<?php 
				$no = 1;		
				$total_keluar=0;
				 while($data = mysqli_fetch_array($tiket_ci)){					
					$kdt = $data['KODE_TIKET'];		
					$nik= $data['NIK'];		
					$phone = $data['PHONE'];		
					$ketr = $data['KETERANGAN'];
					$tgl = formatTanggal($data['TGL']);  
					$hari = date('l', strtotime($data['TGL']));					
					$jam = substr($data['WAKTU'],11,11);							
					$semua = $hari.", ".$tgl." - ".$jam
				?>
			<tr>
				<td align='center'><?php echo $no++; ?></td>
				<td align='center'><?php echo $kdt; ?></td>
				<td align='center'><?php echo $phone; ?></td>
				<td align='center'><?php echo $nik; ?></td>
				<td align='center'>Sudah Check-In</td>
				<td align='left'><?php echo $semua; }?></td>
			</tr>
			<tr>
				<td colspan="5" align="right"><b>Total Sudah Check-In</td>
				<td align='right'> <?php echo $jumt_ci; ?></td>
			</tr>
		</table>
		
		<table border="1" style="width: 100%" align='left'>
			<tr align='left'>
				<td colspan="6"><b>Belum Check-In</b></td>
			</tr>
			<tr align='center'>
				
				<th width="5%">No</th>
				<th>Kode Tiket</th>
				<th>Phone</th>
				<th>NIK</th>
				<th>Keterangan</th>
				<th>Waktu</th>
				
			</tr>
			<?php 
			
				$no = 1;		
				$total_keluar=0;
				 while($data = mysqli_fetch_array($tiket_nci)){					
					$kdt = $data['KODE_TIKET'];		
					$nik= $data['NIK'];		
					$phone = $data['PHONE'];		
					$ketr = $data['KETERANGAN'];
					$tgl = formatTanggal($data['TGL']);  
					$hari = date('l', strtotime($data['TGL']));					
					$jam = substr($data['WAKTU'],11,11);							
					$semua = $hari.", ".$tgl." - ".$jam
				?>
			<tr>
				<td align='center'><?php echo $no++; ?></td>
				<td align='center'><?php echo $kdt; ?></td>
				<td align='center'><?php echo $phone; ?></td>
				<td align='center'><?php echo $nik; ?></td>
				<td align='center'>Belum Check-In</td>
				<td align='left'><?php echo $semua; }?></td>
			</tr>
			<tr>
				<td colspan="5" align="right"><b>Total Belum Check-In</td>
				<td align='right'> <?php echo $jumt_nci; ?></td>
			</tr>
		</table>
		
		
		<script>
			window.print();
		</script>
	</body>
</html>