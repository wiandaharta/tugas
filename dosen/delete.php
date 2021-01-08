<?php

require '../koneksi.php';

if (isset($_GET['nip'])) {
	$input_nip = $_GET['nip'];
	$query = "delete from dosen where nip='$input_nip'"; 
	$result = mysqli_query($link, $query);

	if ($result) {
		header('location: index.php');
	}else{
		echo 'Gagal disimpan :' . mysqli_error($link);
	}
	
}

?>