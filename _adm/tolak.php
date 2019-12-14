<?php  
    include "../koneksi.php";
    $id = $_POST['id'];
?>
    
	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    <a href="proses_tolak.php?id=<?php echo $id; ?>" class="btn btn-danger">Tolak<i class="fa fa-times position-right"></i></a>