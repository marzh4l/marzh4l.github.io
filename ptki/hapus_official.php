<?php
	include_once '../koneksi.php';
	$id = $_GET['id'];
	$hapus = mysqli_query($koneksi, "DELETE FROM official WHERE id_official = '$id'");
	if ($hapus) {
		header("location:data_official.php?alert=8");
	} else {
		header("location:data_official.php?alert=9");
	}
?>