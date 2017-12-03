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
		<table>
			<tr>
				<td>Nik</td>
				<td>
					<?php $nik=$_GET['nik'];?>
					<input type="text" name="nik" value="<?php echo $nik;?>" readonly>
				</td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td><?php 
				date_default_timezone_set('Asia/Jakarta');
				$date=date('Y-m-d');?>
					<input type="date" name="tanggal" value="<?php echo $date;?>" readonly>
				</td>
			</tr>
			<tr>
				<td>Jenis Penyakit</td>
				<td>
					<input type="text" name="jenis_penyakit">
				</td>
			</tr>
			<tr>
				<td>Upload Surat sakit :</td>
				<td>
					<input type="file" name="foto" >
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
		$jenis_penyakit = $_POST['jenis_penyakit'];
		$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "../image/".$fotobaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO sakit VALUES('$nikpgw', '$tanggal', '$jenis_penyakit','$fotobaru')";
  $sql = mysqli_query($connection, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: berhasil.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
}
		
		
?>

</body>
</html>
