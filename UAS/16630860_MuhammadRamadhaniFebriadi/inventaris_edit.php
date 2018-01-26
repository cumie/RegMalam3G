<?php
include("head.php");
?>

    <h2>Data inventaris &raquo; Edit Data</h2>
    <?php
    //$kd_barang=$_GET['kd_barang'];
    //echo $kd_barang;
    //$sql = mysqli_query($koneksi, "SELECT * FROM inventaris WHERE kd_barang='$kd_barang'");
    //$mark = mysqli_fetch_array($sql);
    //echo $mark[2];
    ?>

    <?php
    $kd_barang = $_GET['kd_barang'];
    $sql = mysqli_query($koneksi, "SELECT * FROM inventaris Where kd_barang='$kd_barang'")    ;
    if (mysqli_num_rows($sql) == 0) {
        header("Location:index.php");
    }else{
        $row = mysqli_fetch_assoc($sql);
    }

if (isset($_POST['save'])) {
        $kd_barang          = $_POST['kd_barang'];
        $nama               = $_POST['nama'];
        $tgl_masuk          = $_POST['tgl_masuk'];
        $merk               = $_POST['merk'];
        $jenis              = $_POST['jenis'];



            $update = mysqli_query($koneksi, "UPDATE inventaris SET nama='$nama', tgl_masuk='$tgl_masuk', merk='$merk', jenis='$jenis' WHERE kd_barang='$kd_barang'") or die(mysqli_error($koneksi));

            if ($update) {
                header("Location:inventaris_edit.php?kd_barang=".$kd_barang."&pesan=sukses");
            }else{
                echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Gagal Disimpan Silahkan Coba Lagi.</div>';
            }

        }




if (isset($_GET['pesan']) == 'sukses'){
    echo '<div class="alert alert-succsess alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data Berhasi Disimpan.</div>';
}




$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime("- 16 year", $now)); 
$minage = date("Y-m-d", strtotime("- 40 year", $now));



?>


<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="col-sm-3 control label">Kode Barang</label>
            <div class="col-sm-2">
                <input type="text" name="kd_barang" value="<?php echo $row['kd_barang'];?>" class="form-control" placeholder="kd_barang" disable>
            </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control label">Nama</label>
            <div class="col-sm-6">
                <input type="text" name="nama" value="<?php echo $row['nama'];?>" class="form-control" placeholder="Nama" required>
            </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control label">Tanggal Masuk</label>
            <div class="col-sm-4">
                <input type="date" name="tgl_masuk" value="<?php echo $row['tgl_masuk'];?>" min="<?php echo $minage;?>" max="<?php echo $maxage;?>" class="input-group form-control" required>
            </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control label">merk</label>
            <div class="col-sm-2">
                <select name="merk" class="form-control" required>
                    <option value="">Pilih Merk</option>
                    <option value="Toshiba">Toshiba</option>
                    <option value="Hook">Hook</option>
                    <option value="Honda">Honda</option>
                    <option value="Sanyo">Sanyo</option>
                </select>
            </div>
            <div class="col-sm-3">
    <b> merk Sekarang : </b> <span class="label label-success"><?php echo $row['merk'];?></span>
    </div>
    </div>
    
    <div class="form-group">
         <label class="col-sm-3 control label">jenis</label>
            <div class="col-sm-2">
               <select name="jenis" class="form-control" required>
                    <option value="">Jenis</option>
                    <option value="Teknologi & Komunikasi">Teknologi & Komunikasi</option>
                    <option value="Dapur Umum/Pentri">Dapur Umum/Pentri</option>
                    <option value="Transportas">Transportas</option>
                </select>
            </div>
            <div class="col-sm-3">
    <b> jenis Sekarang : </b> <span class="label label-info"><?php echo $row['jenis'];?></span>
    </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-3 control label">&nbsp;</label>
            <div class="col-sm-6">
                <input type="submit" name="save" class="btn btn-sm btn-primary" value="simpan">
                <a href="index.php" class="btn btn-sm btn-danger">Batal</a>
            </div>
    </div>



</form>




<?php
include("foot.php")
?>