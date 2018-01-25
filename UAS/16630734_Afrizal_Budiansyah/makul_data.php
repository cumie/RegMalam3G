<?php
include("head.php");
?>

<h2>Data Mata Kuliah</h2>
<hr/>
</head>
<body bg background="img/tokyo.jpg">
<?php
if (isset($_GET['aksi']) == 'delete') {
	$kd_makul = $_GET['kd_makul'];
	$cek = mysqli_query($koneksi, "SELECT * FROM makul where kd_makul='$kd_makul'");
	if (mysqli_num_rows($cek) == 0){

		echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Tidak Ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM makul where kd_makul='$kd_makul'");
		if ($delete){
			echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
		}else{
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
		}
	}
}

$pageSql = "SELECT * FROM makul ORDER BY kd_makul ASC";	
if (isset($_POST['qcari'])){
	$qcari = $_POST['qcari'];
	$pageSql = "SELECT * FROM makul where kd_makul like '%$qcari%' or nm_makul like '%$qcari%'";
}

?>


<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="makul_add.php">Tambah Data</a>
		<br/>
		<br/>
<div class="form-group">
	<div class="left">
		<form class="form-inline" method="get">
			<select name="filter" class="form-control" onchange="form.submit()">
				<option value="0">Filter Data Fakultas</option>
				<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
				<option value="1" <?php if($filter == '1'){ echo 'selected';}?>>1</option>
				<option value="2" <?php if($filter == '2'){ echo 'selected';}?>>2</option>
			</select>
		</form>
		
	</div>
	<div class="right">
		<form class="" method="POST" action="makul_data.php">
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
			<th>Kode Mata Kuliah</th>
			<th>Nama Mata Kuliah</th>
			<th>Tools</th>
		</tr>
		<?php
		if ($filter){
			$sql = mysqli_query($koneksi, "SELECT * FROM makul WHERE kd_makul='$filter' ORDER BY kd_makul ASC");
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
			<td><?php echo $row['kd_makul'];?></td>
			<td><?php echo $row['nm_makul'];?></td>

			<td>
				<a href="makul_edit.php?kd_makul=<?php echo $row['kd_makul'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

				<a href="makul_data.php?aksi=delete&kd_makul=<?php echo $row['kd_makul'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data<?php echo $row['nm_makul'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
