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
			<?php 
			$hasil=mysqli_query($connection,"SELECT DISTINCT date_format(TanggalDatang, '%M %Y') as bulantahun FROM presensidatang WHERE nikPgw='$nik'");
			?>
			<form method="post">
			<select name="bulantahun">
			<?php 
			while ($data = mysqli_fetch_array($hasil))
			{
			 ?>
			   <option value="<?php echo $data['bulantahun']?>"><?php echo $data['bulantahun'];?></option>
			<?php  } ?>
			<input type="submit" name="submit" value="submit">
			</select>
				
			</form>
			<table border="2px">
				<tr>
					<td>Nomor</td>
					<td>TANGGAL MASUK</td>
					<td>JAM MASUK</td>
					<td>TANGGAL PULANG</td>
					<td>JAM PULANG</td>
					
				</tr>
				<?php
				if(isset($_POST['submit'])){
					$blth = $_POST['bulantahun'];
					$datapresensi=mysqli_query($connection,"SELECT * FROM presensidatang,presensipulang WHERE date_format(presensidatang.TanggalDatang, '%M %Y')='$blth' AND date_format(presensipulang.TanggalPulang, '%M %Y')='$blth' AND presensidatang.nikPgw=presensipulang.nikPgw AND TanggalDatang=TanggalPulang  AND presensidatang.nikPgw=$nik AND presensipulang.nikPgw=$nik ");
				  while($row_datapresensi = mysqli_fetch_array($datapresensi)){ 
				 	?>
				<tr>
					<td><?php echo $row_datapresensi['nikPgw'];?>&nbsp;</td>
					<td><?php echo $row_datapresensi['TanggalDatang'];?>&nbsp;</td>
					<td><?php echo $row_datapresensi['WaktuDatang'];?>&nbsp;</td>
					<td><?php echo $row_datapresensi['TanggalPulang'];?>&nbsp;</td>
					<td><?php echo $row_datapresensi['WaktuPulang'];?>&nbsp;</td>
					
				</tr>
				<?php 



		} 




	} 





				?>
			</table>
		</div>
	</section>
</body>
</html>