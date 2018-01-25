<?php
include("head.php");
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


	<h2 class="style1">Data Nilai _ Tambah Data</h2>

    <?php
if (isset($_POST['add'])) {
		$npm=$_POST['npm'];
		$kd_fakultas=$_POST['kd_fakultas'];
		$kd_jurusan=$_POST['kd_jurusan'];
		$kd_makul=$_POST['kd_makul'];
		$nip=$_POST['nip'];
		$nilai_angka=$_POST['nilai_angka'];
		$nilai_huruf=$_POST['nilai_huruf'];

		$cek = mysqli_query($koneksi, "SELECT * from nilai WHERE npm='$npm'");
		if (mysqli_num_rows($cek) == 0){

			$insert = mysqli_query($koneksi, "INSERT INTO nilai VALUES ('$npm', '$kd_fakultas', '$kd_jurusan', '$kd_makul', '$nip', '$nilai_angka', '$nilai_huruf')") or die(mysqli_error($koneksi));

			if ($insert) {
				echo '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Nilai Berhasil Disimpan.</div>';
			}else{
				echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Nilai Berhasil Disimpan.</div>';
			}
		}else{
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>NPM Sudah Ada.</div>';
		}


}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime("- 16 year", $now)); 
$minage = date("Y-m-d", strtotime("- 40 year", $now));



?>


<form class="form-horizontal" action="" method="post">
	<div class="form-group">
		<label class="col-sm-3 control label">Mahasiswa</label>
			<div class="col-sm-2">
				<select name="npm" class="form-control" required>
					<option value=""> - - - - </option>
					<?php
					include "koneksi.php";
					$query="SELECT npm, nama FROM mahasiswa ORDER BY npm";
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
		<label class="col-sm-3 control label">Jurusan</label>
			<div class="col-sm-2">
				<select name="kd_jurusan" class="form-control" required>
					<option value=""> - - - - </option>
					<?php
					include "koneksi.php";
					$query="SELECT kd_jurusan, nm_jurusan FROM jurusan ORDER BY kd_jurusan";
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
		<label class="col-sm-3 control label">Dosen</label>
			<div class="col-sm-2">
				<select name="nip" class="form-control" required>
					<option value=""> - - - - </option>
					<?php
					include "koneksi.php";
					$query="SELECT nip, nama FROM dosen ORDER BY nip";
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
		<label class="col-sm-3 control label">Nilai</label>
			<div class="col-sm-3">
				<input type="number" name="nilai_angka" class="form-control" placeholder="Nilai" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">Terbilang</label>
			<div class="col-sm-3">
				<input type="text" name="nilai_huruf" class="form-control" placeholder="Terbilang" required>
			</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control label">&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
				<a href="nilai_data.php" class="btn btn-sm btn-danger">Batal</a>
			</div>
	</div>



</form>

<?php
include("foot.php")
?>