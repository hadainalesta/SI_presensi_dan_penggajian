<?php 
session_start();

	include '../koneksi/connection.php'; 

		
			$nik=$_GET['nik'];
			$file_tmp=$_FILES['file']['tmp_name'];
			$file_type=$_FILES['file']['type'];
			$file_name=$_FILES['file']['name'];
			$direktori="image/$file_name";
			if(!empty($file_tmp))
			{
				move_uploaded_file($file_tmp, $direktori);
			}
			$nikpgw=$_POST['nik'];
			$tanggal=$_POST['tanggal'];
		$jenis_penyakit = $_POST['jenis_penyakit'];
	
		$a=mysqli_query($connection,"INSERT INTO sakit VALUES ('$nikpgw','$tanggal','$jenis_penyakit','$file_name')");
			if(!$a){
				echo "GAGAL";
			}
		
		?>