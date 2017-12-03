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
      $hasil=mysqli_query($connection,"SELECT DISTINCT date_format(TanggalDatang, '%M %Y') as bulantahun FROM presensidatang WHERE nikPgw='$nik' ORDER BY CONCAT(date_format(TanggalDatang,'%m %Y'))");
      $pgw=mysqli_query($connection,"SELECT * from pegawai where nikPgw='$nik'");

      ?>
      <table border="1">
        <tr>
          <td>Foto Profil</td>
          <td>Nama Pegawai</td>
          <td>NIK</td>
          <td>Jabatan</td>
          
        </tr>
         <?php while ($d = mysqli_fetch_array($pgw))
      {?>
        <tr>
          <td><?php echo "<img src='../image/".$d['foto_pegawai']."' width='100' height='100'>"; ?></td>
          <td><?php echo $d['namaPgw']?></td>
          <td><?php echo $d['nikPgw']?></td>
          <td><?php echo $d['jabatanPgw']?></td>
        </tr>
       <?php } ?>
      </table>
      <form method="post">
      <select name="bulantahun">
      <?php 
      while ($data = mysqli_fetch_array($hasil))
      {
       ?>
         <option value="<?php echo $data['bulantahun'];?>"><?php echo $data['bulantahun'];?></option>
      <?php  } ?>
      <input type="submit" name="submit" value="submit">
      </select>
        
      </form>
      <table>
     <tr>
    <td>No</td>
    <td>Tanggal</td>
    <td>jenis penyakit</td>
    <td>foto</td>
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