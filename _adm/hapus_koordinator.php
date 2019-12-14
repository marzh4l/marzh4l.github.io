<?php
	include_once '../koneksi.php';
	$id = $_GET['id'];
	$query = mysqli_query($koneksi, "SELECT `foto` FROM `pnt_koor` WHERE `id_koor` = '$id'");
	$data = mysqli_fetch_array($query);
	$foto = unlink($data['foto']);
	if($foto){
		$hapus = mysqli_query($koneksi, "DELETE FROM pnt_koor WHERE id_koor = '$id'");
		if ($hapus) {
			header("location:input_koordinator.php?alert=8");
		} else {
			header("location:input_koordinator.php?alert=9");
		}
	} else {
		header("location:daftar_kontingen.php?alert=9");
	}
?>