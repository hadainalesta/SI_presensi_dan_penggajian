<?php
session_start();
include '../koneksi/connection.php';
$nik=$_GET['nik'];
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
					<td><input type="submit" name="jamPulang" value="TEKAN UNTUK JAM PULANG KERJA">
					</td>
				</tr>
				
			</table>
		</form>
		<?php
				date_default_timezone_set('Asia/Jakarta');
				$date=date('Y-m-d');
				date_default_timezone_set('Asia/Jakarta');
				$time=date('H:i:s');
				$nik = $_GET['nik'];
				$pulang=mysqli_query($connection,"SELECT TanggalPulang FROM presensipulang where TanggalPulang='$date' AND nikPgw='$nik'");

				if(isset($_POST['jamPulang'])) 
				{
					if(mysqli_num_rows($pulang) > 0){
						header('location:peringatan.php');
					}

					else{

							
								$a=mysqli_query($connection,"INSERT INTO presensipulang VALUES ('$nik','$date','$time')");
								$query=mysqli_query($connection,"SELECT WaktuPulang FROM presensipulang where TanggalPulang='$date' AND nikPgw='$nik'");
							$data=mysqli_fetch_array($query);

								$lembur=$data['WaktuPulang'];
								$array=explode(":",$lembur);
								$jam=$array[0];
								echo $jamutama=intval($jam)."<br>";
								$date1="15:00:00";
								$date2="16:00:00";
								$date3="17:00:00";
								$array1=explode(":",$date1);
								$jam1=$array1[0];
								echo $jam_1=intval($jam1)."<br>";
								$array2=explode(":",$date2);
								$jam2=$array2[0];
								echo $jam_2=intval($jam2)."<br>";
								$array3=explode(":",$date3);
								$jam3=$array3[0];
								echo $jam_3=intval($jam3)."<br>";
								
								
								if($jamutama===$jam_1)
								{
									$jam_lembur=0;
									$total_bayar=0;
									
										mysqli_query($connection,"INSERT INTO lembur VALUES('$date','$time','$nik','$jam_lembur','$total_bayar')");
										echo "1";
								}
								else if($jamutama>=$jam_2)
								{
									$jam_lembur=1;
									$total_bayar=10000*$jam_lembur;
									
										mysqli_query($connection,"INSERT INTO lembur VALUES('$date','$time','$nik','$jam_lembur','$total_bayar')");
										echo "2";
								}
								else if($jamutama>=$jam_3)
								{
									$jam_lembur=2;
									$total_bayar=10000*$jam_lembur;
									
									mysqli_query($connection,"INSERT INTO lembur VALUES('$date','$time','$nik','$jam_lembur','$total_bayar')");
									echo "3";
									
								}
							


				}
								
				}		

		?>

		</div>
	</section>


</body>
</html>
