<?php
include("head.php");
?>

<h2>Data Fakultas</h2>
<hr/>

<?php
if (isset($_GET['aksi']) == 'delete') {
	$kd_fakultas = $_GET['kd_fakultas'];
	$cek = mysqli_query($koneksi, "SELECT * FROM fakultas where kd_fakultas='$kd_fakultas'");
	if (mysqli_num_rows($cek) == 0){

		echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Tidak Ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM fakultas where kd_fakultas='$kd_fakultas'");
		if ($delete){
			echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
		}else{
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
		}
	}
}

$pageSql = "SELECT * FROM fakultas ORDER BY kd_fakultas ASC";	
if (isset($_POST['qcari'])){
	$qcari = $_POST['qcari'];
	$pageSql = "SELECT * FROM fakultas where kd_fakultas like '%$qcari%' or nm_fakultas like '%$qcari%'";
}

?>


<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="fakultas_add.php">Tambah Data</a>
		<br/>
		<br/>
<div class="form-group">
	<div class="left">
		<form class="form-inline" method="get">
			<select name="filter" class="form-control" onchange="form.submit()">
				<option value="0">Filter Data Fakultas</option>
				<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
				<option value="A" <?php if($filter == 'A'){ echo 'selected';}?>>A</option>
				<option value="B" <?php if($filter == 'B'){ echo 'selected';}?>>B</option>
				<option value="C" <?php if($filter == 'C'){ echo 'selected';}?>>C</option>
			</select>
		</form>
		
	</div>
	<div class="right">
		<form class="" method="POST" action="fakultas_data.php">
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
			<th>Kode Fakultas</th>
			<th>Nama Fakultas</th>
			<th>Akreditasi</th>
			<th>Tools</th>
		</tr>
		<?php
		if ($filter){
			$sql = mysqli_query($koneksi, "SELECT * FROM fakultas WHERE akreditasi='$filter' ORDER BY kd_fakultas ASC");
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
			<td><?php echo $row['kd_fakultas'];?></td>
			<td><?php echo $row['nm_fakultas'];?></td>
			<td>
				<?php
				if($row['akreditasi'] == 'A'){
				?>
				<span class="label label-success">A</span>
				<?php
					}else if($row['akreditasi'] == 'B'){
				?>	
				<span class="label label-success">B</span>
				<?php
					}else if($row['akreditasi'] == 'C'){
				?>	
				<span class="label label-success">C</span>
				<?php
				}
				?>
			</td>

			<td>
				<a href="fakultas_edit.php?kd_fakultas=<?php echo $row['kd_fakultas'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

				<a href="fakultas_data.php?aksi=delete&kd_fakultas=<?php echo $row['kd_fakultas'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data<?php echo $row['nm_fakultas'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
