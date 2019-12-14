<?php
  include '../koneksi.php';
  // echo "Selamat";
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

  // echo '<br>';
  // echo $id_kontingen.'<br>';
  // echo $id_cablom.'<br>';
  // echo $nm_lomba.'<br>';
  // echo $nm_kontingen.'<br>';
  // echo $nim.'<br>';
  // echo $jenis_kelamin.'<br>';
  // echo $jurusan.'<br>';
  // echo $tgl.'<br>';

  //Buat konfigurasi upload
  //Folder tujuan upload file
  $eror   = false;
  $folder_foto = 'berkas/foto/';
  $folder_file = 'berkas/file/';
  $folder_ss = 'berkas/ss/';

  //type file yang bisa diupload
  $file_type_foto  = array('jpg','jpeg','png');
  $file_type_pdf  = array('pdf');
  //tukuran maximum file yang dapat diupload
  $max_size = 550000; // 1MB
  //$max_size_pdf = 4000000; // 1MB
  $max_size_pdf = 550000; // 1MB
    
  //Mulai memorises data foto
  $foto_name  = $_FILES['foto']['name'];
  $foto_size  = $_FILES['foto']['size'];

  //ubah nama foto
  $ubah_foto = $nim.'_'.$foto_name;

  //Mulai memorises data file
  $file_name  = $_FILES['file_pdf']['name'];
  $file_size  = $_FILES['file_pdf']['size'];

  //ubah nama File Data
  $ubah_file = $nim.'_'.$file_name;

  //Mulai memorises data Surat Keterangan Sehat
  $ss_name  = $_FILES['ss']['name'];
  $ss_size  = $_FILES['ss']['size'];
  
  //ubah nama Surat Keterangan Sehat
  $ubah_ss = $nim.'_'.$ss_name;

  //cari extensi file dengan menggunakan fungsi explode foto
  $explode_foto  = explode('.',$ubah_foto);
  $extensi_foto  = $explode_foto[count($explode_foto)-1];

  //cari extensi file dengan menggunakan fungsi explode file
  $explode_file  = explode('.',$ubah_file);
  $extensi_file  = $explode_file[count($explode_file)-1];

  //cari extensi file dengan menggunakan fungsi explode ss
  $explode_ss  = explode('.',$ubah_ss);
  $extensi_ss  = $explode_ss[count($explode_ss)-1];

  $direktori_foto = $folder_foto.$ubah_foto;
  $direktori_file = $folder_file.$ubah_file;
  $direktori_ss = $folder_ss.$ubah_ss;

  // echo $direktori_foto.'<br>';
  // echo $direktori_file.'<br>';
  // echo $direktori_ss.'<br>';

  //cekdata formulir dan berkas
  $cekdata = mysqli_query($koneksi,"SELECT nim FROM kontingen WHERE nim = '$nim'");

  //check apakah type file sudah sesuai
  if(!in_array($extensi_foto,$file_type_foto) || !in_array($extensi_ss,$file_type_foto)){
    $eror   = true;
    // Type file yang anda upload tidak sesuai dengan foto
    $pesan .= header("location:pendaftaran.php?alert=5");
  }
  if(!in_array($extensi_file,$file_type_pdf)){
    $eror   = true;
    // Type yang anda upload tidak sesuai dengan PDF
    $pesan .= header("location:pendaftaran.php?alert=6");
  }
  if($foto_size > $max_size || $file_size > $max_size_pdf || $ss_size > $max_size){
    $eror   = true;
    // Ukuran file melebihi batas maximum
    $pesan .= header("location:pendaftaran.php?alert=7");
  }

  //check ukuran file apakah sudah sesuai

  if (mysqli_num_rows($cekdata) > 0) {
    $eror   = true;
    // Data Sudah Terdaftar
    $pesan .= header("location:pendaftaran.php?alert=3");
  }

  if($eror == true){
    // echo '<div id="eror">'.$pesan.'</div>';
    echo $pesan;
  } else {
    //mulai memproses upload file
    $upload_foto = move_uploaded_file($_FILES['foto']['tmp_name'], $folder_foto.$ubah_foto);
    $upload_file = move_uploaded_file($_FILES['file_pdf']['tmp_name'], $folder_file.$ubah_file);
    $upload_ss = move_uploaded_file($_FILES['ss']['tmp_name'], $folder_ss.$ubah_ss);
    
    if($upload_foto && $upload_file && $upload_ss){
      $query_kontingen = mysqli_query($koneksi,"INSERT INTO `kontingen`(`id_kontingen`, `id_cablom`, `nm_kontingen`, `nim`, `no_hp`, `jenis_kelamin`, `jurusan`, `tgl`) VALUES ('$id_kontingen','$id_cablom','$nm_kontingen','$nim','$no_hp','$jenis_kelamin','$jurusan','$tanggal')");
      //$query_berkas = mysqli_query($koneksi,"INSERT INTO `berkas`(`id_kontingen`, `foto`, `ktm`, `ktp`, `khs`, `ijazah`, `sks`, `asuransi`, `ss`) VALUES ('$id_kontingen','$direktori_foto','$direktori_ktm','$direktori_ktp','$direktori_khs','$direktori_ijazah','$direktori_sks','$direktori_asuransi','$direktori_ss')");
      $query_berkas = mysqli_query($koneksi,"INSERT INTO `berkas`(`id_kontingen`, `foto`, `file_data`, `ss`) VALUES ('$id_kontingen','$direktori_foto','$direktori_file','$direktori_ss')");
      if($query_kontingen && $query_berkas){
        header("location:pendaftaran.php?alert=1");
      } else {
        header("location:pendaftaran.php?alert=2");
      }
    } else{
      // Proses gagal diupload
      header("location:pendaftaran.php?alert=4");
    }
  }

?>