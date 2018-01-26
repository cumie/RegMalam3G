<?php
include("head.php");
?>

    <h2>&raquo; Tambah Data Inventaris</h2>

<?php
if (isset($_POST['add'])) {
        $kd_barang          = $_POST['kd_barang'];
        $nama               = $_POST['nama'];
        $tgl_masuk          = $_POST['tgl_masuk'];
        $merk               = $_POST['merk'];
        $jenis              = $_POST['jenis'];


        

        $cek = mysqli_query($koneksi, "SELECT * from inventaris WHERE kd_barang='$kd_barang'");
        if (mysqli_num_rows($cek) == 0){

            $insert = mysqli_query($koneksi, "INSERT INTO inventaris (kd_barang, nama, tgl_masuk, merk, jenis) VALUES ('$kd_barang', '$nama', '$tgl_masuk','$merk','$jenis')") or die(mysqli_error($koneksi));

  //          if ($insert) {
    //            echo '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data inventaris Berhasil Disimpan.</div>';
      //      }else{
        //        echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data inventaris Berhasil Disimpan.</div>';
         //   }
        //}else{
          //  echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>kd_barang Sudah Ada.</div>';
        }


}




?>


<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <center><label class="col-sm-3">Kode Barang</label></center>
            <div class="col-sm-2">
                <input type="text" name="kd_barang" class="form-control" placeholder="Kode Barang" required>
            </div>
    </div>
    <div class="form-group">
        <center><label class="col-sm-3">Nama Barang</label></center>
            <div class="col-sm-6">
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
    </div>
    <div class="form-group">
        <center><label class="col-sm-3">Tanggal Masuk</label></center>
            <div class="col-sm-4">
                <input type="date" name="tgl_masuk" class="form-control" required>
            </div>
    </div>
    <div class="form-group">
        <center><label class="col-sm-3">Merk</label></center>
            <div class="col-sm-2">
                <select name="merk" class="form-control" required>
                    <option value="">Pilih Merk</option>
                    <option value="Toshiba">Toshiba</option>
                    <option value="Hook">Hook</option>
                    <option value="Honda">Honda</option>
                    <option value="Sanyo">Sanyo</option>
                </select>
            </div>
    </div>
    <div class="form-group">
        <center><label class="col-sm-3">Jenis Barang</label></center>
            <div class="col-sm-2">
                <select name="jenis" class="form-control" required>
                    <option value="">Jenis</option>
                    <option value="Teknologi&Komunikasi">Teknologi&Komunikasi</option>
                    <option value="Dapur Umum/Pentri">Dapur Umum/Pentri</option>
                    <option value="Transportasi">Transportasi</option>
                </select>
            </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control label">&nbsp;</label>
            <div class="col-sm-6">
                <input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
                <a href="index.php" class="btn btn-sm btn-danger">Batal</a>
            </div>
    </div>



</form>

<?php
include("foot.php")
?>