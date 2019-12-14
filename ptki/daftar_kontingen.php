<?php 
    session_start();
    require_once("../koneksi.php");
    $username = @$_SESSION['username'];
    $email = @$_SESSION['email'];
    $query = mysqli_query($koneksi,"SELECT id_ptki,nm_ptki,nm_adm,logo_ptki FROM ptki WHERE username = '$username' OR email = '$email'");
    $data = mysqli_fetch_array($query);
    if (isset($_SESSION['username']) || isset($_SESSION['email']) ){
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Modish - Open Source Admin Dashboard Template</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/pkm.ico">
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

     <!-- PAGE LEVEL STYLESHEETS -->
    <link rel="stylesheet" href="../css/tmp/classic.css">
    <link rel="stylesheet" href="../css/tmp/classic.date.css">
    <!-- /PAGE LEVEL STYLESHEETS -->
    
    <script type="text/javascript" src="../js/popper.min.js"></script><!-- //Untuk dropdwon -->
    <script src="../js/jquery-1.11.1.min.js"></script>
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
                    <a class="nav-link dropdown-toggle dropdown-has-after" href="#" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="<?php echo "../".$data["logo_ptki"]; ?>" alt="" class="user-img" style="background-color: white;"><?php echo $data['nm_ptki']; ?>
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
        <ul class="navigation">
            <li class="navigation-header">
                <span>Main</span>
                <i class="icon-menu"></i>
            </li>

            <li>
                <a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>        

            <li class="navigation-header">
                <span>Lomba</span>
                <i class="icon-menu"></i>
            </li>

            <li>
                <a href="#"><i class="fa fa-pencil"></i> <span>Pendaftaran</span></a>
                <ul>
                    <li><a href="daftar_ketua.php">Ketua Kontingen</a></li>
                    <li><a href="pendaftaran.php">Kontingen</a></li>
                </ul>
            </li>

            <li class="navigation-header">
                <span>Kontingen</span>
                <i class="icon-menu"></i>
            </li>

            <li>
                <a href="#"><i class="fa fa-table"></i> <span>Data</span></a>
                <ul>
                    <li><a href="daftar_kontingen.php">Kontingen</a></li>
                    <li><a href="data_official.php">Official</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

            <!-- PAGE CONTENT -->
            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title">Daftar Kontingen</h4>
                            <p>
                                Daftar Kontingen PTKI <?php echo $data['nm_ptki']; ?>.
                            </p>
                        </div>
                    </div>
                        <?php
                            if (@$_GET['alert'] == 1){
                        ?>
                            <div class="alert alert-success alert-solid" role="alert" style="width: max-content; margin: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                                <strong>Data berhasil dihapus.</strong>
                            </div>
                        <?php
                            } else if (@$_GET['alert'] == 2){
                        ?>
                            <div class="alert alert-danger alert-solid" role="alert" style="width: max-content; margin: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                                <strong>Data gagal dihapus.</strong> 
                            </div>
                        <?php
                            } else if (@$_GET['alert'] == 3){
                        ?>
                            <div class="alert alert-success alert-solid" role="alert" style="width: max-content; margin: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                                <strong>Data berhasil disimpan.</strong>
                            </div>
                        <?php
                            } else if (@$_GET['alert'] == 4){
                        ?>
                            <div class="alert alert-danger alert-solid" role="alert" style="width: max-content; margin: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                                <strong>Data gagal disimpan.</strong> 
                            </div>
                        <?php
                            } else if (@$_GET['alert'] == 5){
                        ?>
                            <div class="alert alert-danger alert-solid" role="alert" style="width: max-content; margin: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                                <strong>Proses gagal diupload.</strong> 
                            </div>
                        <?php
                            } else if (@$_GET['alert'] == 6){
                        ?>
                            <div class="alert alert-warning alert-solid" role="alert" style="width: max-content; margin: auto; background-color: #efa405">
                                <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                                <span class="icon"><i class="fa fa-exclamation-triangle position-left"></i></span>
                                <strong>Type file yang anda upload tidak sesuai dengan foto.</strong> 
                            </div>
                        <?php
                            } else if (@$_GET['alert'] == 7){
                        ?>
                            <div class="alert alert-danger alert-solid" role="alert" style="width: max-content; margin: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                                <strong>Ukuran file melebihi batas maximum.</strong> 
                            </div>
                        <?php } ?>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <!-- <h6 class="card-title text-bold">Alternative Pagging</h6> -->
                                    <!-- <p class="content-group">
                                        The default page control presented by DataTables (forward and backward buttons with up to 7 page numbers in-between) is fine
                                        for most situations, but there are cases where you may wish to customise the options
                                        presented to the end user. This is done through DataTables' extensible pagination
                                        mechanism, the
                                        <a href="//datatables.net/reference/option/pagingType"><code class="option" title="DataTables initialisation option">pagingType</code></a>                                        option.
                                    </p> -->
                                    <form method="POST" action="cetak_kontingen.php" target="_Blank">
                                        <input type="hidden" name="id_ptki" value="<?php echo $data["id_ptki"]; ?>">
                                        <input type="hidden" name="nm_ptki" value="<?php echo $data["nm_ptki"]; ?>">
                                        <table class="display datatable-pagination table table-stripped" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Cabang Perlombaan</th>
                                                    <th>Peserta</th>
                                                    <th>Status</th>
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
                                                $query = mysqli_query($koneksi,"SELECT kontingen.`id_kontingen`,kontingen.`nm_kontingen`,cabang_lomba.`nm_lomba`,cabang_lomba.`peserta_lomba`,kontingen.`status` FROM kontingen JOIN cabang_lomba ON kontingen.`id_cablom` = cabang_lomba.`id_cablom` WHERE `id_ptki` = '$data[id_ptki]'");
                                                $no = 1;
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    $id = $data['id_kontingen'];
                                                    // echo $id;
                                            ?>
                                                <tr>
                                                    <td align="center"><?php echo $no++; ?></td>
                                                    <td><?php echo $data['nm_kontingen']; ?></td>
                                                    <td><?php echo $data['nm_lomba']; ?></td>
                                                    <td><?php echo $data['peserta_lomba']; ?></td>
                                                    <td>
                                                        <?php if($data['status'] == 'TRUE'){  ?>
                                                            <p style="color: green">DATA DITERIMA</p>
                                                        <?php } else if($data['status'] == 'FALSE'){ ?>
                                                            <p style="color: red">DATA TIDAK DITERIMA <br>
                                                            <i style="color: blue; ">( Data DIKTI Tidak Sesuai ) </i></p>
                                                        <?php } else { ?>
                                                            <p style="color: blue">Sedang di proses</p>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a data-id="<?php echo "$id"; ?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit" data-toggle="tooltip" data-placement="left" title="Edit" style="color: blue"></i></a>
                                                        <a data-id="<?php echo "$id"; ?>" data-toggle="modal" data-target="#hapus" style="margin-left: 20%;"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="right" title="Hapus" style="color: red"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>                                            
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-print"></i> CETAK</button>
                                        <!-- <button type="submit" class="btn btn-success"><i class="fa fa-print"></i> OFFICIAL</button> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /PAGE CONTENT -->

        <!-- The Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog" style="margin-top: 10%;">
                    <div class="modal-content" style="border-radius: 5px;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" style="margin-left: 10px;">&times;</button>
                            <h4 class="modal-title" style="margin-right: 30%;">Detail Peserta</h4>
                        </div>
                        <div class="modal-body" style="padding-bottom: 10px;">
                            <div class="row fetch-data">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- The Modal END -->

     <!-- The Modal Hapus -->
            <div id="hapus" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm" style="margin-top: 10%;">
                    <div class="modal-content" style="border-radius: 5px;">
                        <div class="modal-header">
                            <!-- <button type="button" class="close" data-dismiss="modal" style="margin-left: 10px;">&times;</button> -->
                            <h6 class="modal-title">Apakah anda yakin ingin menghapus data?</h6>
                        </div>
                        <div class="modal-footer data-hapus" style="padding-bottom: 10px;">
                        </div>
                    </div>
                </div>
            </div>
    <!-- The Modal END -->
        </div>


    <script>
       $(document).ready(function(){    
          $("#myModal").on('show.bs.modal', function(e){        
                var id = $(e.relatedTarget).data('id');
                        $.ajax({
                        type: 'post',
                        url: "detail_kontingen.php",
                        data: 'id=' + id,
                        success: function(data){
                            $('.fetch-data').html(data);
                        }
                        });
                });
             });
    </script>

    <script>
       $(document).ready(function(){    
          $("#hapus").on('show.bs.modal', function(e){        
                var id = $(e.relatedTarget).data('id');
                        $.ajax({
                        type: 'post',
                        url: "hapus1.php",
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
        $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
</body>

</html>
<?php  
  } else {
        header("location: ../login.php");
    }
?>