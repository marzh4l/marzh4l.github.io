<?php  
	require_once("../koneksi.php");
	$id_ptkin = @$_POST['id_ptkin'];
	$kategori = @$_POST['kategori'];
	$nm_ptki = @$_POST['nm_ptki'];
	$kode = @$_POST['kode'];
	$kota = @$_POST['kota'];
	$cekdata = mysqli_query($koneksi, "SELECT * FROM `ptkin_sumatera` where `nm_ptki` = '$nm_ptki'");

	// echo $kategori." ".$nm_ptki;

	if (mysqli_num_rows($cekdata) > 0) {
		header("location:input_ptkin.php?error=3");
	} else {
		$sql = mysqli_query($koneksi, "UPDATE `ptkin_sumatera` SET `kategori` = '$kategori',`nm_ptki` = '$nm_ptki',`kota` = '$kota',`kode` = '$kode' WHERE `id_ptkin` = '$id_ptkin'");
		if ($sql) {
			header("location:input_ptkin.php?error=1");				
		} else {
			header("location:input_ptkin.php?error=2");
		}
	}
?>