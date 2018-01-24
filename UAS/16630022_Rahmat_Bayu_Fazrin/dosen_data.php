<?php
include("head.php");
?>

<h2>Data Dosen</h2>
<hr/>

<?php
if (isset($_GET['aksi']) == 'delete') {
	$nik = $_GET['nik'];
	$cek = mysqli_query($koneksi, "SELECT * FROM dosen where nik='$nik'");
	if (mysqli_num_rows($cek) == 0){

		echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Tidak Ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM dosen where nik='$nik'");
		if ($delete){
			echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
		}else{
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
		}
	}
}

$pageSql = "SELECT * FROM dosen ORDER BY nik ASC";	
if (isset($_POST['qcari'])){
	$qcari = $_POST['qcari'];
	$pageSql = "SELECT * FROM dosen where nik like '%$qcari%' or nama like '%$qcari%' or no_telpon like '%$qcari%' or tempat_lahir like '%$qcari%'";
}

?>


<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="dosen_add.php">Tambah Data</a>
		<br/>
		<br/>
<div class="form-group">
	<div class="left">
		<form class="form-inline" method="get">
			<select name="filter" class="form-control" onchange="form.submit()">
				<option value="0">Filter Data Dosen</option>
				<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
				<option value="Y" <?php if($filter == 'Y'){ echo 'selected';}?>>Aktif</option>
				<option value="N" <?php if($filter == 'N'){ echo 'selected';}?>>Tidak Aktif</option>
			</select>
		</form>
		
	</div>
	<div class="right">
		<form class="" method="POST" action="dosen_data.php">
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
			<th>Nik</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>No Telpon</th>
			<th>Jabatan</th>
			<th>Status</th>
			<th>Tools</th>
		</tr>
		<?php
		if ($filter){
			$sql = mysqli_query($koneksi, "SELECT * FROM dosen WHERE status='$filter' ORDER BY nik ASC");
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
			<td><?php echo $row['nik'];?></td>
			<td><a href="dosen_detail.php?nik=<?php echo $row['nik'];?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $row['nama'];?></a></td>
			<td><?php echo $row['tempat_lahir'];?></td>
			<td><?php echo indonesiaTgl($row['tanggal_lahir']);?></td>
			<td><?php echo $row['no_telpon'];?></td>
			<td><?php echo $row['jabatan'];?></td>
			<td>
				<?php
					}if($row['status'] == 'Y'){
				?>	
				<span class="label label-success">Aktif</span>
				<?php
					}else if($row['status'] == 'N'){
				?>
				<span class="label label-success">Tidak Aktif</span>
				<?php
				}
				?>

			</td>

			<td>
				<a href="dosen_edit.php?nik=<?php echo $row['nik'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

				<a href="dosen_data.php?aksi=delete&nik=<?php echo $row['nik'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data<?php echo $row['nama'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>

		</tr>
		<?php 
		$no++;
		}
	
		?>
	</table>
	


</div>

<?php
include("foot.php");
?>
