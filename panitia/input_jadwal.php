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
                        <div class="col-lg-12">
                            <h4 class="card-title">Pertandingan Kontingen</h4>
                            <p>
                                Penjadwalan Kontingen PTKI Cabang Lomba <?php echo $data['nm_ptki']; ?>.
                            </p>
                        </div>
                    </div>
                    <?php
                        if (@$_GET['alert'] == 1){
                    ?>
                        <div class="alert alert-success alert-solid" role="alert" style="width: max-content; margin: auto;">
                            <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                            <strong>Data berhasil disimpan.</strong>
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
                            <strong>Data Sudah Terdaftar.</strong> 
                        </div>
                    <?php
                        } else if (@$_GET['alert'] == 4){
                    ?>
                        <div class="alert alert-danger alert-solid" role="alert" style="width: max-content; margin: auto;">
                            <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                            <strong>Proses gagal diupload.</strong> 
                        </div>
                     <?php
                        } else if (@$_GET['alert'] == 5){
                    ?>
                        <div class="alert alert-warning alert-solid" role="alert" style="width: max-content; margin: auto; background-color: #efa405">
                            <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                            <span class="icon"><i class="fa fa-exclamation-triangle position-left"></i></span>
                            <strong>Type file yang anda upload tidak sesuai dengan format foto.</strong> 
                        </div>
                     <?php
                        } else if (@$_GET['alert'] == 6){
                    ?>
                        <div class="alert alert-warning alert-solid" role="alert" style="width: max-content; margin: auto; background-color: #efa405">
                            <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                            <span class="icon"><i class="fa fa-exclamation-triangle position-left"></i></span>
                            <strong>Type yang anda upload tidak sesuai dengan PDF.</strong> 
                        </div>
                     <?php
                        } else if (@$_GET['alert'] == 7){
                    ?>
                        <div class="alert alert-warning alert-solid" role="alert" style="width: max-content; margin: auto; background-color: #efa405">
                            <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                            <span class="icon"><i class="fa fa-exclamation-triangle position-left"></i></span>
                            <strong>Ukuran file melebihi batas maximum.</strong> 
                        </div>
                    <?php
                        } else if (@$_GET['alert'] == 8){
                    ?>
                        <div class="alert alert-success alert-solid" role="alert" style="width: max-content; margin: auto;">
                            <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                            <strong>Data berhasil dihapus.</strong>
                        </div>
                    <?php
                        } else if (@$_GET['alert'] == 9){
                    ?>
                        <div class="alert alert-danger alert-solid" role="alert" style="width: max-content; margin: auto;">
                            <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                            <strong>Data gagal dihapus.</strong> 
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title">Form Upload Jadwal</h4>
                                    <form method="POST" action="proses_cablom.php" class="margin-top-20">
                                        <div class="form-group">
                                            <label class="control-label">Jadwal Lomba</label>
                                            <input type="file" name="jadwal">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Perserta Lomba</label>
                                            <select id="inputState" class="form-control" name="peserta_lomba" required="required" aria-required="true">
                                                <option disabled selected hidden>-- Pilih --</option>
                                                <option value="Putra">Putra</option>
                                                <option value="Putri">Putri</option>
                                            </select>
                                        </div>                                        

                                        <div class="pull-right">
                                            <button type="reset" class="btn btn-secondary">
                                                Reset
                                                <i class="fa fa-refresh position-right"></i>
                                            </button>

                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                                <i class="fa fa-arrow-right position-right"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row">                                        
                                        <div class="col-sm-7">                                            
                                            <h5 class="text-bold card-title">Data Jadwal</h5>
                                        </div>
                                        <!--<div class="col-sm-5"><p style="font-size: 10px; margin-bottom: 0px; margin-top: 13px"><b style="color: red;">*</b>x/1 : jumlah kapasitas Lomba</p></div>-->
                                    </div>

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jadwal</th>
                                                <th>Peserta Lomba</th>
                                                <th></th>
                                                <th></th>
                                                <th>Aksi</th>                                                
                                            </tr>
                                        </thead>
                                        <?php  
                                            // $query = mysqli_query($koneksi,"SELECT cabang_lomba.`id_cablom`,cabang_lomba.`nm_lomba`,cabang_lomba.`peserta_lomba`,lomba.`putra`,lomba.`putri`,lomba.`jumlah` FROM `cabang_lomba` INNER JOIN `lomba` ON cabang_lomba.`nm_lomba` = lomba.`nm_lomba` WHERE cabang_lomba.`id_ptki` = '$data[id_ptki]'");
                                            // $no = 1;
                                            // while ($data_cablom = mysqli_fetch_array($query)) {
                                            //     $peserta = $data_cablom['peserta_lomba'];
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php //echo $no++; ?></th>
                                                <td><?php //echo $data_cablom['nm_lomba']; ?></td>
                                                <td><?php //echo $data_cablom['peserta_lomba']; ?></td>
                                                <th>
                                                </th>
                                                <th>
                                                </th>
                                                <th>
                                                    <!--<button data-id="<?php //echo "$data_cablom[id_cablom]"; ?>" type="button" class="btn btn-sm btn-outline-primary btn-rounded" data-toggle="modal" data-target="#hapus" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash-o" style="color: red"></i></button> -->
                                                    <!-- <a href="#" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash-o" style="color: red"></i></a> -->
                                                </th>
                                            </tr>
                                        </tbody>
                                        <?php 
                                            //}
                                            // Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
                                            mysqli_free_result($query);

                                            // Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
                                            mysqli_close($koneksi); 
                                        ?>
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