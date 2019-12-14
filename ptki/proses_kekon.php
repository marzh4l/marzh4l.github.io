<?php  
	include '../koneksi.php';
	$id_ptki = @$_POST['id_ptki'];
	$nm_ketua = @$_POST['nm_ketua'];
	$nip = @$_POST['nip'];
	$no_hp = @$_POST['no_hp'];
	$jenis_kelamin = @$_POST['jenis_kelamin'];
	$tgl = @$_POST['tgl'];
	$tanggal = date('Y-m-d', strtotime($tgl));
	$jabatan = @$_POST['jabatan'];

	//Buat konfigurasi upload
	//Folder tujuan upload file
	$eror   = false;
	$folder_foto   = 'berkas/ketua/';

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

	//cekdata formulir dan berkas
  	$cekdata = mysqli_query($koneksi,"SELECT id_ptki FROM ketua_kon WHERE id_ptki = '$id_ptki'");

	//check apakah type file sudah sesuai
	if(!in_array($extensi_foto,$file_type_foto)){
	  	$eror   = true;
	  	// Type file yang anda upload tidak sesuai dengan foto
	  	$pesan .= header("location:daftar_ketua.php?alert=4");
	}

	if($foto_size > $max_size){
	  	$eror   = true;
	  	// Ukuran file melebihi batas maximum
   		$pesan .= header("location:daftar_ketua.php?alert=5");
	}
	//check ukuran file apakah sudah sesuai

 	if (mysqli_num_rows($cekdata) > 0) {
   		$eror   = true;
	  	// Data Sudah Terdaftar
	  	$pesan .= header("location:daftar_ketua.php?alert=6");
	  	//echo "Data sudah terdaftar";
	}

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
			$query_kontingen = mysqli_query($koneksi,"INSERT INTO ketua_kon(id_ketua,id_ptki,nm_ketua,nip,no_hp,jenis_kelamin,tgl,jabatan,foto) VALUES ('','$id_ptki','$nm_ketua','$nip','$no_hp','$jenis_kelamin','$tanggal','$jabatan','$direktori_foto')");
	      	if($query_kontingen){
	        	header("location:daftar_ketua.php?alert=1");
	      	} else {
	        	header("location:daftar_ketua.php?alert=2");
	      	}
	    } else {
	    	header("location:daftar_ketua.php?alert=3");
	    }
  	}
?>