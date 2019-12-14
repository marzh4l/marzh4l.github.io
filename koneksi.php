<?php
$db_host = "localhost";
$db_user = "id3472255_pkm";
$db_pass = "uinpkm";
$db_name = "id3472255_pkm";

$koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);

if(!$koneksi){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>
