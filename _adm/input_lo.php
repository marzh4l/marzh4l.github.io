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
    

    <!-- PAGE LEVEL STYLESHEETS -->
    <link rel="stylesheet" href="../css/tmp/classic.css">
    <link rel="stylesheet" href="../css/tmp/classic.date.css">
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
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">
                                        <div class="row no-gutters">
                                            <div class="col-sm-9">Data Panitia LO</div>
                                            <div class="col-sm-3">
                                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#lo"  title="Input Panitia Lomba" style="color: white;"><i class="fa fa-plus position-left"></i>Tambah Data</a>
                                                <a href="cetak_lo.php" target="_blank" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Cetak Data PTKIN" style="color: white;"><i class="fa fa-print position-left"></i>Cetak</a>
                                            </div>
                                        </div>
                                    </h5>
                                    <table class="display datatable-pagination table table-stripped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>No Hp</th>
                                                <th>Jurusan</th>
                                                <th>LO Lomba</th>
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
                                        <?php  
                                            $query = mysqli_query($koneksi,"SELECT id_lo,nm_lo,nim,no_hp,jurusan,lomba_lo FROM pnt_lo");
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($query)) {
                                                $id = $data['id_lo'];
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no ++; ?></td>
                                                <td><?php echo $data['nm_lo']; ?></td>
                                                <td align="center"><?php echo $data['nim']; ?></td>
                                                <td align="center"><?php echo $data['no_hp']; ?></td>
                                                <td align="center"><?php echo $data['jurusan']; ?></td>
                                                <td><?php echo $data['lomba_lo']; ?></td>
                                                <td>
                                                    <a href="#" data-id="<?php echo "$id"; ?>" data-toggle="modal" data-target="#hapus" style="margin-left: 15%"><i class="fa fa-trash-o" style="color: red"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
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

    <!-- Modal LO -->
        <div id="lo" class="modal fade" role="dialog">
            <div class="modal-dialog" style="margin-top: 10%;">
                <div class="modal-content" style="border-radius: 5px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" style="margin-left: 10px;">&times;</button>
                        <h4 class="modal-title" style="margin-right: 30%;">Input Panitia LO</h4>
                    </div>
                    <div class="modal-body" style="padding-bottom: 10px;">
                        <form method="POST" action="proses_lo.php" class="margin-top-20"  enctype="multipart/form-data">
                            <?php 
                                //membuat kode
                                $cari_kode = mysqli_query($koneksi, "SELECT max(id_lo) FROM pnt_lo"); //membuat variable query pada koneksi table
                                $data_kode = mysqli_fetch_array($cari_kode); //membuat penampungan array data id_kontingen pada tableA
                                if ($data_kode) { //kondisi, jika pada data array id_kontingen
                                    $nilai_kode = substr($data_kode[0],3); //pengurutan baris data awal (data kiri)yaitu 1L
                                    $kode = (int) $nilai_kode; //menampilakan data int pada nilai kode
                                    $kode = $kode + 1; //menambah nilai 1 pada data CBL0+1 = CBL1
                                    $hasil_kode = "LO".str_pad($kode, 2, "0", STR_PAD_LEFT); //menampilkan data CBL, nilai 3 itu baris data 
                                                                                                //dari kanan dan 0 itu data penilaian dari 3 bari angka
                                } else { //jika kondisi tidak pemenuhi data array kembali pada hasil ketetapan atau konstanta
                                    $hasil_kode = "LO01"; 
                                }
                                // echo $hasil_kode; 
                            ?>
                            <div class="form-group">
                                 <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Nama</label>
                                        <input type="hidden" name="id_lo" value="<?php echo $hasil_kode ?>">
                                        <input type="text" name="nm_lo" class="form-control" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">NIM</label>
                                        <input type="number" name="nim" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">No Hp</label>
                                        <input type="number" name="no_hp" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" style="margin-right: 90px;">Jenis Kelamin</label>
                                        <label class="custom-control custom-radio">
                                            <input name="jenis_kelamin" type="radio" value="Laki-laki" class="custom-control-input" required>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Laki-laki</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input name="jenis_kelamin" type="radio" value="Perempuan" class="custom-control-input" required>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Perempuan</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Tanggal Lahir</label>
                                        <input type="text" name="tgl" class="form-control datepicker" style="background-color: #fff;" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Foto</label>
                                        <input type="file" name="foto" class="form-control" accept=".jpg, .jpeg, .png" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Panitia Lomba</label>
                                        <select id="inputState" class="form-control" name="lomba_lo">
                                            <option >-- Pilih --</option>                                        
                                            <?php  
                                                $query = mysqli_query($koneksi,"SELECT nm_lomba FROM lomba");
                                                $no = 1;
                                                while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $data['nm_lomba']; ?>"><?php echo $data['nm_lomba']; ?></option>
                                            <?php } ?>                                        
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Jurusan</label>
                                        <input type="text" name="jurusan" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Kirim<i class="fa fa-arrow-right position-right"></i></button>
                            </div>
                        </form>
                                
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

    <<!-- PAGE LEVEL SCRIPTS -->
    <script type="text/javascript" src="../js/pickadate/jquery.1.7.0.js"></script>
    <script type="text/javascript" src="../js/pickadate/picker.js"></script>
    <script type="text/javascript" src="../js/pickadate/picker.date.js"></script>
    <!-- <script type="text/javascript" src="../js/pickadate/legacy.js"></script> -->
    <!-- /PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">

        var $input = $( '.datepicker' ).pickadate({
            // formatSubmit: 'yyyy/mm/dd',
            // // min: [2015, 7, 14],
            // container: '#container',
            // // editable: true,
            closeOnSelect: true,
            // closeOnClear: false,
            min: [1990,7,1],
            max: [2018,7,31],
            selectYears: 27,
            selectMonths: true
        })

        var picker = $input.pickadate('picker');
    </script>

    <script>
       $(document).ready(function(){    
          $("#hapus").on('show.bs.modal', function(e){        
                var id = $(e.relatedTarget).data('id');
                        $.ajax({
                        type: 'post',
                        url: "hapus_lo.php",
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