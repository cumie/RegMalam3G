<?php
include("head.php");
?>

<h2>Data Dosen</h2>
<hr/>
</head>
<body bg background="img/tokyo.jpg">
<?php
if (isset($_GET['aksi']) == 'delete') {
	$nip = $_GET['nip'];
	$cek = mysqli_query($koneksi, "SELECT * FROM dosen where nip='$nip'");
	if (mysqli_num_rows($cek) == 0){

		echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Tidak Ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM dosen where nip='$nip'");
		if ($delete){
			echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
		}else{
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
		}
	}
}

$pageSql = "SELECT * FROM dosen ORDER BY nip ASC";	
if (isset($_POST['qcari'])){
	$qcari = $_POST['qcari'];
	$pageSql = "SELECT * FROM dosen where nip like '%$qcari%' or nama like '%$qcari%' or tmpt_lahir like '%$qcari%'";
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
				<option value="FTI" <?php if($filter == 'FTI'){ echo 'selected';}?>>FTI</option>
				<option value="FATEK" <?php if($filter == 'FATEK'){ echo 'selected';}?>>FATEK</option>
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
			<th>NIP</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>No Handphone</th>
			<th>Fakultas</th>
			<th>Mata Kuliah</th>
			<th>Tools</th>
		</tr>
		<?php
		if ($filter){
			$sql = mysqli_query($koneksi, "SELECT * FROM dosen WHERE kd_fakultas='$filter' ORDER BY nip ASC");
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
			<td><?php echo $row['nip'];?></td>
			<td><a href="dosen_detail.php?nip=<?php echo $row['nip'];?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $row['nama'];?></a></td>
			<td><?php echo $row['tmpt_lahir'];?></td>
			<td><?php echo indonesiaTgl($row['tgl_lahir']);?></td>
			<td><?php echo $row['jns_kelamin'];?></td>
			<td><?php echo $row['agama'];?></td>
			<td><?php echo $row['no_hp'];?></td>
			<td>
				<?php
				if($row['kd_fakultas'] == 'FTI'){
				?>
				<span class="label label-success">FTI</span>
				<?php
					}else if($row['kd_fakultas'] == 'FATEK'){
				?>	
				<span class="label label-success">FATEK</span>
				<?php
				}
				?>
			</td>
			<td><?php echo $row['kd_makul'];?></td>

			<td>
				<a href="dosen_edit.php?nip=<?php echo $row['nip'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

				<a href="dosen_data.php?aksi=delete&nip=<?php echo $row['nip'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data<?php echo $row['nama'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
