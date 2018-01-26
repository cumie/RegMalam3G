<?php
include("head.php");
?>

    <h2>Data kegiatan &raquo; Tambah Data</h2>

<?php
if (isset($_POST['add'])) {
        $kode_kegiatan      = $_POST['kode_kegiatan'];
        $nama               = $_POST['nama'];
        $tgl_mulai          = $_POST['tgl_mulai'];
        $estimasi           = $_POST['estimasi'];
        $penanggung_jawab   = $_POST['penanggung_jawab'];
        $jenis_kegiatan     = $_POST['jenis_kegiatan'];

        $cek = mysqli_query($koneksi, "SELECT * from kegiatan WHERE kode_kegiatan='$kode_kegiatan'");
        if (mysqli_num_rows($cek) == 0){

            $insert = mysqli_query($koneksi, "INSERT INTO kegiatan (kode_kegiatan, nama,  tgl_mulai, estimasi,  penanggung_jawab, jenis_kegiatan) VALUES ('$kode_kegiatan', '$nama', '$tgl_mulai', '$estimasi','$penanggung_jawab', '$jenis_kegiatan')") or die(mysqli_error($koneksi));

            if ($insert) {
                echo '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data kegiatan Berhasil Disimpan.</div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Data kegiatan Berhasil Disimpan.</div>';
            }
        }else{
            echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>kode_kegiatan Sudah Ada.</div>';
        }


}




?>


<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <center><label class="col-sm-3">Kode Kegiatan</label></center>
            <div class="col-sm-2">
                <input type="text" name="kode_kegiatan" class="form-control" placeholder="kode_kegiatan" required>
            </div>
    </div>
    <div class="form-group">
        <center><label class="col-sm-3">Nama Kegiatan</label></center>
            <div class="col-sm-6">
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
    </div>
        <div class="form-group">
        <center><label class="col-sm-3">Tanggal Mulai</label></center>
            <div class="col-sm-4">
                <input type="date" name="tgl_mulai" value="" class="input-group form-control" required>
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
        <center><label class="col-sm-3">Penanggung Jawab</label></center>
            <div class="col-sm-6">
                <input type="text" name="penanggung_jawab" class="form-control" placeholder="Nama" required>
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