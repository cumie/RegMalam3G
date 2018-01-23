<?php include "head.php"; ?>
<div class="container">
<h3>Data Dosen &raquo; Biodata</h3>
<hr/>
<?php include "koneksi.php"; ?>
<?php include "library.php"; ?>
<?php
$nik = $_GET['nik'];

$sql = mysqli_query($koneksi,"SELECT * FROM dosen WHERE nik='$nik'");
if(mysqli_num_rows($sql) == 0){
	header("Location : index.php");
}else{
	$row = mysqli_fetch_assoc($sql);
	}

if(isset($_GET['aksi']) =='delete'){
	$delete = mysqli_query($koneksi,"DELETE FROM dosen WHERE nik='$nik'");
	if($delete){
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Dosen Berhasil Dihapus.</div>';
	}else{
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Gagal Dihapus.</div>';	
	}
}
?>
<table class="table-striped table-condensed">
	<tr>
    	<th width="20%">nik</th>
        <td><?php echo $row['nik']; ?></td>
    </tr>
	<<tr>
    	<th>Nama Dosen</th>
        <td><?php echo $row['nama']; ?></td>
    </tr>
    <tr>
    	<th>Tempat & Tanggal Lahir</th>
        <td><?php echo $row['tempat_lahir'].', '.$row['tanggal_lahir']; ?></td>
    </tr>
    
    <tr>
    	<th>No Telepon</th>
        <td><?php echo $row['no_telepon']; ?></td>
    </tr>
    <tr>
    	<th>prodi</th>
        <td><?php echo $row['prodi']; ?></td>
    </tr>
    <tr>
    	<th>matakuliah</th>
        <td><?php echo $row['matakuliah']; ?></td>
    </tr>
</table>
<a href="Dosen_data.php" class="btn btn-sm btn-info" ><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Kembali</a>
<a href="Dosen_edit.php?nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit Data</a>
<a href="Dosen_data.php?aksi=delete&nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-danger" onClick="return confirm('Anda Yakin hapus data <?php echo $row['nama']; ?>??')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus Data</a>
<?php include "foot.php"; ?>
</div>