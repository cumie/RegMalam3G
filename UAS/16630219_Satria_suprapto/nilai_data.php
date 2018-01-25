<?php
include("head.php");
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


<h2 class="style1">Data Nilai</h2>
<hr/>

<?php
if (isset($_GET['aksi']) == 'delete') {
	$npm = $_GET['npm'];
	$cek = mysqli_query($koneksi, "SELECT * FROM nilai where npm='$npm'");
	if (mysqli_num_rows($cek) == 0){

		echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Tidak Ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM nilai where npm='$npm'");
		if ($delete){
			echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
		}else{
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
		}
	}
}

$pageSql = "SELECT * FROM nilai ORDER BY npm ASC";
if (isset($_POST['qcari'])){
	$qcari = $_POST['qcari'];
	$pageSql = "SELECT * FROM nilai where npm like '%$qcari%' or nama like '%$qcari%' or kd_makul like '%$qcari%'";
}

?>


<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="nilai_add.php">Tambah Data</a>
		<br/>
		<br/>
<div class="form-group">
	<div class="left">
		<form class="form-inline" method="get">
			<select name="filter" class="form-control" onchange="form.submit()">
				<option value="0">Filter Data Nilai</option>
				<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
				<option value="1" <?php if($filter == '1'){ echo 'selected';}?>>1</option>
				<option value="2" <?php if($filter == '2'){ echo 'selected';}?>>2</option>
				<option value="3" <?php if($filter == '3'){ echo 'selected';}?>>3</option>
				<option value="4" <?php if($filter == '4'){ echo 'selected';}?>>4</option>
				<option value="5" <?php if($filter == '5'){ echo 'selected';}?>>5</option>
				<option value="6" <?php if($filter == '6'){ echo 'selected';}?>>6</option>
				<option value="7" <?php if($filter == '7'){ echo 'selected';}?>>7</option>
				<option value="8" <?php if($filter == '8'){ echo 'selected';}?>>8</option>
			</select>
		</form>

	</div>
	<div class="right">
		<form class="" method="POST" action="nilai_data.php">
			<input type="text" class="form-control" name="qcari" placeholder="Cari..." autofocus/>
		</form>

	</div>



</div>


<br/>
<br/>

<div class="table-responsive">
	<table class="table table-striped table-hover">
		<tr>
			<th>No</th>
			<th>NPM</th>
			<th>Nama Mahasiswa</th>
			<th>Kode Fakultas</th>
			<th>Nama Fakultas</th>
			<th>Kode Jurusan</th>
			<th>Nama Jurusan</th>
			<th>Kode Mata Kuliah</th>
			<th>Nama Mata Kuliah</th>
			<th>NIP</th>
			<th>Nama Dosen</th>
			<th>Nilai</th>
			<th>Terbilang</th>
			<th>Semester</th>
			<th>Tools</th>
		</tr>
		<?php
		if ($filter){
			$sql = mysqli_query($koneksi, "SELECT nilai.npm, mahasiswa.nama, nilai.kd_fakultas, fakultas.nm_fakultas, nilai.kd_jurusan, jurusan.nm_jurusan, nilai.kd_makul, makul.nm_makul, nilai.nip, dosen.nama, nilai.nilai_angka, nilai.nilai_huruf, mahasiswa.semester FROM mahasiswa RIGHT JOIN mahasiswa ON nilai.npm=mahasiswa.npm RIGHT JOIN fakultas ON nilai.kd_fakultas=fakultas.kd_fakultas RIGHT JOIN jurusan nilai.kd_jurusan=jurusan.kd_jurusan RIGHT JOIN makul ON nilai.kd_makul=makul.kd_makul RIGHT JOIN dosen ON nilai.nip=dosen.nip WHERE semester='$filter' ORDER BY npm ASC");
		}else{

			$sql = mysqli_query($koneksi, $pageSql);
		}
		if (mysqli_num_rows($sql) == 0) {
		?>
		<tr><td colspan="8"> Data Tidak Ada. </td></tr>
		<?php
		}else{

			$no = 1;
			while($row = mysqli_fetch_assoc($sql)){
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $row['npm'];?></td>
			<td><?php echo $row['nama'];?></td>
			<td><?php echo $row['kd_fakultas'];?></td>
			<td><?php echo $row['nm_fakultas'];?></td>
			<td><?php echo $row['kd_jurusan'];?></td>
			<td><?php echo $row['nm_jurusan'];?></td>
			<td><?php echo $row['kd_makul'];?></td>
			<td><?php echo $row['nm_makul'];?></td>
			<td><?php echo $row['nip'];?></td>
			<td><?php echo $row['nama'];?></td>
			<td><?php echo $row['nilai_angka'];?></td>
			<td><?php echo $row['nilai_huruf'];?></td>
			<td>
				<?php
				if($row['semester'] == '1'){
				?>
				<span class="label label-success">1</span>
				<?php
					}else if($row['semester'] == '2'){
				?>
				<span class="label label-success">2</span>
				<?php
					}else if($row['semester'] == '3'){
				?>
				<span class="label label-success">3</span>
				<?php
					}else if($row['semester'] == '4'){
				?>
				<span class="label label-success">4</span>
				<?php
					}else if($row['semester'] == '5'){
				?>
				<span class="label label-success">5</span>
				<?php
					}else if($row['semester'] == '6'){
				?>
				<span class="label label-success">6</span>
				<?php
					}else if($row['semester'] == '7'){
				?>
				<span class="label label-success">7</span>
				<?php
					}else if($row['semester'] == '8'){
				?>
				<span class="label label-success">8</span>
				<?php
				}
				?>

			</td>

			<td>
				<a href="nilai_edit.php?npm=<?php echo $row['npm'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

				<a href="nilai_data.php?aksi=delete&npm=<?php echo $row['npm'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data<?php echo $row['nama'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>

		</tr>
		<?php
		$no++;
		}
	}
		?>
	</table>



</div>

<?php
include("foot.php");
?>
