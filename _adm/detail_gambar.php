<?php              
    include "../koneksi.php";
    $id = $_POST['id'];    
	$query = mysqli_query($koneksi,"SELECT `id_kontingen`, `ss` FROM `berkas` WHERE `id_kontingen` = '$id'");
    $no = 1;
    while ($data = mysqli_fetch_array($query)) {
?>
<img src="<?php echo '../ptki/'.$data['ss']; ?>" alt="<?php echo $data['ss']; ?>" style="width: 110%;">
<?php 
    }  
?>