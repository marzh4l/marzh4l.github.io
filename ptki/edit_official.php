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
	$folder_foto   = 'berkas/foto/';

	//type file yang bisa diupload
	$file_type_foto  = array('jpg','jpeg','png');
	//tukuran maximum file yang dapat diupload
	$max_size = 1000000; // 1MB
	    
	//Mulai memorises data foto
	$foto_name  = $_FILES['foto']['name'];
  	$foto_size  = $_FILES['foto']['size'];

	//cari extensi file dengan menggunakan fungsi explode foto
	$explode_foto  = explode('.',$foto_name);
	$extensi_foto  = $explode_foto[count($explode_foto)-1];

	$direktori_foto = $folder_foto.$foto_name;


	//check apakah type file sudah sesuai
	if(!in_array($extensi_foto,$file_type_foto)){
	  	$eror   = true;
	  	// Type file yang anda upload tidak sesuai dengan foto
	  	$pesan .= header("location:data_official.php?alert=4");
	}

	if($foto_size > $max_size){
	  	$eror   = true;
	  	// Ukuran file melebihi batas maximum
   		$pesan .= header("location:data_official.php?alert=5");
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
	
  		if ($foto_name == "") {
			$query_kontingen = mysqli_query($koneksi,"UPDATE `official` SET `id_official`='$id_official',`id_cablom`='$id_cablom',`nm_official`='$nm_official',`nip`='$nip',`no_hp`='$no_hp',`jenis_kelamin`='$jenis_kelamin',`tgl`='$tanggal',`jabatan`='$jabatan' WHERE `id_official` = '$id_official'");
		    if($query_kontingen){
		     	header("location:data_official.php?alert=1");
		    } else {
		     	header("location:data_official.php?alert=2");
		    }
  		} else {
			if($eror == true){
		    // echo '<div id="eror">'.$pesan.'</div>';
		    	echo $pesan;
		  	} else {
			$upload_foto = move_uploaded_file($_FILES['foto']['tmp_name'], $folder_foto.$foto_name);
				if($upload_foto){
					$query_kontingen = mysqli_query($koneksi,"UPDATE `official` SET `id_official`='$id_official',`id_cablom`='$id_cablom',`nm_official`='$nm_official',`nip`='$nip',`no_hp`='$no_hp',`jenis_kelamin`='$jenis_kelamin',`tgl`='$tanggal',`jabatan`='$jabatan',`foto`='$direktori_foto' WHERE `id_official` = '$id_official'");
			      	if($query_kontingen){
			        	header("location:data_official.php?alert=1");
			      	} else {
			        	header("location:data_official.php?alert=2");
			      	}
			    } else {
			    	header("location:data_official.php?alert=3");
			    }
  			}  		
  		}
?>