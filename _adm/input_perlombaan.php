<?php 
    session_start();
    require_once("../koneksi.php");
    $username = @$_SESSION['username'];
    $query = mysqli_query($koneksi,"SELECT nm_admin FROM admin WHERE username = '$username'");
    $data = mysqli_fetch_array($query);
    if (isset($_SESSION['username'])){
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
    <link rel="stylesheet" href="../css/tmp/bootstrap.css">
    <link rel="stylesheet" href="../css/tmp/core.css">
    <link rel="stylesheet" href="../css/tmp/components.css">
    <link rel="stylesheet" href="../icons/styles.min.css">
    <!-- <script type="text/javascript" src="css_admin/style.css"></script> -->
    
    <!-- PAGE LEVEL STYLESHEETS -->
    <link rel="stylesheet" href="../css/tmp/jquery.dataTables.min.css">
    <!-- /PAGE LEVEL STYLESHEETS -->

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script><!-- //Untuk dropdwon -->
    <script type="text/javascript" src="../js/tether.min.js"></script>
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
                    <a class="nav-link dropdown-toggle dropdown-has-after" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="assets/img/default-user.jpg" alt="" class="user-img"><?php echo $data['nm_admin']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-user"></i> <span>Profile</span></a>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-comment"></i> <span>Messages</span></a>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-cog"></i> <span>Settings</span></a>
                        </a>
                        <a class="dropdown-item" href="logout.php">
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

            <!-- inject:/SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="content-wrapper">
                <div class="content">
                <?php
                    if (@$_GET['error'] == 1){
                ?>
                    <div class="alert alert-success alert-solid" role="alert" style="width: max-content; margin: auto;">
                        <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                        <strong>Data berhasil disimpan.</strong>
                    </div>
                <?php
                    } else if (@$_GET['error'] == 2){
                ?>
                    <div class="alert alert-danger alert-solid" role="alert" style="width: max-content; margin: auto;">
                        <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                        <strong>Data gagal disimpan.</strong> 
                    </div>
                <?php } ?>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">
                                        <div class="row no-gutters">
                                            <div class="col-sm-9">Data Perlombaan</div>
                                            <div class="col-sm-3">
                                                <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal1" data-toggle="tooltip" title="PTKIN"><i class="fa fa-plus position-left"></i>Tambah Data</button>
                                                <button type="submit" class="btn btn-warning btn-sm" style=";" data-toggle="tooltip" title="Cetak Data PTKIN"><i class="fa fa-print position-left"></i>Cetak</button>
                                            </div>
                                        </div>
                                    </h5>
                                    <table class="display datatable-pagination table table-stripped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Cabang Lomba</th>
                                                <th>kapasitas putra</th>
                                                <th>kapasitas putri</th>
                                                <th>Jumlah Kontingen</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <th>No</th>
                                            <th>Cabang Lomba</th>
                                            <th>kapasitas putra</th>
                                            <th>kapasitas putri</th>
                                            <th>Jumlah Kontingen</th>
                                            <th>Opsi</th>
                                        </tfoot> -->
                                        <tbody>
                                        <?php  
                                            $query = mysqli_query($koneksi,"SELECT id_lomba,nm_lomba,putra,putri,jumlah FROM lomba");
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ++; ?></td>
                                                <td><?php echo $data['nm_lomba']; ?></td>
                                                <td align="center"><?php echo $data['putra']; ?></td>
                                                <td align="center"><?php echo $data['putri']; ?></td>
                                                <td align="center">
                                                    <?php echo $data['jumlah']; ?>                                                   
                                                </td>
                                                <td>
                                                    <a href="#"><i class="fa fa-edit"></i></a>
                                                    <a href="#" style="margin-left: 15%"><i class="fa fa-trash-o" style="color: red"></i></a>
                                                </td>
                                            </tr>
                                        <?php 
                                            } 
                                            // Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
                                            mysqli_free_result($query);

                                            // Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
                                            mysqli_close($koneksi);
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- /PAGE CONTENT -->
        </div>
    </div>   
    

    <!-- Modal2 -->
    <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm" style="margin-top: 10%;">
            <div class="modal-content" style="border-radius: 5px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="margin-left: 10px;">&times;</button>
                    <h5 class="modal-title" style="margin-right: 20px;">Tambah data Perlombaan</h5>
                </div>
                <div class="modal-body" style="padding-bottom: 10px;">
                     <form method="POST" action="proses_input_lomba.php" class="margin-top-20">
                        <div class="form-group">
                            <label class="control-label">Nama Lomba</label>
                            <input type="text" name="nm_lomba" class="form-control" placeholder="Masukan Nama Cabang Lomba" required="">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Putra</label>
                                    <input type="number" name="putra" class="form-control" placeholder="Input angka" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Putri</label>
                                    <input type="number" name="putri" class="form-control" placeholder="Input angka" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Jumlah Peserta</label>
                            <input type="number" name="jumlah" class="form-control" placeholder="total Peserta" required>
                        </div>

                        <div class="pull-right">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim<i class="fa fa-arrow-right position-right"></i></button>
                    </form>                   
                </div>                
            </div>
        </div>
    </div>
    <!-- The Modal END -->
</body>

</html>
<?php  
  } else {
        header("location: login.php");
    }
?>