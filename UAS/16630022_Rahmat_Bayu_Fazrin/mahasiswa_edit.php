<?php
include("head.php");
?>

	<h2>Data Mahasiswa &raquo; Edit Data</h2>
	<?php
	//$npm=$_GET['npm'];
	//echo $npm;
	//$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm='$npm'");
	//$mark = mysqli_fetch_array($sql);
	//echo $mark[2];
	?>

	<?php
	$nik = $_GET['npm'];
	$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa Where npm='$npm'")	;
	if (mysqli_num_rows($sql) == 0) {
		header("Location:index.php");
	}else{
		$row = mysqli_fetch_assoc($sql);
	}

if (isset($_POST['save'])) {
		$npm 				= $_POST['npm'];
		$nama  				= $_POST['nama'];
		$tempat_lahir 		= $_POST['tempat_lahir'];
		$tanggal_lahir 		= $_POST['tanggal_lahir'];
		$alamat 			= $_POST['alamat'];
		$no_telpon 			= $_POST['no_telpon'];
		$prodi 	  			= $_POST['prodi'];
		$fakultas 			= $_POST['fakultas'];



			$update = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', no_telpon='$no_telpon', prodi='$prodi', fakultas='$fakultas' WHERE npm='$npm'") or die(mysqli_error($koneksi));

			if ($update) {
				header("Location:mahasiswa_edit.php?npm=".$npm."&pesan=sukses");
			}else{
				echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Disimpan Silahkan Coba Lagi.</div>';
			}

		}




if (isset($_GET['pesan']) == 'sukses'){
	echo '<div class="alert alert-succsess alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasi Disimpan.</div>';
}




$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime("- 16 year", $now)); 
$minage = date("Y-m-d", strtotime("- 40 year", $now));



?>


<form class="form-horizontal" action="" method="post">
	<div class="form-group">
		<label class="col-sm-3 control label">NPM</label>
			<div class="col-sm-2">
				<input type="text" name="npm" value="<?php echo $row['npm'];?>" class="form-control" placeholder="NPM" disable>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Nama</label>
			<div class="col-sm-6">
				<input type="text" name="nama" value="<?php echo $row['nama'];?>" class="form-control" placeholder="Nama" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Tempat Lahir</label>
			<div class="col-sm-4">
				<input type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir'];?>" class="form-control" placeholder="Tempat Lahir" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir'];?>" min="<?php echo $minage;?>" max="<?php echo $maxage;?>" class="input-group form-control" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Alamat</label>
			<div class="col-sm-3">
				<textarea name="alamat" class="form-control" placeholder="Alamat"> <?php echo $row['alamat'];?></textarea>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">No Telepon</label>
			<div class="col-sm-3">
				<input type="text" name="no_telpon" value="<?php echo $row['no_telpon'];?>" class="form-control" placeholder="No Telpon" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Prodi</label>
			<div class="col-sm-2">
				<select name="prodi" class="form-control" required>
					<option value="">Pilih Prodi</option>
					<option value="ti">Teknik Informatika</option>
					<option value="si">Sistem Informasi</option>
					<option value="kesmas">Kesehatan Masyarakat</option>
					<option value="ph">Pendidikan Hukum</option>
				</select>
			</div>
			<div class="col-sm-3">
	<b>	Jabatan Sekarang : </b> <span class="label label-success"><?php echo $row['jabatan'];?></span>
	</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control label">Fakultas</label>
			<div class="col-sm-2">
				<select name="fakultas" class="form-control" required>
					<option value="">Pilih Fakultas</option>
					<option value="fti">FTI</option>
					<option value="fkm">FKM</option>
					<option value="fkip">FKIP</option>
				</select>
			</div>
			<div class="col-sm-3">
	<b>	Fakultas Sekarang : </b> <span class="label label-info"><?php echo $row['fakultas'];?></span>
	</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control label">&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" name="save" class="btn btn-sm btn-primary" value="simpan">
				<a href="index.php" class="btn btn-sm btn-danger">Batal</a>
			</div>
	</div>



</form>




<?php
include("foot.php")
?>