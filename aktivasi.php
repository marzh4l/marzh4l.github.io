<!DOCTYPE HTML>
<html>

<head>
    <title>PKM - Pekan Kreatifitas Mahasiswa</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/tmp/bootstrap.css">
    <link rel="stylesheet" href="css/tmp/core.css">
    <link rel="stylesheet" href="css/tmp/components.css">
    <link rel="stylesheet" href="icons/styles.min.css">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/tether.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- <script type="text/javascript" src="js/app.min.js"></script> -->
    <style>
        .backgroung{
            background-color: #007bff!important;
            height: 50%!important;
            position: absolute;
            width: 100%;
            left: 0;
            top: 0;
            right: 0;
          }
          input:lang(id){
            quotes: 'Upload' ;
          }
    </style>
</head>

<body>
    <div class="page-container" style="width: 98.9%;">
        <!-- PAGE CONTENT -->
        <div class="content h-100" style="padding: 0px;">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="backgroung"></div>
                    <div class="login card auth-box mx-auto my-auto">
                        <div class="card-block text-center">
                            <div class="user-icon">
                                <img src="img/logoPKM.png" alt="logo PKM" width="100" height="100">
                            </div>
                                <h1 class="text-light">Selamat<br><span class="icon"><i class="fa fa-envelope-open-o"></i></span></h1>
                                    <?php
                                        require_once("koneksi.php");
                                        /*-----Decrypt-----*/
                                        require_once "Cipher.php";
                                        $cipher = new Cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
                                        
                                        $kunci = 'pkm';
                                        
                                        $getid = isset($_GET['code']) ? $_GET['code'] : '';
                                        $de_id = $cipher->decrypt($getid, $kunci);
                                        /*-----Decrypt-----*/
                                        $update = mysqli_query($koneksi,"UPDATE `ptki` SET `aktivasi` = 'TRUE' WHERE id_ptki = '$de_id'");
                                        
                                        $query = mysqli_query($koneksi,"SELECT `email` FROM ptki WHERE `id_ptki` = '$de_id'");
                                        $data = mysqli_fetch_array($query);
                                    ?>
                                    <div class="alert alert-info alert-solid" role="alert" style="width: max-content; margin: auto; background-color: #007bff">
                                        <!-- <span class="icon"><i class="fa fa-check position-left"></i></span> -->
                                    <?php
                                        if($update){
                                    ?>
                                        <strong>Data registrasi dengan akun Email <br><?php echo $data['email'];  ?><br>sudah terverifikasi, Silahkan <a href="login.php" style="text-decoration: none; color: #05022d">login</a></strong>
                                    <?php
                                        } else {
                                    ?>
                                        <strong>Reload Ulang</strong>
                                    <?php } ?>
                                    </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /PAGE CONTENT -->
    </div>
</body>

</html>