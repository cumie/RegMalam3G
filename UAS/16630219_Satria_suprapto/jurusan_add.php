<?php
include("head.php");
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


	<h2 class="style1">Data Jurusan _ Tambah Data</h2>

    <?php
if (isset($_POST['add'])) {
		$kd_jurusan=$_POST['kd_jurusan'];
		$nm_jurusan=$_POST['nm_jurusan'];

		$cek = mysqli_query($koneksi, "SELECT * from jurusan WHERE kd_jurusan='$kd_jurusan'");
		if (mysqli_num_rows($cek) == 0){

			$insert = mysqli_query($koneksi, "INSERT INTO jurusan VALUES ('$kd_jurusan', '$nm_jurusan')") or die(mysqli_error($koneksi));

			if ($insert) {
				echo '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Jurusan Berhasil Disimpan.</div>';
			}else{
				echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Jurusan Berhasil Disimpan.</div>';
			}
		}else{
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Kode Jurusan Sudah Ada.</div>';
		}


}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime("- 16 year", $now)); 
$minage = date("Y-m-d", strtotime("- 40 year", $now));



?>


<form class="form-horizontal" action="" method="post">
	<div class="form-group">
		<label class="col-sm-3 control label">Kode Jurusan</label>
			<div class="col-sm-2">
				<input type="text" name="kd_jurusan" class="form-control" placeholder="Kode Jurusan" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Nama Jurusan</label>
			<div class="col-sm-6">
				<input type="text" name="nm_jurusan" class="form-control" placeholder="Nama Jurusan" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
				<a href="jurusan_data.php" class="btn btn-sm btn-danger">Batal</a>
			</div>
	</div>



</form>

<?php
include("foot.php")
?>