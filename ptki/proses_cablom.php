<?php  
	include '../koneksi.php';
	$id_cablom = @$_POST['id_cablom'];
	$id_ptki = @$_POST['id_ptki'];
	$nm_lomba = @$_POST['nm_lomba'];
	$peserta_lomba = @$_POST['peserta_lomba'];
	$cekdata = mysqli_query($koneksi, "SELECT * FROM `cabang_lomba` WHERE `id_ptki` = '$id_ptki' AND `nm_lomba` = '$nm_lomba' AND `peserta_lomba`= 'Putra' OR `id_ptki` = '$id_ptki' AND `nm_lomba` = '$nm_lomba' AND `peserta_lomba` = 'Putri'");

	if (mysqli_num_rows($cekdata) > 0) {
		header("location:pendaftaran.php?alert=3");
	} else if($nm_lomba == '' || $peserta_lomba == ''){
		?><script> alert("Inputan Tidak Boleh Kosong"); window.location.href = "pendaftaran.php";</script><?php
	} else {
		$query = mysqli_query($koneksi,"INSERT INTO cabang_lomba(id_cablom,id_ptki,nm_lomba,peserta_lomba) VALUES ('$id_cablom','$id_ptki','$nm_lomba','$peserta_lomba')");
		if ($query) {
			header("location:pendaftaran.php?alert=1"); 
		} else {
			header("location:pendaftaran.php?alert=2");
		}
	}
?>