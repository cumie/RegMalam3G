<?php
include("head.php");

?>

<h2>Data Dosen &raquo; Biodata</h2>
<hr/>

<?php
$nik = $_GET['nik'];
$sql = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik='$nik'");
if(mysqli_num_rows($sql) == 0){
	header("location:index.php");
}else{
	$row = mysqli_fetch_assoc($sql);
}

if (isset($_GET['aksi']) == 'delete'){
	$delete = mysqli_query($koneksi, "DELETE FROM dosen where nik='$nik'");
	if ($delete){
		header("location:dosen_data.php");
		echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
	}else{
		header("location:dosen_data.php");
		echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
	}
}
?>

<table class="table table-striped table-condensed">
	<tr>
		<th width="20%">NIK</th>
		<td><?php echo $row['nik'];?></td>
	</tr>
	
	<tr>
		<th width="20%">Nama Dosen</th>
		<td><?php echo $row['nama'];?></td>
	</tr>

	<tr>
		<th width="20%">Tempat Dan Tanggal Lahir</th>
		<td><?php echo $row['tempat_lahir'].', '.$row['tanggal_lahir'];?></td>
	</tr>

	<tr>
		<th width="20%">Alamat</th>
		<td><?php echo $row['alamat'];?></td>
	</tr>

	<tr>
		<th width="20%">No Telpon</th>
		<td><?php echo $row['no_telpon'];?></td>
	</tr>

	<tr>
		<th width="20%">Jabatan</th>
		<td><?php echo $row['jabatan'];?></td>
	</tr>

	<tr>
		<th width="20%">Status</th>
		<td><?php echo $row['status'];?></td>
	</tr>
</table>

			<a href="dosen_data.php" class="btn btn-sm btn-info"> <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Kembali</a>

			<a href="dosen_edit.php?nik=<?php echo $row['nik'];?>" class="btn btn-sm btn-success"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit Data</a>

			<a href="dosen_detail.php?aksi=delete&nik=<?php echo $row['nik'];?>" class="btn btn-sm btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus Data</a>


<?php
include("foot.php");

?>