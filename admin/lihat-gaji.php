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
      <?php 
      $query=mysqli_query($connection,"SELECT* FROM kelola_gaji");
      $data=mysqli_fetch_assoc($query);

      ?>
      <h1>Pendapatan Pegawai</h1>
    <table>
      <?php 
        $query_lembur=mysqli_query($connection,"SELECT * FROM lembur where nikPgw='$nik'");
        
      ?>
      <tr>
        <td>Gaji Pokok</td>
        <td><?php echo "Rp. ".$data['gaji_pokok']; ?></td>
      </tr>
      <tr>
        <td>Tunjangan Masa Kerja</td>
        <td><?php echo "Rp. ".$data['tmj']; ?></td>
      </tr>
      <tr>
        <?php $total_gaji=$data['gaji_pokok']+$data['tmj']?>
        <td>Total Gaji</td>
        <td><?php echo "Rp. ".$total_gaji; ?></td>
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
        <?php
          $jumlah=0;
          while ($lembur=mysqli_fetch_array($query_lembur)) 
          {
            $jumlah=$jumlah+$lembur['total_jumlah'];
          }
        ?>
        <td>Lembur Harian</td>
        <td><?php echo "Rp. ".$jumlah;?></td>
      </tr>
      <tr>
        <?php $pendapatan_kotor=$total_gaji+$data['bonus_jabatan']+$data['bonus_transport']+$jumlah;?>
        <td>Pendapatan Kotor</td>
        <td><?php echo "Rp. ".$pendapatan_kotor; ?></td>
      </tr>
    </table>
    <h1>Potongan Gaji</h1>
    <table>
      <tr>
        
        <td>Jaminan Kesehatan Pegawai <?php echo $data['jkp']. " %";?></td>
        <?php
          $jkp=$total_gaji*($data['jkp']/100);
        ?>
        <td><?php echo "Rp".$jkp; ?></td>
      </tr>
      <tr>
        <td>Jaminan Hari Tua <?php echo $data['jht']. " %";?></td>
        <?php
          $jht=$total_gaji*($data['jht']/100);
        ?>
        <td><?php echo "Rp".$jht; ?></td>
      </tr>
      <tr>
        <td>Jaminan Pensiun <?php echo $data['jp']. " %";?></td>
        <?php
          $jp=$total_gaji*($data['jp']/100);
        ?>
        <td><?php echo "Rp".$jp; ?></td>
      </tr>
      <tr>
        <td>Absen</td>
        <?php $baris=intval($_SESSION['baris']);
        $absen=$data['absen']*$baris;
        ?>
        <td><?php echo "Rp. ".$absen; ?></td>
      </tr>
      <tr>
        <?php

        $total_potongan=$jkp+$jht+$jp+$absen;
        
         ?>
        <td>Total potongan</td>
        <td><?php echo "Rp .".$total_potongan;?></td>
      </tr>
    </table>
    <table>
      <tr>
        <?php
          $pendapatan_bersih=$pendapatan_kotor-$total_potongan;
        ?>
        <td>Pendapatan Bersih</td>
        <td><?php echo "Rp. ".$pendapatan_bersih;?></td>
      </tr>
    </table>




  } 





        ?>
      
    </div>
  </section>
</body>
</html>