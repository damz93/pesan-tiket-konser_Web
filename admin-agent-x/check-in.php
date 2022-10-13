<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Check In - AGENT X PESAN TIKET KONSER</title>
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
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
			margin-bottom: 50px;
			}
		</style>
		<style>
			ul{
			background-color:#eee;
			cursor:pointer;
			position: absolute;
			width: 50%;
			}
			li{
			padding:5px;
			border:thin solid #fff0f0;
			font-size:16pt;
			}
			li:hover{
			background-color:#6bcdec;
			font-size:16pt;
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
		<form method="post" action="config/proses-checkin" autocomplete="off" onsubmit="return cek_dulu()">
			<table id="tabel1" class="table table-borderless" border="1" cellpadding="0" cellspacing="1">
				<thead align="center">
					<tr>
						<td>
							<p style="font-size:14pt">Masukkan Kode Tiket</p>
						</td>
						<td colspan="3">
							<input autofocus maxlength="40" type="text" class="form-control form-control-lg angka" id="kode_t" name="kode_t" placeholder="Format : ID-XXXXX"> 									   
							<div id="kode_tx" onclick="isi_otomatis2()"></div>
						</td>
					</tr>
					<tr align='center'>
						<br>
						<td colspan="4"><button type="submit" value="simpan" class="btn btn-primary btn-lg btn-block">Check-In</a></button></td>
					</tr>
			</table>
			</form>
		</div>
		<div class="navbar_top">
			<p style="font-size:20pt;color:white"><b>Check-In TIKET<br></b></p>
			<p style="font-size:14pt;color:#6bcdec">Pesan Tiket Konser - Admin</p>
		</div>
		<div class="navbar_bot">
			<table id="tabel2" align="center" width="40%" border="0" cellpadding="0" cellspacing="1">
				<tr>
					<td>
						<a href="menu-utama" style="color:#6bcdec">
							<img align="center" style="display: block; margin: auto;height:50px;" title="Kembali ke Menu Utama" src="img/home_k.png" alt="Back">
							<div class="caption">									
							</div>
						</a>
					</td>
				</tr>
			</table>
		</div>
		<script type="text/javascript">
		function cek_dulu() {			
					var kode_t = document.getElementById("kode_t").value;
					var isi_teks = "Yakin untuk simpan?";
					
					if (kode_t==''){
						alert("Masukkan Kode Tiket...");
						document.getElementById("kode_t").focus();
						return false; 
					}						
					else{									
						return confirm(isi_teks);				
					}
				}	
				</script>
		
		<script type="text/javascript">
			$(document).ready(function(){  
			  $('#kode_t').keyup(function(){  
				   var query = $(this).val();  
				   if(query != '')  
				   {  
						$.ajax({  
							 url:"config/list-auto-kode.php",  
							 method:"POST",  
							 data:{query:query},  
							 success:function(data)  
							 {  
								  $('#kode_tx').fadeIn();
								  $('#kode_tx').html(data);  
							 }  
						});  
				   }  
			  });  
			  $(document).on('click', 'li', function(){ 
					$('#kode_t').val($(this).text());  
					$('#kode_tx').fadeOut();  
			  });  
			});  
		</script>
		<script>
			function isi_otomatis2(){		
				var kode_t = $("#kode_t").val();
				$("#kode_t").val(kode_t);
				//alert('Ok');
			}
					
		</script>
		<script>
			$(function() {
			    $('#kode_t').autocomplete({
			        source: 'config/list-auto-kode.php'
			    });
			});
		</script>
	</body>
</html>