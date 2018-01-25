<?php
include("head.php");
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


	<h2 class="style1">Data Fakultas &raquo; Edit Data</h2>
	<?php
	$kd_fakultas = $_GET['kd_fakultas'];
	$sql = mysqli_query($koneksi, "SELECT * FROM fakultas Where kd_fakultas='$kd_fakultas'")	;
	if (mysqli_num_rows($sql) == 0) {
		header("Location:index.php");
	}else{
		$row = mysqli_fetch_assoc($sql);
	}

if (isset($_POST['save'])) {
		$kd_fakultas=$_POST['kd_fakultas'];
		$nm_fakultas=$_POST['nm_fakultas'];
		$akreditasi=$_POST['akreditasi'];

		$update = mysqli_query($koneksi, "UPDATE fakultas SET nm_fakultas='$nm_fakultas',akreditasi='$akreditasi' WHERE kd_fakultas='$kd_fakultas'") or die(mysqli_error($koneksi));

			if ($update) {
				header("Location:fakultas_edit.php?kd_fakultas=".$kd_fakultas."&pesan=sukses");
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
		<label class="col-sm-3 control label">Kode Fakultas</label>
			<div class="col-sm-2">
				<input type="text" name="kd_fakultas" value="<?php echo $row['kd_fakultas'];?>" class="form-control" placeholder="Kode Fakultas" disable>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Nama Fakultas</label>
			<div class="col-sm-6">
				<input type="text" name="nm_fakultas" value="<?php echo $row['nm_fakultas'];?>" class="form-control" placeholder="Nama Fakultas" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Akreditasi</label>
			<div class="col-sm-4">
				<input type="text" name="akreditasi" value="<?php echo $row['akreditasi'];?>" class="form-control" placeholder="Akreditasi" required>
			</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control label">&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" name="save" class="btn btn-sm btn-primary" value="simpan">
				<a href="fakultas_data.php" class="btn btn-sm btn-danger">Batal</a>
			</div>
	</div>



</form>




<?php
include("foot.php")
?>