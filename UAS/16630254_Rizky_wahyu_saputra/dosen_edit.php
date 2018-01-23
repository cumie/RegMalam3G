<?php include "head.php"; ?>
<div class="container">
	<h3>Data Dosen &raquo; Edit Data</h3>	
    <hr/>
    <?php include "koneksi.php"; ?>
    <?php include "library.php"; ?>

	<?php
	$nik = $_GET['nik'];
	$sql = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik='$nik' ");
	if (mysqli_num_rows($sql) == 0){
		header("Location: index.php");
		}else{
				$row = mysqli_fetch_assoc($sql);
	}
	if(isset($_POST['save'])){
		$nik 			= $_POST['nik'];
		$nama			= $_POST['nama'];
		$tempat_lahir	= $_POST['tempat_lahir'];
		$tanggal_lahir	= $_POST['tanggal_lahir'];
		
		$no_telepon		= $_POST['no_telepon'];
		$prodi		= $_POST['prodi'];
		$matakuliah			= $_POST['matakuliah']; 
		
		$update = mysqli_query($koneksi, "UPDATE dosen SET nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', no_telepon='$no_telepon', prodi='$prodi', matakuliah='$matakuliah' WHERE nik='$nik' ") or die(mysqli_error());
		
		if($update){
			header("Location: Dosen_data.php?nik=".$nik."&pesan=sukses");
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
        	<label class="col-sm-3 control-label">nik</label>
            <div class="col-sm-2">
            	<input type="text" name="nik" value="<?php echo $row['nik']; ?>" class="form-control" placeholder="nik" required>
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
        	<label class="col-sm-3 control-label">prodi</label>
            <div class="col-sm-2">
            	<select name="prodi" class="form-control" required>
                	<option value="">- prodi Terbaru -</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Sipil">Teknik Sipil</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                </select>
            </div>
            <div class="col-sm-3">
           	<b>prodi Sekarang : </b><span class="label label-success"><?php echo $row['prodi']; ?></span> 
            </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label">matakuliah</label>
            <div class="col-sm-2">
            	<select name="matakuliah" class="form-control" required>
                	<option value="">- matakuliah Terbaru -</option>
                   
					<option value="VISUAL BASIC">VISUAL BASIC</option>
                    <option value="KOMPUTER JARINGAN">KOMPUTER JARINGAN</option>
                    <option value="SISTEM INFORMASI MENEJEMEN">SISTEM INFORMASI MENEJEMEN</option>
				    <option value="PEMOGRAMAN WEB">PEMOGRAMAN WEB</option>
					 <option value="PEMOGRAMAN TEKSTURE">PEMOGRAMAN TEKSTURE</option>
                </select>
            </div>
            <div class="col-sm-3">
           	<b>matakuliah Sekarang : </b>
            <?php 
						if($row['matakuliah']== 'VISUAL BASIC'){	
						?>
                    <span class="label label-success">VISUAL BASIC</span>
                    <?php }
						else if($row['matakuliah']== 'GKOMPUTER JARINGAN'){
                    ?>
                    <span class="label label-info">KOMPUTER JARINGAN</span>
                    <?php }
						else if($row['matakuliah']== 'SISTEM INFORMASI MENEJEMEN'){
					?>
                    <span class="label label-warning">SISTEM INFORMASI MENEJEMENl</span>
					
					 <?php }
						else if($row['matakuliah']== 'PEMOGRAMAN WEB'){
					?>
                    <span class="label label-warning">PEMOGRAMAN WEB</span>
					
                   <?php } ?>
            </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-6">
            	<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
                <a href="Dosen_data.php" class="btn btn-sm btn-danger">Batal</a>
            </div>
        </div>
    </form>
    <?php include "foot.php"; ?>
</div>