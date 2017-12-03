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
<form action="" method="get">
  <label>Cari :</label>
  <input type="text" name="cari">
  <input type="submit" value="Cari">
</form>
 
<?php 
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
 
<table border="1">
  <tr>
    <td>No</td>
    <td>Foto Profil</td>
    <td>Nama</td>
    <td>NIK</td>
    <td>Jabatan</td>
    <td>Aksi</td>

  </tr><?php 
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $data = mysqli_query($connection,"SELECT * from pegawai where namaPgw like '%".$cari."%'");       
  }else{
    $data = mysqli_query($connection,"SELECT * FROM pegawai");   
  }
  $no = 1;
 
  while($d = mysqli_fetch_array($data)){
  ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo "<img src='../image/".$d['foto_pegawai']."' width='100' height='100'>"; ?></td>
    <td><?php echo $d['namaPgw']?></td>
    <td><?php echo $d['nikPgw']?></td>
    <td><?php echo $d['jabatanPgw']?></td>
    <td><a href="lihat-sakit.php?nik=<?php echo $d['nikPgw'];?>">Lihat Data Sakit</a></td>
  </tr>
  <?php $no++;} ?>
</table>

		</div>
	</section>


</body>
</html>
