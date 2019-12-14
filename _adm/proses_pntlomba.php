<?php  
	include '../koneksi.php';

	$id_panitia = @$_POST['id_panitia'];
	$nm_panitia = @$_POST['nm_panitia'];
	$nim = @$_POST['nim'];
	$no_hp = @$_POST['no_hp'];
	$jenis_kelamin = @$_POST['jenis_kelamin'];
	$tgl = @$_POST['tgl'];
  	$tanggal = date('Y-m-d', strtotime($tgl));
	$nm_lomba = @$_POST['nm_lomba'];
	$jurusan = @$_POST['jurusan'];

	//Buat konfigurasi upload
	//Folder tujuan upload file
	$eror   = false;
	$folder_foto   = '../img/panitia/lomba/';

	//type file yang bisa diupload
	$file_type_foto  = array('jpg','jpeg','png');
	//tukuran maximum file yang dapat diupload
	$max_size = 1000000; // 1MB
	    
	//Mulai memorises data foto
	$foto_name  = $_FILES['foto']['name'];
  	$foto_size  = $_FILES['foto']['size'];

  	//ubah nama
  	$ubah_nama = $nim.'_'.$foto_name;

	//cari extensi file dengan menggunakan fungsi explode foto
	$explode_foto  = explode('.',$ubah_nama);
	$extensi_foto  = $explode_foto[count($explode_foto)-1];

	$direktori_foto = $folder_foto.$ubah_nama;

	//check apakah type file sudah sesuai
	if(!in_array($extensi_foto,$file_type_foto)){
	  	$eror   = true;
	  	// Type file yang anda upload tidak sesuai dengan foto
	  	$pesan .= header("location:input_panitia.php?alert=5");
	}

	if($foto_size > $max_size){
	  	$eror   = true;
	  	// Ukuran file melebihi batas maximum
   		$pesan .= header("location:input_panitia.php?alert=7");
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
			$query = mysqli_query($koneksi,"INSERT INTO pnt_lomba(id_panitia,username,password,nm_lomba,nm_panitia,nim,no_hp,jenis_kelamin,tgl,jurusan,foto) VALUES ('$id_panitia','$nim','$nim','$nm_lomba','$nm_panitia','$nim','$no_hp','$jenis_kelamin','$tanggal','$jurusan','$direktori_foto')");
			if ($query) {
				header("location:input_panitia.php?error=1"); 
			} else {
				header("location:input_panitia.php?error=2");
			}
		} else {
	    	header("location:input_panitia.php?alert=4");
	    }
  	}
?>