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
		<table>
			<?php 
			$biodata=mysqli_query($connection,"SELECT* FROM pegawai where nikPgw='$nik'");
			$row_biodata=mysqli_fetch_assoc($biodata);

			?>
			<tr>
				<td>NIK</td>
				<td><?php echo $row_biodata['nikPgw']; ?></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td><?php echo $row_biodata['namaPgw']; ?></td>
			</tr>
			<tr>
				<td>jenis kelamin</td>
				<td><?php echo $row_biodata['jkPgw']; ?></td>
			</tr>
			<tr>
				<td>Tanggal lahir</td>
				<td><?php echo $row_biodata['ttlPgw']; ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><?php echo $row_biodata['alamatPgw']; ?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td><?php echo $row_biodata['jabatanPgw']; ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $row_biodata['usernamePgw']; ?></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="../pegawai/EditBiodata.php?nik=<?php echo $row_biodata['nikPgw'];?>"><input type="submit" value="EDIT"></a></td>
			</tr>


		</table>
		</div>
	</section>


</body>
</html>
