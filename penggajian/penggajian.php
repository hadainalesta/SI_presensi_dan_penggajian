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
			$query=mysqli_query($connection,"SELECT* FROM kelola_gaji");
			$data=mysqli_fetch_assoc($query);

			?>
			<h1>Pendapatan Pegawai</h1>
		<table>
			
			<tr>
				<td>Gaji Pokok</td>
				<td><?php echo "Rp. ".$data['gaji_pokok']; ?></td>
			</tr>
			<tr>
				<td>Tunjangan Masa Kerja</td>
				<td><?php echo "Rp. ".$data['tmj']; ?></td>
			</tr>
		</table>
		<h1>Bonus Pegawai</h1>
		<table>
			<tr>
				<td>Bonus Jabatan</td>
				<td><?php echo "Rp. ".$data['bonus_jabatan']; ?></td>
			</tr>
			<tr>
				<td>Bonus Transportasi</td>
				<td><?php echo "Rp. ".$data['bonus_transport']; ?></td>
			</tr>
			<tr>
				<td>Lembur Harian</td>
				<td><?php echo "Rp. ".$data['lembur_harian']." /Jam";?></td>
			</tr>
		</table>
		<h1>Potongan Gaji</h1>
		<table>
			<tr>
				<td>Jaminan Kesehatan Pegawai</td>
				<td><?php echo $data['jkp']." %"; ?></td>
			</tr>
			<tr>
				<td>Jaminan Hari Tua</td>
				<td><?php echo $data['jht']." %"; ?></td>
			</tr>
			<tr>
				<td>Jaminan Pensiun</td>
				<td><?php echo $data['jp']." %"; ?></td>
			</tr>
			<tr>
				<td>Absen</td>
				<td><?php echo "Rp. ".$data['absen']; ?></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="../penggajian/editkelolagaji.php"><input type="submit" value="EDIT"></a></td>
			</tr>


		</table>
		</div>
	</section>


</body>
</html>
