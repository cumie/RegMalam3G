<?php
include("head.php");
?>

    <h2>Data kegiatan &raquo; Edit Data</h2>
    <?php
    //$kode_kegiatan=$_GET['kode_kegiatan'];
    //echo $kode_kegiatan;
    //$sql = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE kode_kegiatan='$kode_kegiatan'");
    //$mark = mysqli_fetch_array($sql);
    //echo $mark[2];
    ?>

    <?php
    $kode_kegiatan = $_GET['kode_kegiatan'];
    $sql = mysqli_query($koneksi, "SELECT * FROM kegiatan Where kode_kegiatan='$kode_kegiatan'")    ;
    if (mysqli_num_rows($sql) == 0) {
        header("Location:index.php");
    }else{
        $row = mysqli_fetch_assoc($sql);
    }

if (isset($_POST['save'])) {
        $kode_kegiatan      = $_POST['kode_kegiatan'];
        $nama               = $_POST['nama'];
        $tgl_mulai          = $_POST['tgl_mulai'];
        $estimasi           = $_POST['estimasi'];
        $penanggung_jawab   = $_POST['penanggung_jawab'];
        $jenis_kegiatan     = $_POST['jenis_kegiatan'];



            $update = mysqli_query($koneksi, "UPDATE kegiatan SET nama='$nama',  tgl_mulai='$tgl_mulai', estimasi='$estimasi',penanggung_jawab='$penanggung_jawab', jenis_kegiatan='$jenis_kegiatan' WHERE kode_kegiatan='$kode_kegiatan'") or die(mysqli_error($koneksi));

            if ($update) {
                header("Location:kegiatan_edit.php?kode_kegiatan=".$kode_kegiatan."&pesan=sukses");
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
        <center><label class="col-sm-3">Kode Kegiatan</label></center>
            <div class="col-sm-2">
                <input type="text" name="kode_kegiatan" value="<?php echo $row['kode_kegiatan'];?>" class="form-control" placeholder="kode_kegiatan" disable>
            </div>
    </div>
    <div class="form-group">
        <center><label class="col-sm-3">Nama Kegiatan</label></center>
            <div class="col-sm-6">
                <input type="text" name="nama" value="<?php echo $row['nama'];?>" class="form-control" placeholder="Nama" required>
            </div>
    </div>
    <div class="form-group">
        <center><label class="col-sm-3">Tanggal Mulai</label></center>
            <div class="col-sm-4">
                <input type="date" name="tgl_mulai" value="<?php echo $row['tgl_mulai'];?>" min="<?php echo $minage;?>" max="<?php echo $maxage;?>" class="input-group form-control" required>
            </div>
    </div>
    <div class="form-group">
        <center><label class="col-sm-3">Estimasi</label></center>
            <div class="col-sm-3">
                 <input type="radio" name="estimasi" value="1hari"> 1hari
                 <input type="radio" name="estimasi" value="2hari"> 2hari
                 <input type="radio" name="estimasi" value="3hari"> 3hari
            </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control label">penanggung_jawab</label>
            <div class="col-sm-2">
                <input type="text" name="nama" value="<?php echo $row['penanggung_jawab'];?>" class="form-control" placeholder="Nama" required>
            </div>
            <div class="col-sm-3">
    <b> Penanggung Jawab Sekarang : </b> <span class="label label-success"><?php echo $row['penanggung_jawab'];?></span>
    </div>
    </div>
    
    <div class="form-group">
         <center><label class="col-sm-3">Jenis Kegiatan</label></center>
            <div class="col-sm-2">
                <select name="jenis_kegiatan" class="form-control" required>
                    <option value=""> - - - - </option>
                    <option value="Sosial">Sosial</option>
                    <option value="Budaya">Budaya</option>
                    <option value="Seni">Seni</option>
                </select>
            </div>
            <div class="col-sm-3">
    <b> Jenis Kegiatan Sekarang : </b> <span class="label label-info"><?php echo $row['jenis_kegiatan'];?></span>
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