<?php  
	include '../koneksi.php';
	$id_official = @$_POST['id_official'];
	$id_cablom = @$_POST['id_cablom'];
	$nm_official = @$_POST['nm_official'];
	$nip = @$_POST['nip'];
	$no_hp = @$_POST['no_hp'];
	$jenis_kelamin = @$_POST['jenis_kelamin'];
	$tgl = @$_POST['tgl'];
	$tanggal = date('Y-m-d', strtotime($tgl));
	$jabatan = @$_POST['jabatan'];

	//Buat konfigurasi upload
	//Folder tujuan upload file
	$eror   = false;
	$folder_foto   = 'berkas/official/';

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
	  	$pesan .= header("location:pendaftaran.php?alert=5");
	}

	if($foto_size > $max_size){
	  	$eror   = true;
	  	// Ukuran file melebihi batas maximum
   		$pesan .= header("location:pendaftaran.php?alert=7");
	}
	//check ukuran file apakah sudah sesuai

	// echo $id_ptki.'<br>';
	// echo $nm_ketua.'<br>';
	// echo $nip.'<br>';
	// echo $no_hp.'<br>';
	// echo $jenis_kelamin.'<br>';
	// echo $tgl.'<br>';
	// echo $jabatan.'<br>';
	// echo $nm_lomba.'<br>';
	// echo $direktori_foto;
	
	if($eror == true){
    // echo '<div id="eror">'.$pesan.'</div>';
    	echo $pesan;
  	} else {
		$upload_foto = move_uploaded_file($_FILES['foto']['tmp_name'], $folder_foto.$ubah_nama);
		if($upload_foto){
			$query_kontingen = mysqli_query($koneksi,"INSERT INTO official(id_official,id_cablom,nm_official,nip,no_hp,jenis_kelamin,tgl,foto) VALUES ('$id_official','$id_cablom','$nm_official','$nip','$no_hp','$jenis_kelamin','$tanggal','$direktori_foto')");
	      	if($query_kontingen){
	        	header("location:pendaftaran.php?alert=1");
	      	} else {
	        	header("location:pendaftaran.php?alert=2");
	      	}
	    } else {
	    	header("location:pendaftaran.php?alert=4");
	    }
  	}
?>