<?php
include("head.php");

?>

<h2>Data inventaris &raquo; Biodata</h2>
<hr/>

<?php
$kd_barang = $_GET['kd_barang'];
$sql = mysqli_query($koneksi, "SELECT * FROM inventaris WHERE kd_barang='$kd_barang'");
if(mysqli_num_rows($sql) == 0){
    header("location:index.php");
}else{
    $row = mysqli_fetch_assoc($sql);
}

if (isset($_GET['aksi']) == 'delete'){
    $delete = mysqli_query($koneksi, "DELETE FROM inventaris where kd_barang='$kd_barang'");
    if ($delete){
        header("location:inventaris_data.php");
        echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
    }else{
        header("location:inventaris_data.php");
        echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
    }
}
?>
<div class="col-sm-7">
<table class="table table-striped table-condensed">
    <tr>
        <th width="20%">Kode Barang</th>
        <td><?php echo $row['kd_barang'];?></td>
    </tr>
    
    <tr>
        <th width="20%">Nama Barang</th>
        <td><?php echo $row['nama'];?></td>
    </tr>

    <tr>
        <th width="20%">merk</th>
        <td><?php echo $row['merk'];?></td>
    </tr>

    <tr>
        <th width="20%">jenis</th>
        <td><?php echo $row['jenis'];?></td>
    </tr>
   

</table>


            <a href="inventaris_data.php" class="btn btn-sm btn-info"> <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Kembali</a>

            <a href="inventaris_edit.php?kd_barang=<?php echo $row['kd_barang'];?>" class="btn btn-sm btn-success"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit Data</a>

            <a href="inventaris_detail.php?aksi=delete&kd_barang=<?php echo $row['kd_barang'];?>" class="btn btn-sm btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus Data</a>
</div>

<?php
include("foot.php");

?>