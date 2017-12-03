<?php
session_start();
include '../koneksi/connection.php';
$nik=$_GET['nik'];
?>
<!DOCTYPE html>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=2">
		<meta charset="utf-8">
		<title>Home</title>
		<link rel="stylesheet" href="../style/css/bootstrap.min.css" >
		<link rel="stylesheet" href="../style/style.css" >
		
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		  <script src="../style/js/bootstrap.min.js"></script>
</head>
<body >
	<div class="navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#"  class="navbar-brand">Absensi dan Penggajian</a>
				
			</div>
			<div class="collapse navbar-collapse">				
					<ul class="nav navbar-nav navbar-right">
						
						<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $_SESSION['nama']  ?><span class="glyphicon glyphicon-user"></span></a></li>
					</ul>
			</div>
		</div>
	</div>
	
	<div class="col-sm-2 abu">
		<div class="row tinggi">
			<?php 
			$nik=$_GET['nik'];
			$foto=mysqli_query($connection,"SELECT foto_pegawai FROM pegawai where nikPgw='$nik'");
			while($f=mysqli_fetch_array($foto)){
				?>				
				<div class="col-md-2"></div>
				<div class="col-xs-6 col-md-8">
					<a class="thumbnail">
						<center><img class="img-responsive" src="../image/<?php echo $f['foto_pegawai']; ?>"></center>
					</a>
				</div>
				<div class="col-md-2"></div>
				<?php 
			}
			?>	
		</div>
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			
			<li class="active"><a href="../pegawai/datapresensi.php?nik=<?php echo $nik;?>"><span class="glyphicon glyphicon-home"></span>Data Presensi</a><li>



			<li><a href="../pegawai/dataabsen.php?nik=<?php echo $nik;?>" ><span class="glyphicon glyphicon-home"></span>Data Absen</a><li>
			<li><a href="../pegawai/datasakit.php?nik=<?php echo $nik;?>"><span class="glyphicon glyphicon-home"></span>Data Sakit</a><li>
			<li><a href="../pegawai/dataizin.php?nik=<?php echo $nik;?>"><span class="glyphicon glyphicon-home"></span>Data Izin</a><li>
			<li><a href="../pegawai/biodata.php?nik=<?php echo $nik;?>"><span class="glyphicon glyphicon-home"></span>Biodata</a><li>
			<li><a href="../penggajian/gajikaryawan.php?nik=<?php echo $nik;?>" ><span class="glyphicon glyphicon-home"></span>Data Gaji</a><li>
		</ul>
	</div>
	<div class="col-sm-10">