<?php
   include 'config/koneksi.php';
   $kode_t         = $_GET['kode_tk'];
   $tiket  = mysqli_query($koneksi, "select * from t_tiket where KODE_TIKET='$kode_t'");
   $row        = mysqli_fetch_array($tiket);
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Edit Tiket - AGENT X PESAN TIKET KONSER</title>
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
      <style>
         body, html {
         height: 100%;
         margin: 0;
         }
         .bg {
         /* The image used */
         background-image: url("img/bg_.png");
         /* Full height */
         height: 100%; 
         /* Center and scale the image nicely */
         background-position: center;
         background-repeat: no-repeat;
         background-size: cover;
         }
      </style>
   </head>
   <body>
      <div class="bg">
      <?php 
         error_reporting(0);
         session_start();
         if ($_SESSION['status']!="login") {
			echo "<script>alert('Anda belum login.....');window.location.href='index?pesan=belum_login';</script>";
		}
      ?>
      <h1 align='center' style="background-color:#0d5c63;color:#FFFFFe">EDIT TIKET</h1>
      <h3 align='center' style="background-color:#1a828b;color:#FFFFee">AGENT X PESAN TIKET KONSER</h3>
      <div class='container'>
         <a style="background-color:#0d5c63;color:#FFFFFe" href="list-tiket"> [ Kembali ke List Tiket ]</a><br>
         <br>
         <form method="post" action="config/update-tiket" onsubmit="return confirm('Yakin ingin update?');">
            <div class="table-responsive">
               <div class="form-group">
                  <div class="container">
                     <br>
                     <table border="0" class="table" cellpadding="2" cellspacing="2" align=center>
                        <div class="form-group">
                           <tr>
                              <th>Kode Tiket</th>
                              <td colspan="2"><input readonly value="<?php echo $row['KODE_TIKET'];?>" name="KODE_TIKET" class="form-control form-control-sm"></td>
                           </tr>
                           <tr>
                              <th>NIK</th>
                              <td colspan="2"><input autofocus maxlength="16" class="form-control form-control-sm" type="number" value="<?php echo $row['NIK'];?>" name="NIK"></td>
                           </tr>
                           <tr>
                              <th>Phone</th>
                              <td colspan="2"><input class="form-control form-control-sm" maxlength="30" type="number" value="<?php echo $row['PHONE'];?>" name="PHONE"></td>
                           </tr>
                           <tr align='center'>
                              <td colspan="3"><button type="submit" value="simpan" class="btn btn-info btn-sm btn-block">Update</button></td>
                           </tr>
                        </div>
                     </table>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </body>
</html>