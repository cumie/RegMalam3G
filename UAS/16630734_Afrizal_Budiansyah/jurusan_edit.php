<?php
include("head.php");
?>

	<h2>Data Jurusan &raquo; Edit Data</h2>
	<?php
	$kd_jurusan = $_GET['kd_jurusan'];
	$sql = mysqli_query($koneksi, "SELECT * FROM jurusan Where kd_jurusan='$kd_jurusan'")	;
	if (mysqli_num_rows($sql) == 0) {
		header("Location:index.php");
	}else{
		$row = mysqli_fetch_assoc($sql);
	}

if (isset($_POST['save'])) {
		$kd_jurusan=$_POST['kd_jurusan'];
		$nm_jurusan=$_POST['nm_jurusan'];

		$update = mysqli_query($koneksi, "UPDATE jurusan SET nm_jurusan='$nm_jurusan' WHERE kd_jurusan='$kd_jurusan'") or die(mysqli_error($koneksi));

			if ($update) {
				header("Location:jurusan_edit.php?kd_jurusan=".$kd_jurusan."&pesan=sukses");
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
		<label class="col-sm-3 control label">Kode Jurusan</label>
			<div class="col-sm-2">
				<input type="text" name="kd_jurusan" value="<?php echo $row['kd_jurusan'];?>" class="form-control" placeholder="Kode Jurusan" disable>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Nama Jurusan</label>
			<div class="col-sm-6">
				<input type="text" name="nm_jurusan" value="<?php echo $row['nm_jurusan'];?>" class="form-control" placeholder="Nama Jurusan" required>
			</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control label">&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" name="save" class="btn btn-sm btn-primary" value="simpan">
				<a href="jurusan_data.php" class="btn btn-sm btn-danger">Batal</a>
			</div>
	</div>



</form>




<?php
include("foot.php")
?>