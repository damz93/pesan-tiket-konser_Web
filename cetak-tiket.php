<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
   <head>
      <head>
	  <title>Cetak Tiket - PESAN TIKET KONSER</title>
         <link rel="shortcut icon" href="img/icon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/journ_bootstrap.min.css">
       	<style type="text/css">
				.left    { text-align: left;}
				.right   { text-align: right;}
				.center  { text-align: center;}
				.justify { text-align: justify;}
			</style>
			<style type="text/css" media="print">
				@page {
				size: 72.1px, 210px;   /* auto is the initial value */    
				}
				</style>
			<style type="text/css" media="print">
				@media screen {
				p.bodyText {font-family:verdana, arial, sans-serif;}
				}
				@media print {
				p.bodyText {font-family:georgia, times, serif;}
				}
				@media screen, print {
				p.bodyText {font-size:9pt}
				size: auto;
				}
			</style>
   </head>
   </head>
   <body>
      <?php 
         include 'admin-agent-x/config/koneksi.php';
         $nik = $_GET['nik'];			         
         date_default_timezone_set('Asia/Hong_Kong');
         $waktu_skg = date("d/m/Y");
         $jam = date("H:i:s");
         $data = mysqli_query($koneksi,"SELECT * FROM t_tiket WHERE NIK='$nik'");
         
         while($de = mysqli_fetch_array($data)){
			$nik = $de['NIK'];
			$phone = $de['PHONE'];
			$idt = $de['KODE_TIKET'];			
         }
         ?>
      <table border="0" style="width:28%" align='left'>
         <tr align="left">
            <td colspan="3">
               <p style="font-size: 10px;">
                  <?php echo $waktu_skg."-".$jam; ?>
               </p>
            </td>
         </tr>
         <tr align='center'>
            <th colspan='3'>
               <img src="img\header.png" width='100%'>
               <br>
               <br>
            </th>
         </tr>
         <tr hidden align="center">
            <td colspan='3'>-------------------------------------------</td>
         </tr>
         <tr align='left'>
            <th colspan="3">
			No. Tiket : 
               <p style="text-align:center;font-size: 20px;">
                  <u><?php echo $idt; ?></u>
               </p>
            </th>
         </tr>
         
         <tr align='left'>
            <th colspan="3">
			Lokasi : 
               <p style="font-size: 12px;">
                  Eboni Ballroom - Gammara Hotel Makassar
               </p>
            </th>
         </tr>
         
         <tr align='left'>
            <th colspan="3">
			Tanggal
               <p style="font-size: 12px;">
                  28 Oct 2022
               </p>
            </th>
         </tr>
         
         <tr align='left'>
            <th colspan="3">
			Jam
               <p style="font-size: 12px;">
                  18:00 - 22:00
               </p>
            </th>
         </tr>
         
         <tr align="center">
            <td colspan="3"><br>- Terima Kasih -</td>
         </tr>
      </table>
      <script>
         window.print();
      </script>
   </body>
</html>