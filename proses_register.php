<?php
    session_start();
    include "koneksi.php";
    $nm_ptki = @$_POST['nm_ptki'];
    $nm_adm = @$_POST['nm_pertama'];
    // $kode = @$_POST['kode'];
    $username = @$_POST['username'];
    // $password = @$_POST['password'];
    $email_user = @$_POST['email'];
    // file upload
    $sumber = @$_FILES['logo_ptki']['tmp_name'];
    $logo_ptki = @$_FILES['logo_ptki']['name'];
    $direktori = 'img/ptki/'.$logo_ptki;
    // memanggil kode masing-masing ptki
    $query_id = mysqli_query($koneksi,"SELECT `kode` FROM `ptkin_sumatera` WHERE `nm_ptki` = '$nm_ptki'");
    $data_id = mysqli_fetch_array($query_id);
    /*-----Encrypt-----*/
    require_once "Cipher.php";
    $cipher = new Cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);

    /*-- kunci untuk enkripsi dan dekripsi --*/
    /*-- kunci dapat diubah sesuai keinginan --*/
    $kunci = 'pkm';

    $id_ptki = $data_id['kode'];
    $en_id = $cipher->encrypt($id_ptki, $kunci);
    /*-----Encrypt-----*/
    
    /*------------------------ Kirim notifikasi aktivasi ke email peserta ----------------------*/
    $tujuan = $email_user;
    $subjek = "Aktivasi dan Password Login Event PEKAN KREATIVITAS MAHASISWA";
    $link = "http://marzal31.000webhostapp.com/pkm/aktivasi.php?code=$en_id"; /*-- jika sudah hosting, ubah dengan link URL website --*/
    // $pesan = "Klik link tautan berikut $link untuk aktivasi akun seminar Anda. Password anda adalah $password_baru. Silahkan login menggunakan email anda dan password tersebut.";
    $pesan =
    "
        Terima Kasih Telah Mendaftar Event PEKAN KREATIVITAS MAHASISWA<br>
        Nama Anda : ".$nm_adm."
        Email : ".$email_user."
        Username : ".$username."
        Password : ".$id_ptki."
        Klik link tautan berikut $link untuk aktivasi akun seminar Anda, Silahkan login menggunakan Username anda dan password tersebut.
        ";
    $from = "admin@localhost"; /*-- jika sudah hosting, ubah dengan email pengirim --*/
    
          
        // echo 'input nm_ptki : '.$nm_ptki.'<br>';
        // echo 'input nm_adm : '.$nm_adm.'<br>';
        // echo 'input email : '.$email_user.'<br>';
        // echo 'input username : '.$username.'<br>';
        // echo 'input direktori : '.$direktori.'<br>';
        // echo $pesan;
        // ---- bukan
        // echo 'input password : '.$password.'<br>';
        // echo 'input kode : '.$kode.'<br>';

    $cekdata = mysqli_query($koneksi,"SELECT `email` FROM `ptki` WHERE `email` = '$email_user'");
        if (mysqli_num_rows($cekdata) > 0) {
            header("location:register.php?alert=3");
        } else {
            // $upload = move_uploaded_file($sumber, $direktori);
            move_uploaded_file($sumber, $direktori);
            $query = mysqli_query($koneksi, "INSERT INTO `ptki`(`id_ptki`, `nm_ptki`, `nm_adm`, `username`, `password`, `email`, `logo_ptki`, `aktivasi`) VALUES ('$id_ptki', '$nm_ptki', '$nm_adm', '$username', '$id_ptki', '$email_user', '$direktori', 'FALSE')");
            $send_email = mail($email_user,$subjek,$pesan,$from);
            // if ($upload && $query && $send_email) {
            if (mail($email_user,$subjek,$pesan)) {
                    //echo "data berhasil disimpan";
                header("location:register.php?alert=1");
            } else {
                    //echo "data gagal disimpan";
                header("location:register.php?alert=2");
            }
        }
    ?>