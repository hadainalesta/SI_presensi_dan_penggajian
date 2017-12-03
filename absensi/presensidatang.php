<?php
session_start();
include '../koneksi/connection.php';
$nik = $_GET['nik'];
?>
<!DOCTYPE html>
<html>
<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<section class="navbar">
		<nav>
			<ul>
				<li><a href="../pegawai/datapresensi.php?nik=<?php echo $nik;?>">Data Presensi</a></li>
				<li><a href="../pegawai/dataabsen.php?nik=<?php echo $nik;?>">Data Absen</a></li>
				<li><a href="../pegawai/biodata.php?nik=<?php echo $nik;?>">Biodata</a></li>
				<li><a href="../pegawai/datagaji.php?nik=<?php echo $nik;?>">Data Gaji</a></li>
			</ul>
		</nav>
	</section>
	<section class="isi">
		<h1>Selamat Datang <?php echo $_SESSION['nama'];?></h1>
		<div class="content">
			<h3>ABSENSI</h3>
			<form method="post">
			<table>
				<tr>
					<td><input type="submit" name="jamMasuk" value="TEKAN UNTUK JAM MASUK KERJA">
					</td>
				</tr>
				
			</table>
		</form>
		<?php
				date_default_timezone_set('Asia/Jakarta');
				$date=date('Y-m-d');
				date_default_timezone_set('Asia/Jakarta');
				$time=date('H:i:s');

				$masuk=mysqli_query($connection,"SELECT TanggalDatang FROM presensidatang where TanggalDatang='$date' AND nikPgw='$nik'");

				if(isset($_POST['jamMasuk'])) 
				{
					if(mysqli_num_rows($masuk) > 0){
						header('location:peringatan.php');
					}

					else{
								
								$a=mysqli_query($connection,"INSERT INTO presensidatang VALUES ('$nik','$date','$time')");
								header('location:../absensi/presensipulang.php?nik=' .$nik);
					}
								
				}		

		?>

		</div>
	</section>


</body>
</html>
