<?php include "head.php"; ?>
	<div class="container">
	<h3>Data Mahasiswa &raquo; Tambah Data</h3>
    <hr/>
    <?php include "koneksi.php"; ?>
    <?php
		if (isset($_POST['add'])){
			$npm			=$_POST['npm'];
			$nama			=$_POST['nama'];
			$tempat_lahir	=$_POST['tempat_lahir'];
			$tanggal_lahir	=$_POST['tanggal_lahir'];
			
			$no_telepon		=$_POST['no_telepon'];
			$fakultas		=$_POST['fakultas'];
			$semester		=$_POST['semester'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM mhs WHERE npm ='$npm'");
			if(mysqli_num_rows($cek)==0){
				
			$insert = mysqli_query($koneksi, "INSERT INTO mhs(npm,nama,tempat_lahir,tanggal_lahir,no_telepon,fakultas,semester) VALUES ('$npm','$nama','$tempat_lahir','$tanggal_lahir','$no_telepon','$fakultas','$semester')") or die(mysql_error($koneksi));
				if ($insert){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Mahasiswa Berhasil Disimpan.</div>';
				}
				else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Gagal Disimpan.</div>';
					}
				}
			else {
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Npm sudah ada...!!</div>';	
				}
			}
			$now = strtotime(date("Y-m-d"));
			$maxage = date('Y-m-d', strtotime('- 16 years, $now'));
			$minage = date('Y-m-d', strtotime('- 40 years, $now'));
	?>
	<form class="form-horizontal" action="" method="post">
    	<div class="form-group">
        	<label class="col-sm-3 control-label">Npm</label>
            <div class="col-sm-2">
            	<input type="text" name="npm" class="form-control" placeholder="Npm" required>
            </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-4">
            	<input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
        </div>
         <div class="form-group">
        	<label class="col-sm-3 control-label">Tempat Lahir</label>
            <div class="col-sm-4">
            	<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
            </div>
        </div>
         <div class="form-group">
        	<label class="col-sm-3 control-label">Tanggal Lahir</label>
            <div class="col-sm-4">
            	<input type="date" name="tanggal_lahir" value="" min="<?php echo $minage; ?>" max="<?php echo $maxage; ?>" class="input-group form-control" placeholder="yyyy-mm-dd" required>
            </div>
      
        </div>
         <div class="form-group">
        	<label class="col-sm-3 control-label">No Telepon</label>
            <div class="col-sm-3">
            	<input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" required>
            </div>
        </div>
         <div class="form-group">
        	<label class="col-sm-3 control-label">Fakultas</label>
            <div class="col-sm-2">
            	<select name="fakultas" class="form-control" required>
                	<option value="">- pilih -</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Sipil">Teknik Sipil</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                </select>
            </div>
        </div>
        
         <div class="form-group">
        	<label class="col-sm-3 control-label">Semester</label>
            <div class="col-sm-2">
            	<select name="semester" class="form-control" required>
                	<option value="">- pilih -</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                    <option value="Ganjil">Ganjil</option>
                </select>
            </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-6">
           		<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan"/>
                <a href="mahasiswa_data.php" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> Batal</a>
                <a href="mahasiswa_data.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
            </div>
        </div>
    </form>
    <?php include "foot.php"; ?>
	</div>