<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Halaman Utama - AGENT X PESAN TIKET KONSER</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/journ_bootstrap.min.css">
		<link rel="shortcut icon" href="img/icon.png">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<style>
			body {margin:0;
			}
            
           .navbar_top {
           vertical-align: super;
           padding-top: 15px;
			background-color: #284d58;
			position: fixed;
			top: 0;
			width: 100%;
			height: auto;
			text-align:center;
			}
            
			.navbar_bot {
			background-color: #284d58;
			position: fixed;
			height: auto;
			bottom: 0px;
			color:white;
			width: 100%;
            padding:5px;
			text-align:center;
			}
			.res2{
			width:100%;
			max-width:75%;
			height:auto;
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-top: auto;
			margin-bottom: 0px;
			padding: 10px;
			}
			.main {;
			padding-top: 150px;
			height: auto;
			margin-bottom: 80px;
			}
		</style>
	</head>
	<body>
	
		<?php 
			error_reporting(0);
			    session_start();					
			    if($_SESSION['status']!="login"){
			    	echo "<script>alert('Login terlebih dahulu...');window.location.href='index?pesan=belum_login';</script>";                    
			    }
			?> 
		<div class="main">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="thumbnail">
							<a href="check-in">
								<img style="display: block; margin: auto;width:100%" title="Check In" class="res2" src="img/checkin.png" alt="Checkin">
								<div class="caption">
									<p style="font-size:16pt;color:#6bcdec;" align="center">Check-In</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="thumbnail">
							<a href="list-tiket">
								<img style="display: block; margin: auto;width:100%" title="Rekap Data Pelanggan" class="res2" src="img/list.png" alt="Data">
								<div class="caption">
									<p style="font-size:16pt;color:#6bcdec;" align="center">List Tiket</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="thumbnail">
							<a href="report" target="_BLANK">
								<img style="display: block; margin: auto;width:100%" title="Report" class="res2" src="img/report.png" alt="Trx">
								<div class="caption">
									<p style="font-size:16pt;color:#6bcdec;" align="center">Report</p>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar_top">
  <p style="font-size:20pt;color:white"><b>Menu Utama<br></b></p>
  <p style="font-size:14pt;color:#6bcdec">Pesan Tiket Konser - Admin</p>
</div>
		<div class="navbar_bot">			
			<table id="tabel2" align="center" width="40%" border="0" cellpadding="0" cellspacing="1">
				<tr>		
					<td>
						<a href="logout" style="color:#6bcdec"> 
							<img align="center" style="display: block; margin: auto;height:50px;" title="Logout" src="img/logout_k.png" alt="Back">
							<div class="caption">
									<!--<p style="font-size:8pt;color:#6bcdec;" align="center">ke Menu Utama</p>-->
							</div>
						</a>
					</td>
					
				</tr>
			</table>
		</div>
		
	</body>
</html>