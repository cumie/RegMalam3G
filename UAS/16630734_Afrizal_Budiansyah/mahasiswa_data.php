<?php
include("head.php");
?>

<h2>Data Mahasiswa</h2>
<hr/>
</head>
<body bg background="img/tokyo.jpg">
<?php
if (isset($_GET['aksi']) == 'delete') {
	$npm = $_GET['npm'];
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
	$pageSql = "SELECT * FROM mahasiswa where npm like '%$qcari%' or nama like '%$qcari%' or tmpt_lahir like '%$qcari%'";
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
			<th>NPM</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>No Handphone</th>
			<th>Fakultas</th>
			<th>Jurusan</th>
			<th>Semester</th>
			<th>Tools</th>
		</tr>
		<?php
		if ($filter){
			$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE semester='$filter' ORDER BY npm ASC");
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
			<td><?php echo $row['tmpt_lahir'];?></td>
			<td><?php echo indonesiaTgl($row['tgl_lahir']);?></td>
			<td><?php echo $row['jns_kelamin'];?></td>
			<td><?php echo $row['agama'];?></td>
			<td><?php echo $row['no_hp'];?></td>
			<td><?php echo $row['kd_fakultas'];?></td>
			<td><?php echo $row['kd_jurusan'];?></td>
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
