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
				<li><a href="../admin/datapegawai.php?nik=<?php echo $nik;?>">Data Pegawai</a></li>
				<li><a href="../admin/datapresensi.php?nik=<?php echo $nik;?>">Data Presensi</a></li>
				<li><a href="../admin/dataabsen.php?nik=<?php echo $nik;?>">Data Absen</a></li>
				<li><a href="../admin/biodata.php?nik=<?php echo $nik;?>">Biodata Admin</a></li>
				<li><a href="../admin/datagaji.php?nik=<?php echo $nik;?>">D</a></li>
			</ul>
		</nav>
	</section>
	<section class="isi">
		<h1>Selamat Datang <?php echo $_SESSION['nama'];?></h1>
		<div class="content">
			<h3>ABSENSI</h3>
			<table>
		<?php $biodata=mysqli_query($connection,"SELECT* FROM admin where nikAdmin='$nik'");
			$row_biodata=mysqli_fetch_assoc($biodata);

			?>
			<tr>
				<td></td>
				<?php echo "<td><img src='../image/".$row_biodata['foto_admin']."' width='100' height='100'></td>"?>
			</tr>
			<tr>
				<td>NIK</td>
				<td><?php echo $row_biodata['nikAdmin']; ?></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td><?php echo $row_biodata['namaAdmin']; ?></td>
			</tr>
			<tr>
				<td>jenis kelamin</td>
				<td><?php echo $row_biodata['jkAdmin']; ?></td>
			</tr>
			<tr>
				<td>Tanggal lahir</td>
				<td><?php echo $row_biodata['ttlAdmin']; ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><?php echo $row_biodata['alamatAdmin']; ?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td><?php echo $row_biodata['jabatanAdmin']; ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $row_biodata['usernameAdmin']; ?></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="../pegawai/EditBiodata.php?nik=<?php echo $row_biodata['nikAdmin'];?>"><input type="submit" value="EDIT"></a></td>
			</tr>
  <?php

  $query = "SELECT * FROM sakit WHERE nikPgw='$nik'"; // Query untuk menampilkan semua data siswa
  $sql = mysqli_query($connection, $query); // Eksekusi/Jalankan query dari variabel $query
  $no=1;
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$no."</td>";
     echo "<td>".$data['tanggalSakit']."</td>";
     echo "<td>".$data['jenisPenyakit']."</td>";
    echo "<td><img src='../image/".$data['fotoKetDokter']."' width='100' height='100'></td>";
    echo "</tr>";
    $no++;
  }
  ?>
</table>
		</div>
	</section>


</body>
</html>
