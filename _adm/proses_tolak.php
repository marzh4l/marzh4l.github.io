<?php
	include_once '../koneksi.php';
	$id = @$_GET['id'];
	$proses = mysqli_query($koneksi, "UPDATE `kontingen` SET `status`= 'FALSE' WHERE `id_kontingen` = '$id'");
	if ($proses) {
		?><script> alert("Data Berhasi"); window.location.href = "verifikasi_peserta.php";</script><?php
	} else {
		?><script> alert("Data Gagal"); window.location.href = "verifikasi_peserta.php";</script><?php
	}
?>