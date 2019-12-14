<?php
    session_start();
    include '../koneksi.php';
    $username = @$_POST['username'];
    $password = @$_POST['password'];
    // $login = @$_POST['login'];
    $cekdata = mysqli_query($koneksi,"SELECT `username`,`password` FROM admin WHERE username = '$username'"); 
    $hasil = mysqli_fetch_array($cekdata);

    // if ($login) {
        if (mysqli_num_rows($cekdata) == 0) {
            header("location:login.php?alert=1");
            $stop = 1;
        }

        if (@$stop!=1) {
            $pass = $hasil['password'];
            if ($password == $pass){
                $_SESSION['username'] = $username;
            ?>
                <script type="text/javascript"> 
                    //alert("Anda Berhasil login"); 
                    window.location.href = "index.php";
                    // untuk langsung melihat
                </script>
            <?php        
            } else {
                header("location:login.php?alert=2");
            }
        }
    // }
?>