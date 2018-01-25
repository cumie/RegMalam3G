<?php
include("head.php");
?>

<h2>Data pengajar</h2>
<hr/>

<?php
if (isset($_GET['aksi']) == 'delete') {
    $nik = $_GET['nik'];
    $cek = mysqli_query($koneksi, "SELECT * FROM pengajar where nik='$nik'");
    if (mysqli_num_rows($cek) == 0){

        echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Tidak Ditemukan.</div>';
    }else{
        $delete = mysqli_query($koneksi, "DELETE FROM pengajar where nik='$nik'");
        if ($delete){
            echo '<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasil Dihapus.</div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Dihapus.</div>';
        }
    }
}

$pageSql = "SELECT * FROM pengajar ORDER BY nik ASC";   
if (isset($_POST['qcari'])){
    $qcari = $_POST['qcari'];
    $pageSql = "SELECT * FROM pengajar where nik like '%$qcari%' or nama like '%$qcari%' or no_telpon like '%$qcari%' or tempat_lahir like '%$qcari%'";
}

?>


<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="pengajar_add.php">Tambah Data</a>
        <br/>
        <br/>
<div class="form-group">
    <div class="left">
        <form class="form-inline" method="get">
            <select name="filter" class="form-control" onchange="form.submit()">
                <option value="0">Filter Data pengajar</option>
                <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
                <option value="Tetap" <?php if($filter == 'Tetap'){ echo 'selected';}?>>Tetap</option>
                <option value="Kontrak" <?php if($filter == 'Kontrak'){ echo 'selected';}?>>Kontrak</option>
                <option value="Outsourcing" <?php if($filter == 'Outsourcing'){ echo 'selected';}?>>Outsourcing</option>
            </select>
        </form>
        
    </div>
    <div class="right">
        <form class="" method="POST" action="pengajar_data.php">
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
            <th>nik</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>No Telpon</th>
            <th>fakultas</th>
            <th>matakuliah</th>
            <th>Tools</th>
        </tr>
        <?php
        if ($filter){
            $sql = mysqli_query($koneksi, "SELECT * FROM pengajar WHERE matakuliah='$filter' ORDER BY nik ASC");
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
            <td><?php echo $row['nik'];?></td>
            <td><a href="pengajar_detail.php?nik=<?php echo $row['nik'];?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $row['nama'];?></a></td>
            <td><?php echo $row['tempat_lahir'];?></td>
            <td><?php echo indonesiaTgl($row['tanggal_lahir']);?></td>
            <td><?php echo $row['no_telpon'];?></td>
            <td><?php echo $row['fakultas'];?></td>
            <td>
                <?php
                if($row['matakuliah'] == 'Tetap'){
                ?>
                <span class="label label-success">Tetap</span>
                <?php
                    }else if($row['matakuliah'] == 'Kontrak'){
                ?>  
                <span class="label label-success">Kontrak</span>
                <?php
                    }else if($row['matakuliah'] == 'Outsourcing'){
                ?>
                <span class="label label-success">Outsourcing</span>
                <?php
                }
                ?>

            </td>

            <td>
                <a href="pengajar_edit.php?nik=<?php echo $row['nik'];?>" title="Edit Data" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

                <a href="pengajar_data.php?aksi=delete&nik=<?php echo $row['nik'];?>" title="Hapus Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data<?php echo $row['nama'];?>')" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
