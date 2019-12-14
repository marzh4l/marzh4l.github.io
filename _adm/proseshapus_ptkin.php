<?php
	include_once '../koneksi.php';
	$id = $_GET['id'];
	$hapus = mysqli_query($koneksi, "DELETE FROM `ptkin_sumatera` WHERE `kode` = '$id'");
	if ($hapus) {
		header("location:input_ptkin.php?error=4");
	} else {
		header("location:input_ptkin.php?error=5");
	}
?>