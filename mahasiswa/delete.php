<?php

require '../koneksi.php';

if (isset($_GET['nim'])) {
	$input_nim = $_GET['nim'];
	$query = "delete from mahasiswa where nim='$input_nim'"; 
	$result = mysqli_query($link, $query);

	if ($result) {
		header('location: index.php');
	}else{
		echo 'Gagal disimpan :' . mysqli_error($link);
	}
	
}

?>