<?php include "head.php"; ?>
	<div class="container">
	<h3>Data Karyawan &raquo; Tambah Data</h3>
    <hr/>
    <?php include "koneksi.php"; ?>
    <?php
		if (isset($_POST['add'])){
			$nik			=$_POST['nik'];
			$nama			=$_POST['nama'];
			$tempat_lahir	=$_POST['tempat_lahir'];
			$tanggal_lahir	=$_POST['tanggal_lahir'];
			$alamat			=$_POST['alamat'];
			$no_telepon		=$_POST['no_telepon'];
			$jabatan		=$_POST['jabatan'];
			$status			=$_POST['status'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'");
			if(mysqli_num_rows($cek)==0){
				
				$insert = mysqli_query($koneksi, "INSERT INTO karyawan(nik,nama,tempat_lahir,tanggal_lahir,alamat,no_telepon,jabatan,status) VALUES ('$nik','$nama','$tempat_lahir','$tanggal_lahir','$alamat','$no_telepon','$jabatan','$status')") or die(mysql_error($koneksi));
				if ($insert){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Karyawan Berhasil Disimpan.</div>';
				}
				else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>Data Gagal Disimpan.</div>';
					}
				}
			else {
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>NIK sudah ada...!!</div>';	
				}
			}
			$now = strtotime(date("Y-m-d"));
			$maxage = date('Y-m-d', strtotime('- 16 years, $now'));
			$minage = date('Y-m-d', strtotime('- 40 years, $now'));
	?>
	<form class="form-horizontal" action="" method="post">
    	<div class="form-group">
        	<label class="col-sm-3 control-label">NIK</label>
            <div class="col-sm-2">
            	<input type="text" name="nik" class="form-control" placeholder="NIK" required>
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
        	<label class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-3">
            	<textarea name="alamat" class="form-control" placeholder="Alamat"></textarea> 
            </div>
        </div>
         <div class="form-group">
        	<label class="col-sm-3 control-label">No Telepon</label>
            <div class="col-sm-3">
            	<input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" required>
            </div>
        </div>
         <div class="form-group">
        	<label class="col-sm-3 control-label">Jabatan</label>
            <div class="col-sm-2">
            	<select name="jabatan" class="form-control" required>
                	<option value="">- pilih -</option>
                    <option value="Operator">Operator</option>
                    <option value="Leader">Leader</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Manager">Manager</option>
                </select>
            </div>
        </div>
        
         <div class="form-group">
        	<label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-2">
            	<select name="status" class="form-control" required>
                	<option value="">- pilih -</option>
                    <option value="Outsourching">Outsourching</option>
                    <option value="Kontrak">Kontrak</option>
                    <option value="Tetap">Tetap</option>
                </select>
            </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-6">
           		<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan"/>
                <a href="karyawan_data.php" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> Batal</a>
                <a href="karyawan_data.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
            </div>
        </div>
    </form>
    <?php include "foot.php"; ?>
	</div>