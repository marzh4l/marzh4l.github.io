<?php
	include_once '../koneksi.php';
	$id = $_GET['id'];
	$hapus = mysqli_query($koneksi, "DELETE FROM cabang_lomba WHERE id_cablom = '$id'");
	if ($hapus) {
		header("location:pendaftaran.php?alert=8");
	} else {
		header("location:pendaftaran.php?alert=9");
	}
?>