<?php
	include '../tampilan/header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>Home</h3>
			<?php
date_default_timezone_set('Asia/Jakarta');
echo date('H:i:s');
$biodata=mysqli_query($connection,"SELECT* FROM pegawai WHERE nikPgw='$nik'");
			$row_biodata=mysqli_fetch_assoc($biodata);?>
			<div class="col-sm-4 col-sm-offset-4 form">
			<div class="outter-form ">
			<form method="post" >
			
				<div class="form-group tengah"><input type="submit" name="presensi" value="PRESENSI" class="btn btn-primary"></div>
				
			
				<div class="form-group tengah"><input type="submit" name="izin" value="IZIN" class="btn btn-success"></div>
				
			
				<div class="form-group tengah"><input type="submit" name="sakit" value="SAKIT" class="btn btn-warning"></div>
				
			
		</form>
	</div>
</div>
		<?php if(isset($_POST['presensi'])) 
		
				{header('location:../absensi/presensidatang.php?nik=' .$row_biodata['nikPgw']);}
				else if(isset($_POST['izin'])) 
				{header('location:../absensi/izin.php?nik=' .$row_biodata['nikPgw']);}
				else if(isset($_POST['sakit'])) 
				{header('location:../pegawai/sakit.php?nik=' .$row_biodata['nikPgw']);}

		?>


	</div>


</body>
</html>
