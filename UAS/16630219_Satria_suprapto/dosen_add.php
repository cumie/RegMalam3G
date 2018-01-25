<?php
include("head.php");
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


	<h2 class="style1">Data Dosen _ Tambah Data</h2>

    <?php
if (isset($_POST['add'])) {
		$nip=$_POST['nip'];
		$nama=$_POST['nama'];
		$tmpt_lahir=$_POST['tmpt_lahir'];
		$tgl_lahir=$_POST['tgl_lahir'];
		$jns_kelamin=$_POST['jns_kelamin'];
		$agama=$_POST['agama'];
		$no_hp=$_POST['no_hp'];
		$kd_fakultas=$_POST['kd_fakultas'];
		$kd_makul=$_POST['kd_makul'];

		$cek = mysqli_query($koneksi, "SELECT * from dosen WHERE nip='$nip'");
		if (mysqli_num_rows($cek) == 0){

			$insert = mysqli_query($koneksi, "INSERT INTO dosen VALUES ('$nip', '$nama', '$tmpt_lahir', '$tgl_lahir', '$jns_kelamin', '$agama', '$no_hp', '$kd_fakultas', '$kd_makul')") or die(mysqli_error($koneksi));

			if ($insert) {
				echo '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Dosen Berhasil Disimpan.</div>';
			}else{
				echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Dosen Berhasil Disimpan.</div>';
			}
		}else{
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>NIP Sudah Ada.</div>';
		}


}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime("- 16 year", $now)); 
$minage = date("Y-m-d", strtotime("- 40 year", $now));



?>


<form class="form-horizontal" action="" method="post">
	<div class="form-group">
		<label class="col-sm-3 control label">NIP</label>
			<div class="col-sm-2">
				<input type="number" name="nip" class="form-control" placeholder="NIP" required>
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
				<input type="text" name="tmpt_lahir" class="form-control" placeholder="Tempat Lahir" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<input type="date" name="tgl_lahir" value="" min="<?php echo $minage;?>" max="<?php echo $maxage;?>" class="input-group form-control" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Jenis Kelamin</label>
			<div class="col-sm-3">
				<select name='jns_kelamin' class='feedback-select'>
					<option value=""> - - - - </option>
					<option value='Laki - Laki'>Laki - Laki</option>
					<option value='Perempuan'>Perempuan</option>
				</select>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Agama</label>
			<div class="col-sm-3">
				<select name='agama' class='feedback-select'>
					<option value=""> - - - - </option>
					<option value='Islam'>ISLAM - I</option>
					<option value='Katolik'>KATOLIK - K</option>
					<option value='Protestan'>PROTESTAN - P</option>
					<option value='Hindu'>HINDU - H</option>
					<option value='Budha'>BUDHA - B</option>
					<option value='Lainnya'>LAIN - LAIN - L</option>
				</select>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">No Handphone</label>
			<div class="col-sm-3">
				<input type="number" name="no_hp" class="form-control" placeholder="No Handphone" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Fakultas</label>
			<div class="col-sm-2">
				<select name="kd_fakultas" class="form-control" required>
					<option value=""> - - - - </option>
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
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Mata Kuliah</label>
			<div class="col-sm-2">
				<select name="kd_makul" class="form-control" required>
					<option value=""> - - - - </option>
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
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
				<a href="dosen_data.php" class="btn btn-sm btn-danger">Batal</a>
			</div>
	</div>



</form>

<?php
include("foot.php")
?>