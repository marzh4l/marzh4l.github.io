<?php  
	include '../koneksi.php';
	$id_kontingen = $_POST['id_kontingen'];
	$id_cablom = $_POST['id_cablom'];
	$nm_lomba = $_POST['nm_lomba'];
	$nm_kontingen = $_POST['nm_kontingen'];
	$nim = $_POST['nim'];
	$no_hp = $_POST['no_hp'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$jurusan = $_POST['jurusan'];
	$tgl = $_POST['tgl'];
	$tanggal = date('Y-m-d', strtotime($tgl));

	//Buat konfigurasi upload
	//Folder tujuan upload file
	$eror   = false;
	$folder_foto   = 'berkas/foto/';
	$folder_file = 'berkas/file/';
    $folder_ss = 'berkas/ss/';

	//type file yang bisa diupload
    $file_type_foto  = array('jpg','jpeg','png');
    $file_type_pdf  = array('pdf');
    //tukuran maximum file yang dapat diupload
    $max_size = 550000; // 1MB
    $max_size_pdf = 4000000; // 1MB
	    
	//Mulai memorises data foto
	$foto_name  = $_FILES['foto']['name'];
  	$foto_size  = $_FILES['foto']['size'];
  	
  	//ubah nama foto
    $ubah_foto = 'v1'.$nim.'_'.$foto_name;

    //Mulai memorises data file
    $file_name  = $_FILES['file_pdf']['name'];
    $file_size  = $_FILES['file_pdf']['size'];

    //ubah nama File Data
    $ubah_file = 'v1'.$nim.'_'.$file_name;

    //Mulai memorises data Surat Keterangan Sehat
    $ss_name  = $_FILES['ss']['name'];
    $ss_size  = $_FILES['ss']['size'];
  
    //ubah nama Surat Keterangan Sehat
    $ubah_ss = 'v1'.$nim.'_'.$ss_name;

	//cari extensi file dengan menggunakan fungsi explode foto
	$explode_foto  = explode('.',$ubah_foto);
	$extensi_foto  = $explode_foto[count($explode_foto)-1];
    
    //cari extensi file dengan menggunakan fungsi explode file
    $explode_file  = explode('.',$ubah_file);
    $extensi_file  = $explode_file[count($explode_file)-1];

    //cari extensi file dengan menggunakan fungsi explode ss
    $explode_ss  = explode('.',$ubah_ss);
    $extensi_ss  = $explode_ss[count($explode_ss)-1];
    
	$direktori_foto = $folder_foto.$foto_name;
    $direktori_file = $folder_file.$ubah_file;
    $direktori_ss = $folder_ss.$ubah_ss;

    //check apakah type file sudah sesuai
    if(!in_array($extensi_foto,$file_type_foto) || !in_array($extensi_ss,$file_type_foto)){
        $eror   = true;
        // Type file yang anda upload tidak sesuai dengan foto
        $pesan .= header("location:daftar_kontingen.php?alert=5");
    }
    if(!in_array($extensi_file,$file_type_pdf)){
        $eror   = true;
        // Type yang anda upload tidak sesuai dengan PDF
        $pesan .= header("location:daftar_kontingen.php?alert=6");
    } 
    if($foto_size > $max_size || $file_size > $max_size_pdf || $ss_size > $max_size){
        $eror   = true;
        // Ukuran file melebihi batas maximum
        $pesan .= header("location:daftar_kontingen.php?alert=7");
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
			$query_kontingen = mysqli_query($koneksi,"UPDATE `kontingen` SET `nm_kontingen`='$nm_kontingen',`nim`='$nim',`no_hp`='$no_hp',`jenis_kelamin`='$jenis_kelamin',`jurusan`='$jurusan',`tgl`='$tanggal' WHERE `id_kontingen` = '$id_kontingen'");
		    if($query_kontingen){
		     	header("location:daftar_kontingen.php?alert=3");
		    } else {
		     	header("location:daftar_kontingen.php?alert=4");
		    }
  		} else {
			if($eror == true){
		    // echo '<div id="eror">'.$pesan.'</div>';
		    	echo $pesan;
		  	} else {
		  	//Upload file foto,berkas,screenshot
			$upload_foto = move_uploaded_file($_FILES['foto']['tmp_name'], $folder_foto.$foto_name);
			$upload_file = move_uploaded_file($_FILES['file_pdf']['tmp_name'], $folder_file.$ubah_file);
            $upload_ss = move_uploaded_file($_FILES['ss']['tmp_name'], $folder_ss.$ubah_ss);
				if($upload_foto && $upload_file && $upload_ss){
					$query_kontingen = mysqli_query($koneksi,"UPDATE `kontingen` SET `nm_kontingen`='$nm_kontingen',`nim`='$nim',`no_hp`='$no_hp',`jenis_kelamin`='$jenis_kelamin',`jurusan`='$jurusan',`tgl`='$tanggal',`foto`='$direktori_foto' WHERE `id_kontingen` = '$id_kontingen'");
					$query_berkas = mysqli_query($koneksi,"UPDATE `berkas` SET `foto`='$direktori_foto',`file_data`= '$direktori_file',`ss`= '$direktori_ss' WHERE `id_kontingen` = '$id_kontingen'");
			      	if($query_kontingen && $query_berkas){
			        	header("location:daftar_kontingen.php?alert=3");
			      	} else {
			        	header("location:daftar_kontingen.php?alert=4");
			      	}
			    } else {
			    	header("location:daftar_kontingen.php?alert=5");
			    }
  			}  		
  		}
?>