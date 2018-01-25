<?php
include("head.php");
?>

	<h2>Data Mata Kuliah _ Tambah Data</h2>

    <?php
if (isset($_POST['add'])) {
		$kd_makul=$_POST['kd_makul'];
		$nm_makul=$_POST['nm_makul'];

		$cek = mysqli_query($koneksi, "SELECT * from makul WHERE kd_makul='$kd_makul'");
		if (mysqli_num_rows($cek) == 0){

			$insert = mysqli_query($koneksi, "INSERT INTO makul VALUES ('$kd_makul', '$nm_makul')") or die(mysqli_error($koneksi));

			if ($insert) {
				echo '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Mata Kuliah Berhasil Disimpan.</div>';
			}else{
				echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Mata Kuliah Berhasil Disimpan.</div>';
			}
		}else{
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Kode Mata Kuliah Sudah Ada.</div>';
		}


}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime("- 16 year", $now)); 
$minage = date("Y-m-d", strtotime("- 40 year", $now));



?>


<form class="form-horizontal" action="" method="post">
	<div class="form-group">
		<label class="col-sm-3 control label">Kode Mata Kuliah</label>
			<div class="col-sm-2">
				<input type="text" name="kd_makul" class="form-control" placeholder="Kode Mata Kuliah" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Nama Mata Kuliah</label>
			<div class="col-sm-6">
				<input type="text" name="nm_makul" class="form-control" placeholder="Nama Mata Kuliah" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
				<a href="makul_data.php" class="btn btn-sm btn-danger">Batal</a>
			</div>
	</div>



</form>

<?php
include("foot.php")
?>