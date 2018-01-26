<?php
include("head.php");
?>

<h2>Data kegiatan</h2>
<hr/>

<?php
if (isset($_GET['aksi']) == 'delete') {
    $kode_kegiatan = $_GET['kode_kegiatan'];
    $cek = mysqli_query($koneksi, "SELECT * FROM kegiatan where kode_kegiatan='$kode_kegiatan'");
    if (mysqli_num_rows($cek) == 0){

        echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Tidak Ditemukan.</div>';
    }else{
        $delete = mysqli_query($koneksi, "DELETE FROM kegiatan where kode_kegiatan='$kode_kegiatan'");
        if ($delete){
            echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
        }
    }
}

$pageSql = "SELECT * FROM kegiatan ORDER BY kode_kegiatan ASC";   
if (isset($_POST['qcari'])){
    $qcari = $_POST['qcari'];
    $pageSql = "SELECT * FROM kegiatan where kode_kegiatan like '%$qcari%' or nama  like '%$qcari%'";
}

?>


<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="kegiatan_add.php">Tambah Data</a>
        <br/>
        <br/>
<div class="form-group">
    <div class="left">
        <form class="form-inline" method="get">
            <select name="filter" class="form-control" onchange="form.submit()">
                <option value="0">Filter Data kegiatan</option>
                <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
                <option value="Sosial" <?php if($filter == 'Sosial'){ echo 'selected';}?>>Sosial</option>
                <option value="Budaya" <?php if($filter == 'Budaya'){ echo 'selected';}?>>Budaya</option>
                <option value="Seni" <?php if($filter == 'Seni'){ echo 'selected';}?>>Seni</option>
            </select>
        </form>
        
    </div>
    <div class="right">
        <form class="" method="POST" action="kegiatan_data.php">
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
            <th>Kode Kegiatan</th>
            <th>Nama</th>
            <th>Tanggal Mulai</th>
            <th>Estimasi</th>
            <th>Penananggung Jawab</th>
            <th>Jenis Kegiatan</th>
        </tr>
        <?php
        if ($filter){
            $sql = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE matakuliah='$filter' ORDER BY kode_kegiatan ASC");
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
            <td><?php echo $row['kode_kegiatan'];?></td>
            <td><a href="kegiatan_detail.php?kode_kegiatan=<?php echo $row['kode_kegiatan'];?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $row['nama'];?></a></td>
            <td><?php echo $row['tgl_mulai'];?></td>
            <td><?php echo $row['estimasi'];?></td>
            <td><?php echo $row['penanggung_jawab'];?></td>
            <td><?php echo $row['jenis_kegiatan'];?></td>
            
            <td>
                <a href="kegiatan_edit.php?kode_kegiatan=<?php echo $row['kode_kegiatan'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

                <a href="kegiatan_data.php?aksi=delete&kode_kegiatan=<?php echo $row['kode_kegiatan'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data<?php echo $row['nama'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
