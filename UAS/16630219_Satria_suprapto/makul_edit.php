<?php
include("head.php");
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


	<h2 class="style1">Data Mata Kuliah &raquo; Edit Data</h2>
	<?php
	$kd_makul = $_GET['kd_makul'];
	$sql = mysqli_query($koneksi, "SELECT * FROM makul Where kd_makul='$kd_makul'")	;
	if (mysqli_num_rows($sql) == 0) {
		header("Location:index.php");
	}else{
		$row = mysqli_fetch_assoc($sql);
	}

if (isset($_POST['save'])) {
		$kd_makul=$_POST['kd_makul'];
		$nm_makul=$_POST['nm_makul'];

		$update = mysqli_query($koneksi, "UPDATE makul SET nm_makul='$nm_makul' WHERE kd_makul='$kd_makul'") or die(mysqli_error($koneksi));

			if ($update) {
				header("Location:makul_edit.php?kd_makul=".$kd_makul."&pesan=sukses");
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
		<label class="col-sm-3 control label">Kode Mata Kuliah</label>
			<div class="col-sm-2">
				<input type="text" name="kd_makul" value="<?php echo $row['kd_makul'];?>" class="form-control" placeholder="Kode Mata Kuliah" disable>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Nama Mata Kuliah</label>
			<div class="col-sm-6">
				<input type="text" name="nm_makul" value="<?php echo $row['nm_makul'];?>" class="form-control" placeholder="Nama Mata Kuliah" required>
			</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control label">&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" name="save" class="btn btn-sm btn-primary" value="simpan">
				<a href="makul_data.php" class="btn btn-sm btn-danger">Batal</a>
			</div>
	</div>



</form>




<?php
include("foot.php")
?>