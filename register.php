<?php require_once("koneksi.php"); ?>
<!DOCTYPE HTML>
<html>

<head>
    <title>PKM - Pekan Kreatifitas Mahasiswa</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/pkm.ico">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/tmp/bootstrap.css">
    <link rel="stylesheet" href="css/tmp/core.css">
    <link rel="stylesheet" href="css/tmp/components.css">
    <link rel="stylesheet" href="icons/styles.min.css">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/tether.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/app.min.js"></script>

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
    <div class="page-container">
        <!-- PAGE CONTENT -->
        <!-- <div class="content h-100"> -->
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="backgroung"></div>
                    <div class="register card auth-box mx-auto my-auto">
                        <div class="card-block text-center">
                            <div class="user-icon">
                                <!-- <i class="fa fa-user-circle-o"></i> -->
                                <img src="img/logoPKM.png" alt="logo PKM" width="100" height="100">
                            </div>

                            <h4 class="text-light">Pendaftaran PKM se-Sumatera</h4>
                            <?php
                                if (@$_GET['alert'] == 1){
                            ?>
                                <div class="alert alert-success alert-solid" role="alert" style="width: max-content; margin: auto;">
                                    <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                                    <strong>Data berhasil disimpan<br>Silahkan check verifikasi email anda.</strong>
                                </div>
                            <?php
                                } else if (@$_GET['alert'] == 2){
                            ?>
                                <div class="alert alert-danger alert-solid" role="alert" style="width: max-content; margin: auto;">
                                    <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                                    <strong>Data gagal disimpan.</strong> 
                                </div>
                            <?php
                                } else if (@$_GET['alert'] == 3){
                            ?>
                                <div class="alert alert-warning alert-solid" role="alert" style="width: max-content; margin: auto; background-color: #efa405">
                                    <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                                    <span class="icon"><i class="fa fa-exclamation-triangle position-left"></i></span>
                                    <strong>email sudah terdaftar.</strong> 
                                </div>
                            <?php } ?>
                            <form action="proses_register.php" method="POST" enctype="multipart/form-data">
                                <div class="user-details">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                    <i class="fa fa-address-book-o"></i>
                                                </span>

                                            <select id="inputState" class="form-control" name="nm_ptki">
                                                <option >-- Pilih --</option>
                                            <?php  
                                                // $query = mysqli_query($koneksi,"SELECT `nm_ptki` FROM `ptkin_sumatera` WHERE `nm_ptki` NOT IN (SELECT `nm_ptki` FROM `ptki`) ORDER BY `nm_ptki` ASC");
                                                $query = mysqli_query($koneksi,"SELECT `nm_ptki` FROM `ptkin_sumatera` ORDER BY `nm_ptki` ASC");
                                                $no = 1;
                                                while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $data['nm_ptki']; ?>"><?php echo $data['nm_ptki']; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-user-md"></i>
                                                        </span>

                                                    <input type="text" name="nm_pertama" class="form-control" placeholder="Name Lengkap" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                                                <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-user-o"></i>
                                                        </span>

                                                    <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">
                                                        <i class="fa fa-file-image-o"></i>
                                                    </span>
                                                    <input type="file" name="logo_ptki" class="form-control" accept=".jpg, .jpeg, .png" id="myFile" style="display:none;">
                                                    <!-- <input type="button" class="form-control" onclick="HandleFileButtonClick();" value="Upload Logo PTKI"> -->
                                                    <label for="myFile" class="form-control" style="flex-direction: unset; justify-content: unset;">Upload logo PTKIN</label>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>                                    

                                <button type="submit" class="btn btn-primary btn-lg btn-block">Daftar</button>

                                <div class="user-links">
                                    <a href="login.php" class="pull-left">Back To Login</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <!-- /PAGE CONTENT -->
    </div>
</body>
    <script language="JavaScript" type="text/javascript">
      // function HandleFileButtonClick()
      // {
      //   document.frmUpload.myFile.click();
      //   document.frmUpload.txtFakeText.value = document.frmUpload.myFile.value;
      // }
    </script>

</html>