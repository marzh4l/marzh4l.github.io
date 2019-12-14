<?php  
    include "../koneksi.php";
    $id = $_POST['id'];
?>
	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    <a href="proseshapus_ptkin.php?id=<?php echo $id; ?>" class="btn btn-danger">Hapus<i class="fa fa-trash position-right"></i></a>