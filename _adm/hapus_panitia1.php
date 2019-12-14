<?php  
    include "../koneksi.php";
    $id = $_POST['id'];
?>
	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    <a href="hapus_panitia2.php?id=<?php echo $id; ?>" class="btn btn-danger">Hapus<i class="fa fa-trash position-right"></i></a>