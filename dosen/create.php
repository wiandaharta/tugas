<!DOCTYPE html>
<html>
<head>
	<title>Data Dosen</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="alert alert-info", align="center">Tambah Data</div>

		<?php
		require '../koneksi.php';
		if(isset($_POST['simpan'])){
			$input_nip = $_POST['txtnip'];
			$input_nama = $_POST['txtnama'];
			$input_alamat = $_POST['txtalamat'];

			$query = "INSERT INTO dosen values('$input_nip', '$input_nama', '$input_alamat')";
			$result = mysqli_query($link, $query);

			if ($result) {
			header('location: index.php');
			}else{
				echo 'Gagal disimpan :' . mysqli_error($link);
			}
		}
		?>

		<form action="" method="post">
			<div class="form-group">
				<label>NIP</label>
				<input type="text" class="form-control" name="txtnip">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="txtnama">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" class="form-control" name="txtalamat">
			</div>
			<input type="submit" class="btn btn-primary" name="simpan" value="Simpan Data">
			<a href="index.php" class="btn btn-warning">Batal</a>
		</form>
	</div>
</body>
</html>