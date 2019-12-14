<?php
	include_once '../koneksi.php';
	$id = $_GET['id'];
	$query = mysqli_query($koneksi, "SELECT `id_kontingen`, `foto`, `ktm`, `ktp`, `khs`, `ijazah`, `sks`, `asuransi` FROM `berkas` WHERE `id_kontingen` = '$id'");
	$data = mysqli_fetch_array($query);
	$id_kontingen = $data['id_kontingen'];
	$foto = unlink($data['foto']);
	$ktm = unlink($data['ktm']);
	$ktp = unlink($data['ktp']);
	$khs = unlink($data['khs']);
	$ijazah = unlink($data['ijazah']);
	$sks = unlink($data['sks']);
	$asuransi = unlink($data['asuransi']);
	if($foto && $ktm && $ktp && $khs && $ijazah && $sks && $asuransi){
		$hapus_kontingen = mysqli_query($koneksi, "DELETE FROM `kontingen` WHERE `id_kontingen` = '$id' ");
		$hapus_berkas = mysqli_query($koneksi, "DELETE FROM `berkas` WHERE `id_kontingen` = '$id' ");
		if ($hapus_kontingen && $hapus_berkas) {
			header("location:daftar_kontingen.php?alert=1");
		} else {
			header("location:daftar_kontingen.php?alert=2");
		}
	} else {
		header("location:daftar_kontingen.php?alert=2");
	}
?>