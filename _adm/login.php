<!DOCTYPE HTML>
<html>

<head>
    <title>Modish - Open Source Admin Dashboard Template</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/tmp/bootstrap.css">
    <link rel="stylesheet" href="../css/tmp/core.css">
    <link rel="stylesheet" href="../css/tmp/components.css">
    <link rel="stylesheet" href="../icons/styles.min.css">

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/tether.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <!-- <script type="text/javascript" src="../js/app.min.js"></script> -->
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
                                <img src="../img/logoPKM.png" alt="logo PKM" width="100" height="100">
                            </div>
                                <h4 class="text-light">Login Administrator</h4>
                                <?php
                                    if (@$_GET['alert'] == 1){
                                ?>
                                    <div class="alert alert-danger alert-solid" role="alert" style="width: max-content; margin: auto;">
                                        <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                                        <strong>Username atau email<br>belum terdaftar.</strong> 
                                    </div>
                                <?php
                                    } else if (@$_GET['alert'] == 2){
                                ?>
                                    <div class="alert alert-warning alert-solid" role="alert" style="width: max-content; margin: auto; background-color: #efa405">
                                        <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                                        <span class="icon"><i class="fa fa-exclamation-triangle position-left"></i></span>
                                        <strong>Username atau Password<br>anda masukan salah.</strong> 
                                    </div>
                                <?php } ?>
                            <form action="proses_login.php" method="POST">
                                <div class="user-details">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                    <i class="fa fa-user-o"></i>
                                                </span>
                                            <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                    <i class="fa fa-key"></i>
                                                </span>
                                            <input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="LOGIN">
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /PAGE CONTENT -->
    </div>
</body>

</html>