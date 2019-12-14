<?php  
	include '../koneksi.php';

	$id_koor = @$_POST['id_koor'];
	$nm_koor = @$_POST['nm_koor'];
	$nip = @$_POST['nip'];
	$no_hp = @$_POST['no_hp'];
	$jenis_kelamin = @$_POST['jenis_kelamin'];
	$tgl = @$_POST['tgl'];
  	$tanggal = date('Y-m-d', strtotime($tgl));
	$koordinator = @$_POST['koordinator'];
	$jabatan = @$_POST['jabatan'];

	//Buat konfigurasi upload
	//Folder tujuan upload file
	$eror   = false;
	$folder_foto   = '../img/panitia/koordinator/';

	//type file yang bisa diupload
	$file_type_foto  = array('jpg','jpeg','png');
	//tukuran maximum file yang dapat diupload
	$max_size = 1000000; // 1MB
	    
	//Mulai memorises data foto
	$foto_name  = $_FILES['foto']['name'];
  	$foto_size  = $_FILES['foto']['size'];

  	//ubah nama
  	$ubah_nama = $nip.'_'.$foto_name;

	//cari extensi file dengan menggunakan fungsi explode foto
	$explode_foto  = explode('.',$ubah_nama);
	$extensi_foto  = $explode_foto[count($explode_foto)-1];

	$direktori_foto = $folder_foto.$ubah_nama;

	//check apakah type file sudah sesuai
	if(!in_array($extensi_foto,$file_type_foto)){
	  	$eror   = true;
	  	// Type file yang anda upload tidak sesuai dengan foto
	  	$pesan .= header("location:input_koordinator.php?alert=5");
	}

	if($foto_size > $max_size){
	  	$eror   = true;
	  	// Ukuran file melebihi batas maximum
   		$pesan .= header("location:input_koordinator.php?alert=7");
	}
	//check ukuran file apakah sudah sesuai

	// echo $id_panitia.'<br>';
	// echo $nm_panitia.'<br>';
	// echo $nim.'<br>';
	// echo $nm_lomba.'<br>';
	// echo $jenis_kelamin.'<br>';
	// echo $tanggal.'<br>';
	// echo $jurusan.'<br>';
	// echo $direktori_foto;
	
	if($eror == true){
    // echo '<div id="eror">'.$pesan.'</div>';
    	echo $pesan;
  	} else {
		$upload_foto = move_uploaded_file($_FILES['foto']['tmp_name'], $folder_foto.$ubah_nama);
		if($upload_foto){
			$query = mysqli_query($koneksi,"INSERT INTO pnt_koor(id_koor,nm_koor,koordinator,nip,no_hp,jenis_kelamin,tgl,jabatan,foto) VALUES ('$id_koor','$nm_koor','$koordinator','$nip','$no_hp','$jenis_kelamin','$tanggal','$jabatan','$direktori_foto')");
			if ($query) {
				header("location:input_koordinator.php?error=1"); 
			} else {
				header("location:input_koordinator.php?error=2");
			}
		} else {
	    	header("location:input_koordinator.php?alert=4");
	    }
  	}
?>