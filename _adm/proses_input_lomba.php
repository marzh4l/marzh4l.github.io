<?php  
	include '../koneksi.php';
	$nm_lomba = strtoupper($_POST['nm_lomba']);
	// echo $nm_lomba;
	$putra = @$_POST['putra'];
	$putri = @$_POST['putri'];
	$jumlah = @$_POST['jumlah'];
	// echo $putra.', '.$putri.', '.$jumlah;

	$query = mysqli_query($koneksi,"INSERT INTO lomba(id_lomba,nm_lomba,putra,putri,jumlah) VALUES ('','$nm_lomba','$putra','$putri','$jumlah')");
	if ($query) {
		header("location:input_perlombaan.php?error=1"); 
	} else {
		header("location:input_perlombaan.php?error=2");
	}
?>