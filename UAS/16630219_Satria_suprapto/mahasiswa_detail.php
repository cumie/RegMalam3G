<?php
include("head.php");

?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


<h2 class="style1">Data Mahasiswa _ Biodata</h2>
<hr/>

<?php
$npm = $_GET['npm'];
$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm='$npm'");
if(mysqli_num_rows($sql) == 0){
	header("location:index.php");
}else{
	$row = mysqli_fetch_assoc($sql);
}

if (isset($_GET['aksi']) == 'delete'){
	$delete = mysqli_query($koneksi, "DELETE FROM mahasiswa where npm='$npm'");
	if ($delete){
		header("location:mahasiswa_data.php");
		echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
	}else{
		header("location:mahasiswa_data.php");
		echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
	}
}
?>

<table class="table table-striped table-condensed">
	<tr>
		<th width="20%">NIK</th>
		<td><?php echo $row['npm'];?></td>
	</tr>
	
	<tr>
		<th width="20%">Nama Mahasiswa</th>
		<td><?php echo $row['nama'];?></td>
	</tr>

	<tr>
		<th width="20%">Tempat Dan Tanggal Lahir</th>
		<td><?php echo $row['tmpt_lahir'].', '.$row['tgl_lahir'];?></td>
	</tr>

	<tr>
		<th width="20%">Jenis Kelamin</th>
		<td><?php echo $row['jns_kelamin'];?></td>
	</tr>

	<tr>
		<th width="20%">Agama</th>
		<td><?php echo $row['agama'];?></td>
	</tr>

	<tr>
		<th width="20%">No Handphone</th>
		<td><?php echo $row['no_hp'];?></td>
	</tr>

	<tr>
		<th width="20%">Fakultas</th>
		<td><?php echo $row['kd_fakultas'];?></td>
	</tr>

	<tr>
		<th width="20%">Jurusan</th>
		<td><?php echo $row['kd_jurusan'];?></td>
	</tr>

	<tr>
		<th width="20%">Semester</th>
		<td><?php echo $row['semester'];?></td>
	</tr>
</table>

			<a href="mahasiswa_data.php" class="btn btn-sm btn-info"> <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Kembali</a>

			<a href="mahasiswa_edit.php?npm=<?php echo $row['npm'];?>" class="btn btn-sm btn-success"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit Data</a>

			<a href="mahasiswa_detail.php?aksi=delete&npm=<?php echo $row['npm'];?>" class="btn btn-sm btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus Data</a>


<?php
include("foot.php");

?>