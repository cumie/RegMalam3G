<?php
include("head.php");
?>

	<h2>Data Mahasiswa &raquo; Tambah Data</h2>

<?php
if (isset($_POST['add'])) {
		$npm 				= $_POST['npm'];
		$nama  				= $_POST['nama'];	
		$tempat_lahir 		= $_POST['tempat_lahir'];
		$tanggal_lahir 		= $_POST['tanggal_lahir'];
		$alamat 			= $_POST['alamat'];
		$nomor_telpon 			= $_POST['nomor_telpon'];
		$prodi 			= $_POST['prodi'];
		$fakultas 			= $_POST['fakultas'];

		$cek = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE npm='$npm'");
		if (mysqli_num_rows($cek) == 0){

			$insert = mysqli_query($koneksi, "INSERT INTO mahasiswa (npm, nama, tempat_lahir, tanggal_lahir, alamat, nomor_telpon, prodi, fakultas) VALUES ('$npm', '$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telpon', '$prodi', '$fakultas')") or die(mysqli_error($koneksi));

			if ($insert) {
				echo '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Karyawan Berhasil Disimpan.</div>';
			}else{
				echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Karyawan Berhasil Disimpan.</div>';
			}
		}else{
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Nik Sudah Ada.</div>';
		}


}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime("- 16 year", $now)); 
$minage = date("Y-m-d", strtotime("- 40 year", $now));



?>


<form class="form-horizontal" action="" method="post">
	<div class="form-group">
		<label class="col-sm-3 control label">Npm</label>
			<div class="col-sm-2">
				<input type="text" name="npm" class="form-control" placeholder="NPM" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Nama</label>
			<div class="col-sm-6">
				<input type="text" name="nama" class="form-control" placeholder="Nama" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Tempat Lahir</label>
			<div class="col-sm-4">
				<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<input type="date" name="tanggal_lahir" value="" min="<?php echo $minage;?>" max="<?php echo $maxage;?>" class="input-group form-control" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Alamat</label>
			<div class="col-sm-3">
				<textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">No Telepon</label>
			<div class="col-sm-3">
				<input type="text" name="nomor_telpon" class="form-control" placeholder="No Telpon" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Prodi</label>
			<div class="col-sm-2">
				<select name="prodi" class="form-control" required>
					<option value=""> pilih prodi </option>
					<option value="TI">Teknik Informatika</option>
					<option value="SI">Sistem Informasi</option>
					<option value="SM">Manajemen</option>
				</select>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Fakultas</label>
			<div class="col-sm-2">
				<select name="fakultas" class="form-control" required>
					<option value=""> pilih fakultas </option>
					<option value="fti">Fakultas Teknologi Informasi</option>
					<option value="fekon">Fakultas Ekonomi</option>
				</select>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
				<a href="index.php" class="btn btn-sm btn-danger">Batal</a>
			</div>
	</div>



</form>

<?php
include("foot.php")
?>