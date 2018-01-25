<?php
include("head.php");
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


	<h2 class="style1">Data Dosen &raquo; Edit Data</h2>
	<?php
	$nip = $_GET['nip'];
	$sql = mysqli_query($koneksi, "SELECT * FROM dosen Where nip='$nip'")	;
	if (mysqli_num_rows($sql) == 0) {
		header("Location:index.php");
	}else{
		$row = mysqli_fetch_assoc($sql);
	}

if (isset($_POST['save'])) {
		$nip=$_POST['nip'];
		$nama=$_POST['nama'];
		$tmpt_lahir=$_POST['tmpt_lahir'];
		$tgl_lahir=$_POST['tgl_lahir'];
		$jns_kelamin=$_POST['jns_kelamin'];
		$agama=$_POST['agama'];
		$no_hp=$_POST['no_hp'];
		$kd_fakultas=$_POST['kd_fakultas'];
		$kd_makul=$_POST['kd_makul'];

		$update = mysqli_query($koneksi, "UPDATE dosen SET nama='$nama',tmpt_lahir='$tmpt_lahir',tgl_lahir='$tgl_lahir',jns_kelamin='$jns_kelamin',agama='$agama',no_hp='$no_hp',kd_fakultas='$kd_fakultas',kd_makul='$kd_makul' WHERE nip='$nip'") or die(mysqli_error($koneksi));

			if ($update) {
				header("Location:dosen_edit.php?nip=".$nip."&pesan=sukses");
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
				<input type="number" name="nip" value="<?php echo $row['nip'];?>" class="form-control" placeholder="NPM" disable>
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
				<input type="text" name="tmpt_lahir" value="<?php echo $row['tmpt_lahir'];?>" class="form-control" placeholder="Tempat Lahir" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<input type="date" name="tgl_lahir" value="<?php echo $row['tgl_lahir'];?>" min="<?php echo $minage;?>" max="<?php echo $maxage;?>" class="input-group form-control" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Jenis Kelamin</label>
			<div class="col-sm-3">
				<input type="text" name="jns_kelamin" value="<?php echo $row['jns_kelamin'];?>" class="form-control" placeholder="Jenis Kelamin" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Agama</label>
			<div class="col-sm-3">
				<input type="text" name="agama" value="<?php echo $row['agama'];?>" class="form-control" placeholder="Agama" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">No Handphone</label>
			<div class="col-sm-3">
				<input type="number" name="no_hp" value="<?php echo $row['no_hp'];?>" class="form-control" placeholder="No Handphone" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Fakultas</label>
			<div class="col-sm-2">
				<select name="kd_fakultas" class="form-control" required>
					<option value=""> - Fakultas Terbaru - </option>
					<?php
					include "koneksi.php";
					$query="SELECT kd_fakultas, nm_fakultas FROM fakultas ORDER BY kd_fakultas";
					$hasil=mysqli_query($koneksi,$query);
			    		while ($data = mysqli_fetch_row($hasil)) {
						echo "<option value='$data[0]'>$data[0] | $data[1]</option>";
					}
					mysqli_close($koneksi,$link);
					?>
				</select>
			</div>
			<div class="col-sm-3">
				<b>	Fakultas Sekarang : </b> <span class="label label-success"><?php echo $row['kd_fakultas'];?></span>
			</div>	
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Mata Kuliah</label>
			<div class="col-sm-2">
				<select name="kd_makul" class="form-control" required>
					<option value=""> - Mata Kuliah Terbaru - </option>
					<?php
					include "koneksi.php";
					$query="SELECT kd_makul, nm_makul FROM makul ORDER BY kd_makul";
					$hasil=mysqli_query($koneksi,$query);
			    		while ($data = mysqli_fetch_row($hasil)) {
						echo "<option value='$data[0]'>$data[0] | $data[1]</option>";
					}
					mysqli_close($koneksi,$link);
					?>
				</select>
			</div>
			<div class="col-sm-3">
				<b>	Mata Kuliah Sekarang : </b> <span class="label label-success"><?php echo $row['kd_makul'];?></span>
			</div>	
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control label">&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" name="save" class="btn btn-sm btn-primary" value="simpan">
				<a href="dosen_data.php" class="btn btn-sm btn-danger">Batal</a>
			</div>
	</div>



</form>




<?php
include("foot.php")
?>