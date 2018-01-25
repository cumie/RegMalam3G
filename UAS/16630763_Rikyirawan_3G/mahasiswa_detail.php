<?php
include("head.php");

?>

<h2>Mahasiswa Data &raquo; Biodata</h2>
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
		<th width="20%">NPM</th>
		<td><?php echo $row['npm'];?></td>
	</tr>
	
	<tr>
		<th width="20%">Nama</th>
		<td><?php echo $row['nama'];?></td>
	</tr>

	<tr>
		<th width="20%">Tempat Dan Tanggal Lahir</th>
		<td><?php echo $row['npm'].', '.$row['tanggal_lahir'];?></td>
	</tr>

	<tr>
		<th width="20%">Alamat</th>
		<td><?php echo $row['alamat'];?></td>
	</tr>

	<tr>
		<th width="20%">No Telpon</th>
		<td><?php echo $row['nomor_telpon'];?></td>
	</tr>

	<tr>
		<th width="20%">Prodi</th>
		<td><?php echo $row['prodi'];?></td>
	</tr>

	<tr>
		<th width="20%">Fakultas</th>
		<td><?php echo $row['fakultas'];?></td>
	</tr>
</table>

			<a href="mahasiwa_data.php" class="btn btn-sm btn-info"> <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Kembali</a>

			<a href="mahasiswa_edit.php?nik=<?php echo $row['npm'];?>" class="btn btn-sm btn-success"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit Data</a>

			<a href="mahasiswa_detail.php?aksi=delete&nik=<?php echo $row['npm'];?>" class="btn btn-sm btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus Data</a>


<?php
include("foot.php");

?>