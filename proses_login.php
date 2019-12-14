<?php
    session_start();
    include 'koneksi.php';
    $username = @$_POST['username'];
    $password = @$_POST['password'];
    // $login = @$_POST['login'];
    $cek_ptki = mysqli_query($koneksi,"SELECT `username`,`password`,`email` FROM ptki WHERE `username` = '$username' AND `password` = '$password' AND `aktivasi` = 'TRUE'"); 
    @$hasil_ptki = mysqli_fetch_array($cek_ptki);
    $cek_panitia = mysqli_query($koneksi,"SELECT `username`,`password` FROM pnt_lomba WHERE username = '$username'"); 
    @$hasil_panitia = mysqli_fetch_array($cek_panitia);

    // if ($login) {
        if (mysqli_num_rows($cek_ptki) == 0 && mysqli_num_rows($cek_panitia) == 0) {
            header("location:login.php?alert=1");
            $stop = 1;
        } //else if (mysqli_num_rows($cek_panitia) == 0) {
            //header("location:login.php?alert=1");
            //$stop = 1;
        //}

        if (@$stop!=1) {
            $pass_ptki = $hasil_ptki['password'];
            $pass_panitia = $hasil_panitia['password'];
            if ($password == $pass_ptki){
                $_SESSION['email'] = $username;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                //echo $hasil_ptki['password'];
                //echo $hasil_ptki['email'];
            ?>
                <script type="text/javascript"> 
                    //alert("Anda Berhasil login"); 
                    window.location.href = "ptki/index.php";
                    // untuk langsung melihat
                </script>
            <?php        
            } else if ($password == $pass_panitia){
                $_SESSION['username'] = $username;
            ?>
                <script type="text/javascript"> 
                    //alert("Anda Berhasil login"); 
                    window.location.href = "panitia/index.php";
                    // untuk langsung melihat
                </script>
            <?php        
            } else {
                header("location:login.php?alert=2");
            }
        }
    // }
?>