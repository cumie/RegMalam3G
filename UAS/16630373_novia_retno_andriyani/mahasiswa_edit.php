<?php include "head.php"; ?>
<div class="container">
	<h3>Data Mahasiswa &raquo; Edit Data</h3>	
    <hr/>
    <?php include "koneksi.php"; ?>
    <?php include "library.php"; ?>

	<?php
	$npm = $_GET['npm'];
	$sql = mysqli_query($koneksi, "SELECT * FROM mhs WHERE npm='$npm' ");
	if (mysqli_num_rows($sql) == 0){
		header("Location: index.php");
		}else{
				$row = mysqli_fetch_assoc($sql);
	}
	if(isset($_POST['save'])){
		$npm 			= $_POST['npm'];
		$nama			= $_POST['nama'];
		$tempat_lahir	= $_POST['tempat_lahir'];
		$tanggal_lahir	= $_POST['tanggal_lahir'];
		
		$no_telepon		= $_POST['no_telepon'];
		$fakultas		= $_POST['fakultas'];
		$semester			= $_POST['semester']; 
		
		$update = mysqli_query($koneksi, "UPDATE mhs SET nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', no_telepon='$no_telepon', fakultas='$fakultas', semester='$semester' WHERE npm='$npm' ") or die(mysqli_error());
		
		if($update){
			header("Location: mahasiswa_data.php?npm=".$npm."&pesan=sukses");
			}else{
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Gagal Disimpan, silahkan coba lagi !!</div>';
			}
		}
		if (isset($_GET['pesan']) == 'sukses'){
			echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Karyawan Berhasil Disimpan.</div>';
			}
			$now = strtotime(date("Y-m-d"));
			$maxage = date('Y-m-d', strtotime('- 16 years, $now'));
			$minage = date('Y-m-d', strtotime('- 40 years, $now'));
	?>
    <form class="form-horizontal" action="" method="post">
    	<div class="form-group">
        	<label class="col-sm-3 control-label">Npm</label>
            <div class="col-sm-2">
            	<input type="text" name="npm" value="<?php echo $row['npm']; ?>" class="form-control" placeholder="Npm" required>
            </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-4">
            	<input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control" placeholder="Nama" required>
            </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label">Tempat Lahir</label>
            <div class="col-sm-4">
            	<input type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir" required>
            </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label">Tanggal Lahir</label>
            <div class="col-sm-4">
            	<input type="text" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" class=" input-group form-control" min="<?php echo $minage; ?>" max="<?php echo $maxage; ?>" placeholder="yyyy-mm-dd" required>
            </div>
        
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label">No. Telepon</label>
            <div class="col-sm-3">
            	<input type="text" name="no_telepon" value="<?php echo $row['no_telepon']; ?>" class="form-control" placeholder="No Telepon" required>
            </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label">Fakultas</label>
            <div class="col-sm-2">
            	<select name="fakultas" class="form-control" required>
                	<option value="">- Fakultas Terbaru -</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Sipil">Teknik Sipil</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                </select>
            </div>
            <div class="col-sm-3">
           	<b>fakultas Sekarang : </b><span class="label label-success"><?php echo $row['fakultas']; ?></span> 
            </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label">Semester</label>
            <div class="col-sm-2">
            	<select name="semester" class="form-control" required>
                	<option value="">- Semester Terbaru -</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                    <option value="Ganjil">Ganjil</option>
                </select>
            </div>
            <div class="col-sm-3">
           	<b>Semester Sekarang : </b>
            <?php 
						if($row['semester']== 'Ganjil'){	
						?>
                    <span class="label label-success">Ganjil</span>
                    <?php }
						else if($row['semester']== 'Genap'){
                    ?>
                    <span class="label label-info">Genap</span>
                    <?php }
						else if($row['semester']== 'Ganjil'){
					?>
                    <span class="label label-warning">Ganjil</span>
                   <?php } ?>
            </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-6">
            	<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
                <a href="mahasiswa_data.php" class="btn btn-sm btn-danger">Batal</a>
            </div>
        </div>
    </form>
    <?php include "foot.php"; ?>
</div>