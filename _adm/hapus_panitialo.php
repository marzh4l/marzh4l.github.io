<?php
	include_once '../koneksi.php';
	$id = $_GET['id'];
	$query = mysqli_query($koneksi, "SELECT `foto` FROM `pnt_lo` WHERE `id_lo` = '$id'");
	$data = mysqli_fetch_array($query);
	$foto = unlink($data['foto']);
	if($foto){
		$hapus = mysqli_query($koneksi, "DELETE FROM pnt_lo WHERE id_lo = '$id'");
		if ($hapus) {
			header("location:input_lo.php?alert=8");
		} else {
			header("location:input_lo.php?alert=9");
		}
	} else {
		header("location:daftar_kontingen.php?alert=9");
	}
?>