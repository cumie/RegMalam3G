<?php
include("head.php");
?>

<h2>Data Inventaris</h2>
<hr/>

<?php
if (isset($_GET['aksi']) == 'delete') {
    $kd_barang = $_GET['kd_barang'];
    $cek = mysqli_query($koneksi, "SELECT * FROM inventaris where kd_barang='$kd_barang'");
    if (mysqli_num_rows($cek) == 0){

        echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Tidak Ditemukan.</div>';
    }else{
        $delete = mysqli_query($koneksi, "DELETE FROM inventaris where kd_barang='$kd_barang'");
        if ($delete){
            echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
        }
    }
}

$pageSql = "SELECT * FROM inventaris ORDER BY kd_barang ASC";   
if (isset($_POST['qcari'])){
    $qcari = $_POST['qcari'];
    $pageSql = "SELECT * FROM inventaris where kd_barang like '%$qcari%' or nama like '%$qcari%' or tgl_masuk like '%$qcari%' or jenis like '%$qcari%'";
}

?>


<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="inventaris_add.php">Tambah Data</a>
        <br/>
        <br/>
<div class="form-group">
    <div class="left">
        <form class="form-inline" method="get">
            <select name="filter" class="form-control" onchange="form.submit()">
                <option value="0">Filter Data inventaris</option>
                <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
                <option value="Teknologi&Komputer" <?php if($filter == 'Teknologi&Komputer'){ echo 'selected';}?>>Teknologi&Komputer</option>
                <option value="Dapur Umum/Pentri" <?php if($filter == 'Dapur Umum/Pentri'){ echo 'selected';}?>>Dapur Umum/Pentri</option>
                <option value="Transportasi" <?php if($filter == 'Transportasi'){ echo 'selected';}?>>Transportasi</option>
            </select>
        </form>
        
    </div>
    <div class="right">
        <form class="" method="POST" action="inventaris_data.php">
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
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Tanggal Masuk</th>
            <th>Merk</th>
            <th>jenis</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($filter){
            $sql = mysqli_query($koneksi, "SELECT * FROM inventaris WHERE jenis='$filter' ORDER BY kd_barang ASC");
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
            <td><?php echo $row['kd_barang'];?></td>
            <td><a href="inventaris_detail.php?kd_barang=<?php echo $row['kd_barang'];?>"><?php echo $row['nama'];?></a></td>
            <td><?php echo $row['tgl_masuk'];?></td>
            <td><span class="label label-success"><?php echo $row['merk'];?></span></td>
            <td><span class="label label-success"><?php echo $row['jenis'];?></span></td>
            
            <td>
                <a href="inventaris_edit.php?kd_barang=<?php echo $row['kd_barang'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

                <a href="inventaris_data.php?aksi=delete&kd_barang=<?php echo $row['kd_barang'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data<?php echo $row['nama'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
