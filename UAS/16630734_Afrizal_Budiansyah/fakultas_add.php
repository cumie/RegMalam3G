<?php
include("head.php");
?>

	<h2>Data Fakultas _ Tambah Data</h2>

    <?php
if (isset($_POST['add'])) {
		$kd_fakultas=$_POST['kd_fakultas'];
		$nm_fakultas=$_POST['nm_fakultas'];
		$akreditasi=$_POST['akreditasi'];

		$cek = mysqli_query($koneksi, "SELECT * from fakultas WHERE kd_fakultas='$kd_fakultas'");
		if (mysqli_num_rows($cek) == 0){

			$insert = mysqli_query($koneksi, "INSERT INTO fakultas VALUES ('$kd_fakultas', '$nm_fakultas', '$akreditasi')") or die(mysqli_error($koneksi));

			if ($insert) {
				echo '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Fakultas Berhasil Disimpan.</div>';
			}else{
				echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Fakultas Berhasil Disimpan.</div>';
			}
		}else{
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Kode Fakultas Sudah Ada.</div>';
		}


}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime("- 16 year", $now)); 
$minage = date("Y-m-d", strtotime("- 40 year", $now));



?>


<form class="form-horizontal" action="" method="post">
	<div class="form-group">
		<label class="col-sm-3 control label">Kode Fakultas</label>
			<div class="col-sm-2">
				<input type="text" name="kd_fakultas" class="form-control" placeholder="Kode Fakultas" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Nama Fakultas</label>
			<div class="col-sm-6">
				<input type="text" name="nm_fakultas" class="form-control" placeholder="Nama Fakultas" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Akreditasi</label>
			<div class="col-sm-4">
				<input type="text" name="akreditasi" class="form-control" placeholder="Akreditasi" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
				<a href="fakultas_data.php" class="btn btn-sm btn-danger">Batal</a>
			</div>
	</div>



</form>

<?php
include("foot.php")
?>