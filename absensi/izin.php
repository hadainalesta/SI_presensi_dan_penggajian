<?php
session_start();
include '../koneksi/connection.php';
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
			<form method="post" enctype="multipart/form-data">
				<?php 
				 $nik=$_GET['nik'];
			$izin=mysqli_query($connection,"SELECT* FROM pegawai where nikPgw='$nik'");
			$row_izin=mysqli_fetch_assoc($izin);

			?>
		<table>
			<tr>
				<td>Tanggal : </td>
				<td><?php 
				date_default_timezone_set('Asia/Jakarta');
				$date=date('Y-m-d');?>
					<input type="date" name="tanggal" value="<?php echo $date;?>" disabled>
				</td>
			</tr>
			<tr>
				<td>Nama Lengkap : </td>
				<td>
					<?php $nik=$_GET['nik'];?>
					<input type="text" name="nama" value="<?php echo $row_izin['namaPgw'];?>" disabled>
				</td>
			</tr>
			<tr>
				<td>NIK : </td>
				<td>
					<?php $nik=$_GET['nik'];?>
					<input type="text" name="nik" value="<?php echo $nik;?>" disabled>
				</td>
			</tr>
			<tr>
				<td>Alasan</td>
				<td>
					<input type="text" name="alasan">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="upload"></td>
			</tr> 
			
		</table>
	</form>
	</section>
	<?php
if (isset($_POST['submit']))
{

		$nikpgw=$_POST['nik'];
			$tanggal=$_POST['tanggal'];
		$alasan = $_POST['alasan'];
		mysqli_query($connection,"INSERT INTO izin VALUES ('$nik','$date','$alasan')");
								header('location:../pegawai/berhasilp?nik=' .$nik);
		


 }
		
		
?>

</body>
</html>
