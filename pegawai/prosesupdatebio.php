<?php 
	session_start();
	include '../koneksi/connection.php'; 
		

		
		$nik=$_POST['nik'];
		$nama = $_POST['nama'];
		$jenis_kelamin=$_POST['jenis_kelamin'];
		$ttl = $_POST['ttl'];
		$alamat = $_POST['alamat'];
		$jabatan = $_POST['jabatan'];
		$username = $_POST['username'];
		$password=$_POST['password'];
		$foto = $_FILES['foto']['name'];
		$tmp = $_FILES['foto']['tmp_name'];
if (isset($_POST['edit']))
{	   
    $fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "../image/".$fotobaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
    $query=mysqli_query($connection,"UPDATE pegawai SET usernamePgw='$username',passwordPgw='$password',  namaPgw='$nama', jkPgw='$jenis_kelamin', ttlPgw='$ttl', alamatPgw='$alamat', jabatanPgw='$jabatan', foto_pegawai='$fotobaru' WHERE nikPgw='$nik'") or die (mysql_error()); // Eksekusi/ Jalankan query dari variabel $query
  if($query){ // Cek jika proses simpan ke database sukses atau tidak
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