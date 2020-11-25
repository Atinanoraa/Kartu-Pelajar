<?php 
	require 'koneksi.php';
	//jika tombol di submit
	if (isset($_POST['simpan'])) {
		//pengujian data mau di edit apa di simpan baru
		if ($_GET['hal']=="edit") {
			$edit = mysqli_query($koneksi,"UPDATE siswa SET 
												nim='$_POST[nim]', 
												nama='$_POST[nama]', 
												alamat='$_POST[alamat]', 
												jurusan='$_POST[jurusan]'
												WHERE id_siswa='$_GET[id]' ");
			if ($edit) {
				echo "<script>
						alert('Sukses mengedit data!');
						document.location = 'index.php';
					 </script>";
			}
			else{
				echo "<script>
						alert('Gagal mengedit data!');
						document.location = 'index.php';
					 </script>";
			}
		}
		else{
			$simpan = mysqli_query($koneksi,"INSERT INTO siswa (nim, nama, alamat, jurusan)
											 VALUES ('$_POST[nim]',
											 		'$_POST[nama]',
											 		'$_POST[alamat]',
											 		'$_POST[jurusan]')
											");
			if ($simpan) {
				echo "<script>
						alert('Sukses menyimpan data!');
						document.location = 'index.php';
					 </script>";
			}
			else{
				echo "<script>
						alert('Gagal menyimpan data!');
						document.location = 'index.php';
					 </script>";
			}	
		}

	}
	// menguji tombol edit/hapus di klik
	if (isset($_GET['hal'])) {
		//pengujian tombol edit
		if ($_GET['hal']=="edit") {
			//tampilkan data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if ($data) {
				$vnim = $data['nim'];
				$vnama = $data['nama'];
				$valamat = $data['alamat'];
				$vjurusan = $data['jurusan'];
			}
		}
		elseif ($_GET['hal']=="hapus") {
			$hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = '$_GET[id]'");
			if ($hapus) {
				echo "<script>
						alert('Sukses menghapus data!');
						document.location = 'index.php';
					 </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Website Kartu Pelajar</title>
	<!-- gambar title -->
	<link rel="icon" type="image/png" href="assets/img/logoTs.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="text-center">KARTU PELAJAR</h1>
	<h2 class="text-center">SMK Telkom Purwokerto</h2>

	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-dark text-white">
	    Form Data Siswa
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>NIM</label>
	    		<input type="text" name="nim" value="<?=@$vnim?>" class="form-control" placeholder="Masukkan NIM anda" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama</label>
	    		<input type="text" name="nama" value="<?=@$vnama?>" class="form-control" placeholder="Masukkan Nama anda" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Alamat</label>
	    		<textarea class="form-control" name="alamat" placeholder="Masukkan Alamat anda"><?=@$valamat?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>Jurusan</label>
	    		<select class="form-control" name="jurusan">
	    			<option value="<?=@$vjurusan?>"><?=@$vjurusan?></option>
	    			<option value="RPL">RPL</option>
	    			<option value="TJA">TJA</option>
	    			<option value="TKJ">TKJ</option>
	    		</select>
	    	</div>
	    	<button type="submit" class="btn btn-success" name="simpan">Submit</button>
	    	<button type="reset" class="btn btn-danger" name="reset">Clear</button>
	    </form>
	  </div>
	</div>
	<!-- Penutup Card Form -->

	<!-- Awal Card Table -->
	<div class="card mt-3">
	  <div class="card-header bg-dark text-white">
	    Daftar Siswa
	  </div>
	  <div class="card-body">
	    <table class="table table-bordered table-striped">
	    	<tr class="text-center bg-secondary">
	    		<th>No.</th>
	    		<th>NIM</th>
	    		<th>Nama</th>
	    		<th>Alamat</th>
	    		<th>Jurusan</th>
	    		<th>Action</th>
	    	</tr>
	    	<?php 
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * FROM siswa order by nim asc");
	    		while ($data = mysqli_fetch_array($tampil)) :
	    	?>
	    	<tr>
	    		<td class="text-center"><?=$no++;?></td>
	    		<td><?=$data['nim']?></td>
	    		<td><?=$data['nama']?></td>
	    		<td><?=$data['alamat']?></td>
	    		<td class="text-center"><?=$data['jurusan']?></td>
	    		<td class="text-center">
	    			<a href="index.php?hal=edit&id=<?=$data['id_siswa']?>" class="btn btn-info">Edit</a>
	    			<a href="index.php?hal=hapus&id=<?=$data['id_siswa']?>" onClick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-warning">Delete</a>
	    		</td>
	    	</tr>
	    <?php endwhile; ?>
	    </table>
	  </div>
	</div>
	<!-- Penutup Card Table -->
	<div class="border border-0 p-3 mb-4">
		<div class="text-center">
			<a type="button" class="btn btn-danger" href="login.php" onClick="return confirm('Apakah yakin ingin keluar?')">LOGOUT</a>
		</div>
	</div>

</div>
<script type="text/javascript" href="js/bootstrap.min.js"></script>
</body>
</html>