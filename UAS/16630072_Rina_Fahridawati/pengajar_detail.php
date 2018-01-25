<?php
include("head.php");

?>

<h2>Data pengajar &raquo; Biodata</h2>
<hr/>

<?php
$nik = $_GET['nik'];
$sql = mysqli_query($koneksi, "SELECT * FROM pengajar WHERE nik='$nik'");
if(mysqli_num_rows($sql) == 0){
    header("location:index.php");
}else{
    $row = mysqli_fetch_assoc($sql);
}

if (isset($_GET['aksi']) == 'delete'){
    $delete = mysqli_query($koneksi, "DELETE FROM pengajar where nik='$nik'");
    if ($delete){
        header("location:pengajar_data.php");
        echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
    }else{
        header("location:pengajar_data.php");
        echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
    }
}
?>

<table class="table table-striped table-condensed">
    <tr>
        <th width="20%">nik</th>
        <td><?php echo $row['nik'];?></td>
    </tr>
    
    <tr>
        <th width="20%">Nama pengajar</th>
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
        <th width="20%">fakultas</th>
        <td><?php echo $row['fakultas'];?></td>
    </tr>

    <tr>
        <th width="20%">matakuliah</th>
        <td><?php echo $row['matakuliah'];?></td>
    </tr>
</table>

            <a href="pengajar_data.php" class="btn btn-sm btn-info"> <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Kembali</a>

            <a href="pengajar_edit.php?nik=<?php echo $row['nik'];?>" class="btn btn-sm btn-success"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit Data</a>

            <a href="pengajar_detail.php?aksi=delete&nik=<?php echo $row['nik'];?>" class="btn btn-sm btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus Data</a>


<?php
include("foot.php");

?>