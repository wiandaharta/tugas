<!DOCTYPE html>
<html>
<head>
	<title>Data Dosen</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="alert alert-info", align="center">Edit Data</div>

		<?php
		require '../koneksi.php';
		if (isset($_GET['url-nim'])) {
			$input_nim = $_GET['url-nim'];
			$query = "select * from mahasiswa where nim='$input_nim'";
			$result = mysqli_query($link, $query);
			$isi = mysqli_fetch_object($result);
		}
		if(isset($_POST['simpan'])){
			$input_nim = $_POST['txtnim'];
			$input_nama = $_POST['txtnama'];
			$input_prodi = $_POST['txtprodi'];

			$query = "UPDATE mahasiswa SET nama_mahasiswa='$input_nama', prodi='$input_prodi' WHERE nim='$input_nim'";
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
				<label>Nim</label>
				<input type="text" class="form-control" name="txtnim" value="<?= $isi->nim; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="txtnama" value="<?= $isi->nama_mahasiswa; ?>">
			</div>
			<div class="form-group">
				<label>Prodi</label>
				<input type="text" class="form-control" name="txtprodi" value="<?= $isi->prodi; ?>">
			</div>
			<input type="submit" class="btn btn-primary" name="simpan" value="Simpan Perubahan">
			<a href="index.php" class="btn btn-warning">Batal</a>
		</form>
	</div>
</body>
</html>