<!DOCTYPE HTML>
<html>

<head>
    <title>PKM - Pekan Kreatifitas Mahasiswa</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/tmp/bootstrap.css">
    <link rel="stylesheet" href="../css/tmp/core.css">
    <link rel="stylesheet" href="../css/tmp/components.css">
    <link rel="stylesheet" href="../icons/styles.min.css">
    <script type="text/javascript" src="css_admin/style.css"></script>

    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/tether.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="../js/app.min.js"></script>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-toggleable-md">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav">
            <span>
                <i class="fa fa-code-fork"></i>
            </span>
        </button>

        <button class="navbar-toggler navbar-toggler-left" type="button" id="toggle-sidebar">
            <span>
               <i class="fa fa-align-justify"></i>
            </span>
        </button>

        <a class="navbar-brand logo" href="#">
            <h4 class="logos" style="color: white; margin-top: 7px;">SISTEM PKM 2018</h4>
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <button class="sidebar-toggle btn btn-flat" id="toggle-sidebar-desktop">
                <span>
                    <i class="fa fa-align-justify"></i>
                </span>
            </button>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-has-after" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="assets/img/default-user.jpg" alt="" class="user-img"> Nama_Admin
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-cog"></i> <span>Profile</span></a>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-sign-out"></i> <span>Logout</span></a>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /NAVBAR -->

    <div class="page-container">
        <div class="page-content">
            <!-- inject:SIDEBAR -->

            <div id="sidebar-main" class="sidebar sidebar-default">
    <div class="sidebar-content">
        <ul class="navigation">
            <li class="navigation-header">
                <span>Main</span>
                <i class="icon-menu"></i>
            </li>

            <li>
                <a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>

            <li class="navigation-header">
                <span>Forms</span>
                <i class="icon-menu"></i>
            </li>

            <li>
                <a href="index.html"><i class="fa fa-pencil"></i> <span>Form</span></a>
                <ul>
                    <li><a href="input_ptkin.php">Input PTKIN</a></li>
                    <li><a href="input_perlombaan.php">Input Perlombaan</a></li>
                    <li><a href="input_panitia.php">Input Panitia</a></li>
                    <li><a href="input_admin.php">Input Administrator</a></li>
                </ul>
            </li>

            <li class="navigation-header">
                <span>Master</span>
                <i class="icon-menu"></i>
            </li>

            <li>
                <a href="index.html"><i class="fa fa-file-o"></i> <span>Data</span></a>
                <ul>
                    <li><a href="#">Daftar Register PTKIN</a></li>
                    <li><a href="#">Daftar Ketua Kontingen</a></li>
                    <li><a href="#">Daftar Perserta</a></li>
                    <li><a href="#">Daftar Official</a></li>
                    <li><a href="#">Daftar berita</a></li>
                </ul>
            </li>

            <li class="navigation-header">
                <span>Verifikasi</span>
                <i class="icon-menu"></i>
            </li>

            <li>
                <a href="index.html"><i class="fa fa-window-restore"></i> <span>Passsword & Peserta</span></a>
                <ul>
                    <li><a href="verifikasi_password.php">Password PTKIN</a></li>
                    <li><a href="verifikasi_peserta.php">Peserta Kontingen</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

            <!-- inject:/SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">Data Verifikasi PTKIN</h5>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>PTKIN</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>UIN Raden Fatah Palembang</td>
                                                <td><input type="submit" name="" value="KIRIM" class="btn btn-success"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>UIN Raden Intan Lampung</td>
                                                <td><input type="submit" name="" value="KIRIM" class="btn btn-success"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- /PAGE CONTENT -->
        </div>
    </div>
</body>

</html>