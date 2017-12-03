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
			$query_mysql = mysqli_query($connection,"SELECT * FROM kelola_gaji");
						while($data = mysqli_fetch_array($query_mysql)){
			?>
			<h1>Pendapatan Karyawan Perbulan</h1>
		<table>
			<tr>
				<td>Tanggal</td>
				<td><?php 
				date_default_timezone_set('Asia/Jakarta');
				$date=date('Y-m-d');?>
					<input type="date" name="tanggal" value="<?php echo $date;?>" readonly>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>Gaji Pokok</td>
				<td>
					<input type="number" name="gp"  min="2463461" max="5000000"  value="<?php echo $data['gaji_pokok'];?>">
				</td>
			</tr>
			<tr>
				<td>Tunjangan Masa Kerja</td>
				<td>
					<input type="number" name="tmj"  min="1000" max="50000" step="500" value="<?php echo $data['tmj'];?>">
				</td>
			</tr>
		</table>
		<h1>Bonus Karyawan</h1>
		<table>
			<tr>
				<td>Bonus Jabatan</td>
				<td>
					<input type="number" name="bj"  min="100000" max="5000000" step="100000" value="<?php echo $data['bonus_jabatan'];?>">
				</td>
			</tr>
			<tr>
				<td>Bonus Transportasi</td>
				<td>
					<input type="number" name="bt"  min="5000" max="50000" step="500" value="<?php echo $data['bonus_transport'];?>">
				</td>
			</tr>
			<tr>
				<td>Harga Lembur/jam</td>
				<td>
					<input type="number" name="lembur"  min="10000" max="100000" step="1000" value="<?php echo $data['lembur_harian'];?>">
				</td>
			</tr>
		</table>
		<h1>Potongan Karyawan</h1>
		<table>
			<tr>
				<td>Jaminan Kesehatan Pegawai (%)</td>
				<td><input type="number" name="jkp"  min="1" max="100" step="1"  value="<?php echo $data['jkp'];?>"></td>
			</tr> 
			<tr>
				<td>Jaminan Hari Tua</td>
				<td>
					<input type="number" name="jht"  min="1" max="100"  step="1" value="<?php echo $data['jht'];?>">
				</td>
			</tr>
			<tr>
				<td>Jaminan Pensiun</td>
				<td>
					<input type="number" name="jp"  min="1" max="100"  step="1" value="<?php echo $data['jp'];?>">
				</td>
			</tr>
			<tr>
				<td>Absen (per hari)</td>
				<td>
					<input type="number" name="absen"  min="50000" max="200000" step="5000"  value="<?php echo $data['absen'];?>">
				</td>
			</tr>
			
		</table>
		<table>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="simpan"></td>
			</tr>

		</table>
		<?php } ?>
	</form>
	</section>
	<?php
if (isset($_POST['submit']))
{
		
		date_default_timezone_set('Asia/Jakarta');
		$datetime=date('Y-m-d H:i:s');
		$gaji_pokok = $_POST['gp'];
		$tmj = $_POST['tmj'];
		$bonus_jabatan= $_POST['bj'];
		$bonus_transport = $_POST['bt'];
		$lembur = $_POST['lembur'];
		$jkp = $_POST['jkp'];
		$jht= $_POST['jht'];
		$jp = $_POST['jp'];
		$absen = $_POST['absen'];

		mysqli_query($connection,"UPDATE kelola_gaji SET tanggal_update='$datetime',gaji_pokok='$gaji_pokok',  tmj='$tmj', bonus_jabatan='$bonus_jabatan', bonus_transport='$bonus_transport', lembur_harian='$lembur', jkp='$jkp',jht='$jht',jp='$jp',absen='$absen' ");
		header('location:penggajian.php');
}
		
		
?>

</body>
</html>
