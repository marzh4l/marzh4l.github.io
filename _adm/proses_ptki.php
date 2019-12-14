<?php  
	require_once("../koneksi.php");
	$kategori = @$_POST['kategori'];
	$nm_ptki = @$_POST['nm_ptki'];
	$kode = @$_POST['kode'];
	$kota = @$_POST['kota'];
	$cekdata = mysqli_query($koneksi, "SELECT * FROM `ptkin_sumatera` where `nm_ptki` = '$nm_ptki'");

	// echo $kategori." ".$nm_ptki;

	if (mysqli_num_rows($cekdata) > 0) {
		header("location:input_ptkin.php?error=3");
	} else {
		$sql = mysqli_query($koneksi, "INSERT INTO `ptkin_sumatera`(`id_ptkin`, `kategori`, `nm_ptki`, `kota`, `kode`) VALUES ('','$kategori','$nm_ptki','$kota','$kode')");
		if ($sql) {
			header("location:input_ptkin.php?error=1");				
		} else {
			header("location:input_ptkin.php?error=2");
		}
	}
?>