<?php
	include 'koneksi.php';
	  if(isset($_POST["query"])){
		$output = '';
		$searchTerm = $_POST['query']; 
		$query="SELECT DISTINCT(`KODE_TIKET`) FROM t_tiket WHERE KODE_TIKET LIKE '%".$searchTerm."%' AND KETERANGAN='NCI' ORDER BY ID ASC LIMIT 5"; 
	 

		$hasil=mysqli_query($koneksi,$query);
		$output = '<ul class="list-unstyled">';
		if (mysqli_num_rows($hasil)>0) {    
			while ($row = mysqli_fetch_array($hasil)) {
				$output .= '<li>'.$row["KODE_TIKET"].'</li>';  
			}
		}
		else{
			//$output .= '<li>Phone belum terinput...</li>';  
			
		}
			$output .= '</ul>';
			echo $output;


	  }
?>