<?php
include("head.php");

?>

<h2>Data kegiatan &raquo; Biodata</h2>
<hr/>

<?php
$kode_kegiatan = $_GET['kode_kegiatan'];
$sql = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE kode_kegiatan='$kode_kegiatan'");
if(mysqli_num_rows($sql) == 0){
    header("location:index.php");
}else{
    $row = mysqli_fetch_assoc($sql);
}

if (isset($_GET['aksi']) == 'delete'){
    $delete = mysqli_query($koneksi, "DELETE FROM kegiatan where kode_kegiatan='$kode_kegiatan'");
    if ($delete){
        header("location:kegiatan_data.php");
        echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
    }else{
        header("location:kegiatan_data.php");
        echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
    }
}
?>

<table class="table table-striped table-condensed">
    <tr>
        <th width="20%">kode_kegiatan</th>
        <td><?php echo $row['kode_kegiatan'];?></td>
    </tr>
    
    <tr>
        <th width="20%">Nama kegiatan</th>
        <td><?php echo $row['nama'];?></td>
    </tr>

    <tr>
        <th width="20%">Tanggal Mulai</th>
        <td><?php echo $row['tgl_mulai'];?></td>
    </tr>

    <tr>
        <th width="20%">Estimasi</th>
        <td><?php echo $row['estimasi'];?></td>
    </tr>

    <tr>
        <th width="20%">Penanggung Jawab</th>
        <td><?php echo $row['penanggung_jawab'];?></td>
    </tr>

    <tr>
        <th width="20%">Jenis Kegiatan</th>
        <td><?php echo $row['jenis_kegiatan'];?></td>
    </tr>
</table>

            <a href="kegiatan_data.php" class="btn btn-sm btn-info"> <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Kembali</a>

            <a href="kegiatan_edit.php?kode_kegiatan=<?php echo $row['kode_kegiatan'];?>" class="btn btn-sm btn-success"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit Data</a>

            <a href="kegiatan_detail.php?aksi=delete&kode_kegiatan=<?php echo $row['kode_kegiatan'];?>" class="btn btn-sm btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus Data</a>


<?php
include("foot.php");

?>