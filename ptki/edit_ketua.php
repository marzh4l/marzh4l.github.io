<?php 
    session_start();
    require_once("../koneksi.php");
    $username = @$_SESSION['username'];
    $email = @$_SESSION['email'];
    $query = mysqli_query($koneksi,"SELECT id_ptki,nm_ptki,nm_adm,logo_ptki FROM ptki WHERE username = '$username' OR email = '$email'");
    $data = mysqli_fetch_array($query);
    if (isset($_SESSION['username']) || isset($_SESSION['email']) ){
?>
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
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <link rel="stylesheet" href="../css/tmp/jquery.dataTables.min.css">
    <!-- /PAGE LEVEL STYLESHEETS -->
    <link rel="stylesheet" href="../css/tmp/default.css">
    <link rel="stylesheet" href="../css/tmp/default.date.css">
    
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
                    <a class="nav-link dropdown-toggle dropdown-has-after" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
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
                <a href="index.html"><i class="fa fa-pencil"></i> <span>Pendaftaran</span></a>
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

            <!-- inject:/SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="content-wrapper">
                <div class="content">
                <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title">Daftar Ketua Kontingen</h4>
                            <p>
                                Daftar ketua Kontingen PTKI <?php echo $data['nm_ptki']; ?>.
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
                    <div class="alert alert-danger alert-solid" role="alert" style="width: max-content; margin: auto;">
                        <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                        <strong>Proses gagal diupload.</strong> 
                    </div>
                <?php
                    } else if (@$_GET['alert'] == 4){
                ?>
                    <div class="alert alert-warning alert-solid" role="alert" style="width: max-content; margin: auto; background-color: #efa405">
                        <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                        <span class="icon"><i class="fa fa-exclamation-triangle position-left"></i></span>
                        <strong>Type file yang anda upload tidak sesuai dengan foto.</strong> 
                    </div>
                <?php
                    } else if (@$_GET['alert'] == 5){
                ?>
                    <div class="alert alert-danger alert-solid" role="alert" style="width: max-content; margin: auto;">
                        <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                        <strong>Ukuran file melebihi batas maximum.</strong> 
                    </div>
                <?php
                    } else if (@$_GET['alert'] == 6){
                ?>
                    <div class="alert alert-warning alert-solid" role="alert" style="width: max-content; margin: auto; background-color: #efa405">
                        <button type="button" class="close" data-dismiss="alert" style="padding-left: 10px; color: #fff;">&times;</button>
                        <span class="icon"><i class="fa fa-exclamation-triangle position-left"></i></span>
                        <strong>Data Sudah Terdaftar.</strong> 
                    </div>
                <?php } ?>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">
                        <?php if(@$_GET['id'] == $data['id_ptki']) { ?>
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title">Input Ketua Kontingen</h4>
                                    <p align="right" style="font-size:12px">Tanda <i style="color:red">*</i> : Wajib di Isi</p>
                                    <form method="POST" action="proses_edit_ketua.php" class="margin-top-20" enctype="multipart/form-data">
                                    <?php
                                        $id = @$_GET['id'];
                                        $nama = @$_GET['nama'];
                                        $nip = @$_GET['nip'];
                                        $jk = @$_GET['jk'];
                                        $tgl = @$_GET['tgl'];
                                        $jabatan = @$_GET['jabatan'];
                                        $no_hp = @$_GET['no_hp'];
                                    ?>
                                        <div class="form-group">
                                            <label class="control-label">Nama <i style="font-size:20px; color:red"> *</i></label>
                                            <!-- variable id ptki -->
                                            <input type="hidden" name="id_ptki" value="<?php echo $id; ?>" class="form-control">

                                            <input type="text" name="nm_ketua" class="form-control" value="<?php echo $nama; ?>" required="" placeholder="Ketikan Nama Lengkap">
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">NIP <i style="font-size:20px; color:red"> *</i></label>
                                                    <input type="text" name="nip" value="<?php echo $nip; ?>" class="form-control" required placeholder="Ketikan nomor NIP">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label" style="margin-right: 90px;">Jenis Kelamin <i style="font-size:20px; color:red"> *</i></label>
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio1" name="jenis_kelamin" value="Laki-laki" type="radio" class="custom-control-input" required>
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Laki-laki</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio2" name="jenis_kelamin" value="Perempuan" type="radio" class="custom-control-input" required>
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Perempuan</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Tanggal Lahir <i style="font-size:20px; color:red"> *</i></label>
                                                    <input type="text" name="tgl" value="<?php echo $tgl; ?>" class="form-control datepicker" style="background-color: #fff;" required placeholder="Masukan Tanggal Lahir">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">Foto <i style="font-size:10px; font-size:10px; color:blue"> Format : .jpg/.jpeg/.png</i></label>
                                                    <input type="file" name="foto" class="form-control" accept=".jpg, .jpeg, .png" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Jabatan <i style="font-size:20px; color:red"> *</i></label>
                                                    <input type="text" name="jabatan" value="<?php echo $jabatan; ?>" class="form-control" required placeholder="Masukan Jabatan anda">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">No /HP <i style="font-size:20px; color:red"> *</i></label>
                                                    <input type="text" name="no_hp" class="form-control" value="<?php echo $no_hp; ?>" required placeholder="Masukan Nomor Telpon atau HP">
                                                </div>
                                            </div>
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
                            
                            <?php } ?>
                        </div>

                        <div class="col-md-3"></div>
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
    <!-- <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" src="../js/pages_datatables.min.js"></script> -->
    <!-- /PAGE LEVEL SCRIPTS -->

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
  } else {
        header("location: ../login.php");
    }
?>