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
		if (isset($_GET['url-nip'])) {
			$input_nip = $_GET['url-nip'];
			$query = "select * from dosen where nip='$input_nip'";
			$result = mysqli_query($link, $query);
			$isi = mysqli_fetch_object($result);
		}
		if(isset($_POST['simpan'])){
			$input_nip = $_POST['txtnip'];
			$input_nama = $_POST['txtnama'];
			$input_alamat = $_POST['txtalamat'];

			$query = "UPDATE dosen SET nama_dosen='$input_nama', alamat='$input_alamat' WHERE nip='$input_nip'";
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
				<input type="text" class="form-control" name="txtnip" value="<?= $isi->nip; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="txtnama" value="<?= $isi->nama_dosen; ?>">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" class="form-control" name="txtalamat" value="<?= $isi->alamat; ?>">
			</div>
			<input type="submit" class="btn btn-primary" name="simpan" value="Simpan Perubahan">
			<a href="index.php" class="btn btn-warning">Batal</a>
		</form>
	</div>
</body>
</html>