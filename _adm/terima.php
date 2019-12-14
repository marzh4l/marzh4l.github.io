<?php  
    include "../koneksi.php";
    $id = $_POST['id'];
?>
	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    <a href="proses_terima.php?id=<?php echo $id; ?>" class="btn btn-success">Terima<i class="fa fa-check position-right"></i></a>