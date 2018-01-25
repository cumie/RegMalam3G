<?php
include("head.php");

?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


<h2 class="style1">Data Dosen _ Biodata</h2>
<hr/>

<?php
$nip = $_GET['nip'];
$sql = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nip='$nip'");
if(mysqli_num_rows($sql) == 0){
	header("location:index.php");
}else{
	$row = mysqli_fetch_assoc($sql);
}

if (isset($_GET['aksi']) == 'delete'){
	$delete = mysqli_query($koneksi, "DELETE FROM dosen where nip='$nip'");
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
		<td><?php echo $row['nip'];?></td>
	</tr>
	
	<tr>
		<th width="20%">Nama Dosen</th>
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
		<th width="20%">Mata Kuliah</th>
		<td><?php echo $row['kd_makul'];?></td>
	</tr>
</table>

			<a href="dosen_data.php" class="btn btn-sm btn-info"> <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Kembali</a>

			<a href="dosen_edit.php?nip=<?php echo $row['nip'];?>" class="btn btn-sm btn-success"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit Data</a>

			<a href="dosen_detail.php?aksi=delete&nip=<?php echo $row['nip'];?>" class="btn btn-sm btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus Data</a>


<?php
include("foot.php");

?>