<?php 
    //session_start();
    //require_once("../koneksi.php");
    //$username = @$_SESSION['username'];
    //$email = @$_SESSION['email'];
    //$query = mysqli_query($koneksi,"SELECT id_ptki,nm_ptki,nm_adm,logo_ptki FROM ptki WHERE username = '$username' OR email = '$email'");
    //$data = mysqli_fetch_array($query);
    //if (isset($_SESSION['username']) || isset($_SESSION['email']) ){
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>PKM - Pekan Kreatifitas Mahasiswa</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

    <!-- PAGE LEVEL STYLESHEETS -->
    <link rel="stylesheet" href="../css/tmp/jquery.dataTables.min.css">
    <!-- /PAGE LEVEL STYLESHEETS -->

    <!-- DEFAULT STYLESHEETS -->
    <link rel="stylesheet" href="../css/tmp/bootstrap.css">
    <link rel="stylesheet" href="../css/tmp/core.css">
    <link rel="stylesheet" href="../css/tmp/components.css">
    <link rel="stylesheet" href="../icons/styles.min.css">
    <!-- /DEFAULT STYLESHEETS -->
    
    <!-- <script src="../js/jquery-1.11.1.min.js"></script> -->
    <!-- //Untuk dropdwon -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- <script type="text/javascript" src="../js/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" src="../js/tether.min.js"></script> -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/app.min.js"></script>

    <!-- PAGE LEVEL SCRIPTS -->
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/pages_datatables.min.js"></script>
    <!-- /PAGE LEVEL SCRIPTS -->
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

            <h4 class="logos" style="color: white;">
                <img src="../img/logoPKM.png" alt="logo PKM" width="45" height="45">  PKM 2018
            </h4>
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <button class="sidebar-toggle btn btn-flat" id="toggle-sidebar-desktop">
                <span>
                    <i class="fa fa-align-justify"></i>
                </span>
            </button>
            <ul class="navbar-nav ml-auto">                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-has-after" href="#" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="<?php //echo "../".$data["logo_ptki"]; ?>" alt="" class="user-img" style="background-color: white;">Panitia<?php //echo $data['nm_ptki']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="profile.php">
                            <i class="fa fa-user"></i> <span>Profile</span></a>
                        </a>
                        <a class="dropdown-item" href="../logout.php">
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
                    <?php include_once 'menu.php'; ?>
                </div>
            </div>

            <!-- PAGE CONTENT -->
            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title">Selamat Datang di Halaman Dashboard Anda</h4>
<!--                                     <p>
                                        Tahapan-tahapan pendaftaran :
                                        <ul>
                                            <li>Daftar Ketua Kontingen</li>
                                            <li>Daftar Cabang Lomba Pertandingan</li>
                                            <li>Daftara perserta kontingen dari masing-masing cabang lomba</li>
                                            <li>Daftar Official Dari masing-masing cabang perlombaan tersebut</li>
                                        </ul>
                                    </p> -->
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
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/tether.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="../js/app.min.js"></script>

    <!-- PAGE LEVEL SCRIPTS -->
    <script type="text/javascript" src="../js/pickadate/jquery.1.7.0.js"></script>
    <script type="text/javascript" src="../js/pickadate/picker.js"></script>
    <script type="text/javascript" src="../js/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="../js/pickadate/legacy.js"></script>
    <!-- /PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">

        var $input = $( '.datepicker' ).pickadate({
            // formatSubmit: 'yyyy/mm/dd',
            // // min: [2015, 7, 14],
            // container: '#container',
            // // editable: true,
            closeOnSelect: true,
            // closeOnClear: false,
            min: [1993,7,1],
            max: [2018,7,31],
            selectYears: 26,
            selectMonths: true
        })

        var picker = $input.pickadate('picker')
        // picker.set('select', '14 October, 2014')
        // picker.open()

        // $('button').on('click', function() {
        //     picker.set('disable', true);
        // });

    </script>
</body>

</html>
<?php  
  //} else {
        //header("location: ../login.php");
    //}
?>