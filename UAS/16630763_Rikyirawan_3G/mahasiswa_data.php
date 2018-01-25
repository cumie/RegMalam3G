<?php
include("head.php");
?>

<h2>Data Mahasiswa</h2>
<hr/>

<?php
if (isset($_GET['aksi']) == 'delete') {
	$nik = $_GET['npm'];
	$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa where npm='$npm'");
	if (mysqli_num_rows($cek) == 0){

		echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Tidak Ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM mahasiswa where npm='$npm'");
		if ($delete){
			echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
		}else{
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
		}
	}
}

$pageSql = "SELECT * FROM mahasiswa ORDER BY npm ASC";	
if (isset($_POST['qcari'])){
	$qcari = $_POST['qcari'];
	$pageSql = "SELECT * FROM mahasiswa where npm like '%$qcari%' or nama like '%$qcari%' or nomor_telpon like '%$qcari%' or tempat_lahir like '%$qcari%'";
}

?>


<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="mahasiswa_add.php">Tambah Data</a>
		<br/>
		<br/>
<div class="form-group">
	<div class="left">
		<form class="form-inline" method="get">
			<select name="filter" class="form-control" onchange="form.submit()">
				<option value="0">Filter Data Mahasiswa</option>
				<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
				<option value="fti" <?php if($filter == 'Tetap'){ echo 'selected';}?>>Fakultas Teknologi Informasi</option>
				<option value="fekon" <?php if($filter == 'Kontrak'){ echo 'selected';}?>>Fakultas Ekonomi</option>
			</select>
		</form>
		
	</div>
	<div class="right">
		<form class="" method="POST" action="mahasiswa_data.php">
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
			<th>Npm</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>No Telpon</th>
			<th>Prodi</th>
			<th>Fakultas</th>
			<th>Tools</th>
		</tr>
		<?php
		if ($filter){
			$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE fakultas='$filter' ORDER BY npm ASC");
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
			<td><a href="mahasiswa_detail.php?npm=<?php echo $row['npm'];?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $row['nama'];?></a></td>
			<td><?php echo $row['tempat_lahir'];?></td>
			<td><?php echo indonesiaTgl($row['tanggal_lahir']);?></td>
			<td><?php echo $row['nomor_telpon'];?></td>
			<td><?php echo $row['prodi'];?></td>
			<td>
				<?php
				if($row['fakultas'] == 'fti'){
				?>
				<span class="label label-success">Fakultas Teknologi Informasi</span>
				<?php
					}else if($row['fakultas'] == 'fekon'){
				?>	
				<span class="label label-success">Fakultas Ekonomi</span>
				<?php
				}
				?>

			</td>

			<td>
				<a href="mahasiswa_edit.php?npm=<?php echo $row['npm'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

				<a href="mahasiswa_data.php?aksi=delete&npm=<?php echo $row['npm'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data<?php echo $row['nama'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
