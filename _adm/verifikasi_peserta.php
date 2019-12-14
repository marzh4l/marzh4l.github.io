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
    <link rel="icon" href="../img/pkm.ico">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/tmp/bootstrap.css">
    <link rel="stylesheet" href="../css/tmp/core.css">
    <link rel="stylesheet" href="../css/tmp/components.css">
    <link rel="stylesheet" href="../icons/styles.min.css">
    <script type="text/javascript" src="css_admin/style.css"></script>
    <!-- PAGE LEVEL STYLESHEETS -->
    <link rel="stylesheet" href="../css/tmp/jquery.dataTables.min.css">
    <!-- /PAGE LEVEL STYLESHEETS -->
    <!-- <link rel="stylesheet" href="css_admin/img.css"> -->

    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
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
                    <a class="nav-link dropdown-toggle dropdown-has-after" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="assets/img/default-user.jpg" alt="" class="user-img"> <?php echo $data['nm_admin']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-cog"></i> <span>Profile</span></a>
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
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title"> 
                                       <div class="row no-gutters">
                                            <div class="col-sm-8">Data Verifikasi Berkas Peserta</div>
                                            <div class="col-sm-4">
                                                <a href="peserta_diterima.php" target="_blank" class="btn btn-success btn-sm" style="text-decoration: none; color: white"><i class="fa fa-print position-left"></i>Data Terima</a>
                                                <a href="peserta_ditolak.php" target="_blank" class="btn btn-danger btn-sm" style="text-decoration: none; color: white"><i class="fa fa-print position-left"></i>Data Ditolak</a>
                                            </div>
                                        </div>
                                    </h5>
                                    <form method="POST" action="cetak_official.php" target="_Blank">
                                        <table class="display datatable-pagination table table-stripped" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>NIM</th>
                                                    <th>Cabang Lomba</th>
                                                    <th>ScreenShot</th>
                                                    <th>Laman Dikti</th>
                                                    <th>Berkas</th>
                                                    
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr> -->
                                            <?php  
                                                $query = mysqli_query($koneksi,"SELECT kontingen.`id_kontingen`,kontingen.`nm_kontingen`,kontingen.`nim`,cabang_lomba.`nm_lomba`,berkas.`ss`,berkas.`file_data` FROM kontingen JOIN cabang_lomba ON kontingen.`id_cablom` = cabang_lomba.`id_cablom`JOIN berkas ON kontingen.`id_kontingen` = berkas.`id_kontingen` WHERE kontingen.`status` = ''");
                                                $no = 1;
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    $id = $data['id_kontingen'];
                                                    // echo $id;
                                            ?>
                                                <tr>
                                                    <td align="center"><?php echo $no++; ?></td>
                                                    <td><?php echo $data['nm_kontingen']; ?></td>
                                                    <td><?php echo $data['nim']; ?></td>
                                                    <td><?php echo $data['nm_lomba']; ?></td>
                                                    <td><img src="<?php echo '../ptki/'.$data['ss']; ?>" data-id="<?php echo "$id"; ?>" data-toggle="modal" data-target="#myModal" alt="<?php echo $data['ss']; ?>" width="100" hight="100"></td>
                                                    
                                                    <td align="center"><a href="https://forlap.ristekdikti.go.id/mahasiswa" target="_blank">DIKTI</a></td>
                                                    <td align="left"><a href="<?php echo '../ptki/'.$data['file_data']; ?>" target="_blank">Berkas</a></td>
                                                    <td><a data-id="<?php echo "$id"; ?>" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#tolak"><i class="fa fa-times" data-toggle="tooltip" data-placement="left" title="Tidak Terima" style="color: white"></i></a></td>
                                                    <td style="padding-left: 0px;"><a data-id="<?php echo "$id"; ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#terima"><i class="fa fa-check" data-toggle="tooltip" data-placement="right" title="Di Terima" style="color: white"></i></a></td>
                                                </tr>
                                            <?php } ?>                                            
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-print"></i> CETAK</button>
                                        <!-- <button type="submit" class="btn btn-success"><i class="fa fa-print"></i> OFFICIAL</button> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- /PAGE CONTENT -->
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="margin-top: 10%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="data"></div>
        </div>
    </div>
    <!-- Tutup -->

     <!-- The Modal Hapus -->
    <div id="tolak" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm" style="margin-top: 10%;">
            <div class="modal-content" style="border-radius: 5px;">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" style="margin-left: 10px;">&times;</button> -->
                    <h6 class="modal-title">Apakah anda yakin data tersebut di tolak?</h6>
                </div>
                <div class="modal-footer data-hapus" style="padding-bottom: 10px;">
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal END -->

    <!-- The Modal Hapus -->
    <div id="terima" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm" style="margin-top: 10%;">
            <div class="modal-content" style="border-radius: 5px;">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" style="margin-left: 10px;">&times;</button> -->
                    <h6 class="modal-title">Apakah anda yakin data tersebut Benar?</h6>
                </div>
                <div class="modal-footer data-hapus" style="padding-bottom: 10px;">
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal END -->

    <script>
        $(document).ready(function(){    
            $("#myModal").on('show.bs.modal', function(e){        
                var id = $(e.relatedTarget).data('id');
                $.ajax({
                    type: 'post',
                    url: "detail_gambar.php",
                    data: 'id=' + id,
                    success: function(data){
                        $('.data').html(data);
                    }
                });
            });
        });
    </script>

    <script>
       $(document).ready(function(){    
          $("#tolak").on('show.bs.modal', function(e){        
                var id = $(e.relatedTarget).data('id');
                        $.ajax({
                        type: 'post',
                        url: "tolak.php",
                        data: 'id=' + id,
                        success: function(data){
                            $('.data-hapus').html(data);
                        }
                        });
                });
             });
    </script>

    <script>
       $(document).ready(function(){    
          $("#terima").on('show.bs.modal', function(e){        
                var id = $(e.relatedTarget).data('id');
                        $.ajax({
                        type: 'post',
                        url: "terima.php",
                        data: 'id=' + id,
                        success: function(data){
                            $('.data-hapus').html(data);
                        }
                        });
                });
             });
    </script>
</body>

</html>
<?php  
  } else {
        header("location: login.php");
    }
?>