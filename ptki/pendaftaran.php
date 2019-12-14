<?php 
    session_start();
    require_once("../koneksi.php");
    $username = @$_SESSION['username'];
    $email = @$_SESSION['email'];
    $query = mysqli_query($koneksi,"SELECT id_ptki,nm_ptki,nm_adm,logo_ptki FROM ptki WHERE username = '$username' OR email = '$email'");
    $data = mysqli_fetch_array($query);
    $id_ptki = $data['id_ptki'];
    $query_ketua =mysqli_query($koneksi,"SELECT `id_ptki` FROM `ketua_kon` WHERE `id_ptki` = '$id_ptki'");
    // $data_ketua = mysql_fetch_array($query_ketua);
    if (isset($_SESSION['username']) || isset($_SESSION['email']) ){
        if(mysqli_num_rows($query_ketua) > 0){         
?>
<!DOCTYPE html>
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
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/tmp/core.css">
    <link rel="stylesheet" href="../css/tmp/components.css">
    <link rel="stylesheet" href="../icons/styles.min.css">
    <!-- <link rel="stylesheet" href="../css/tmp/default.css">
    <link rel="stylesheet" href="../css/tmp/default.date.css"> -->
    <!-- <link rel="stylesheet" href="../css/tmp/style.css"> -->
    <!-- PAGE LEVEL STYLESHEETS -->
    <link rel="stylesheet" href="../css/tmp/classic.css">
    <link rel="stylesheet" href="../css/tmp/classic.date.css">
    <!-- /PAGE LEVEL STYLESHEETS -->

    <!-- Javascript -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    
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

            <!-- PAGE CONTENT -->
            <div class="content-wrapper">
                <div class="content">
                <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title">Pendaftaran Kontingen</h4>
                            <p>
                                Pendaftaran Kontingen PTKI <?php echo $data['nm_ptki']; ?>.
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
                                    <h4 class="card-title">Form Input Perlombaan</h4>
                                    <form method="POST" action="proses_cablom.php" class="margin-top-20">
                                        <div class="form-group">
                                            <label class="control-label">Cabang Lomba</label>
                                            <select id="inputState" name="nm_lomba" class="form-control" required="required" aria-required="true">
                                                <option disabled selected hidden>-- Pilih --</option>
                                            <?php  
                                                $query = mysqli_query($koneksi,"SELECT nm_lomba FROM lomba");
                                                $no = 1;
                                                while ($data_lomba = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $data_lomba['nm_lomba']; ?>"><?php echo $data_lomba['nm_lomba']; ?></option>
                                            <?php 
                                                }
                                                //membuat kode
                                                $cari_kode = mysqli_query($koneksi, "SELECT max(id_cablom) FROM cabang_lomba"); //membuat variable query pada koneksi table
                                                $data_kode = mysqli_fetch_array($cari_kode); //membuat penampungan array data id_cablom pada tableA
                                                if ($data_kode) { //kondisi, jika pada data array id_cablom
                                                    $nilai_kode = substr($data_kode[0],3); //pengurutan baris data awal (data kiri)yaitu 1L
                                                    $kode = (int) $nilai_kode; //menampilakan data int pada nilai kode
                                                    $kode = $kode + 1; //menambah nilai 1 pada data CBL0+1 = CBL1
                                                    $hasil_kode = "CBL".str_pad($kode, 3, "0", STR_PAD_LEFT); //menampilkan data CBL, nilai 3 itu baris data 
                                                                                                                //dari kanan dan 0 itu data penilaian dari 3 bari angka
                                                } else { //jika kondisi tidak pemenuhi data array kembali pada hasil ketetapan atau konstanta
                                                    $hasil_kode = "CBL001"; 
                                                }
                                            ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="id_ptki" class="form-control" value="<?php echo $data["id_ptki"]; ?>">
                                            <input type="hidden" name="id_cablom" class="form-control" value="<?php echo $hasil_kode; ?>">
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
                                            <h5 class="text-bold card-title">Data lomba</h5>
                                        </div>
                                        <div class="col-sm-5"><p style="font-size: 10px; margin-bottom: 0px; margin-top: 13px"><b style="color: red;">*</b>x/1 : jumlah kapasitas Lomba</p></div>
                                    </div>

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Cabang Lomba</th>
                                                <th>Peserta Lomba</th>
                                                <th>Daftar Kontingen</th>
                                                <th>Daftar Official</th>
                                                <th>Aksi</th>                                                
                                            </tr>
                                        </thead>
                                        <?php  
                                            $query = mysqli_query($koneksi,"SELECT cabang_lomba.`id_cablom`,cabang_lomba.`nm_lomba`,cabang_lomba.`peserta_lomba`,lomba.`putra`,lomba.`putri`,lomba.`jumlah` FROM `cabang_lomba` INNER JOIN `lomba` ON cabang_lomba.`nm_lomba` = lomba.`nm_lomba` WHERE cabang_lomba.`id_ptki` = '$data[id_ptki]'");
                                            $no = 1;
                                            while ($data_cablom = mysqli_fetch_array($query)) {
                                                $peserta = $data_cablom['peserta_lomba'];
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo $no++; ?></th>
                                                <td><?php echo $data_cablom['nm_lomba']; ?></td>
                                                <td><?php echo $data_cablom['peserta_lomba']; ?></td>
                                                <th>
                                                <?php  
                                                    $query2 = mysqli_query($koneksi,"SELECT count(kontingen.nm_kontingen) as Jumlah_kontingen FROM `kontingen` WHERE id_cablom = '$data_cablom[id_cablom]'");
                                                    $data2 = mysqli_fetch_array($query2);
                                                    $Jumlah_kontingen = $data2['Jumlah_kontingen'];
                                                    echo $Jumlah_kontingen;
                                                    echo '/';
                                                    if($data_cablom['nm_lomba'] == 'FUTSAL' ){
                                                        $pesan = true;
                                                        $hasil = $data_cablom['putra'];
                                                        echo $hasil;                                                        
                                                    } else if($data_cablom['nm_lomba'] == 'MUSABAQAH SYARHIL QURAN' || $data_cablom['nm_lomba'] == 'PUITISASI AL_QURAN' || $data_cablom['nm_lomba'] == 'DEBAT BAHASA ARAB' || $data_cablom['nm_lomba'] == 'DEBAT BAHASA INGGRIS'){
                                                        $pesan = true;
                                                        $hasil = $data_cablom['jumlah'];
                                                        echo $hasil;                                                        
                                                    } else if($data_cablom['nm_lomba'] == 'CATUR KLASIK BEREGU' || $data_cablom['nm_lomba'] == 'CATUR SPEED BEREGU' || $data_cablom['nm_lomba'] == 'CATUR KILAT BEREGU' || $data_cablom['nm_lomba'] == 'TAKRAW DOUBLE' || $data_cablom['nm_lomba'] == 'TAKRAW BEREGU'){
                                                        $pesan = true;
                                                        $hasil = $data_cablom['jumlah'];
                                                        echo $hasil;                                                        
                                                    } else if($data_cablom['putra']){
                                                        $pesan = true;
                                                        $hasil = $data_cablom['jumlah'] - $data_cablom['putra'];
                                                        echo $hasil;                                                        
                                                    } else {
                                                        $pesan = true;
                                                        $hasil = $data_cablom['jumlah'] - $data_cablom['putri'];
                                                        echo $hasil;                                                     
                                                    }

                                                    if($pesan == true && $Jumlah_kontingen == $hasil){
                                                 ?>
                                                    <button data-id="<?php echo "$data_cablom[id_cablom]"; ?>" type="button" class="btn btn-sm btn-outline-primary btn-rounded" data-toggle="modal" data-target="#myModal1" data-toggle="tooltip" title="Tambah data Kontingen" disabled><i class="fa fa-plus"></i></button>
                                                <?php } else { ?>
                                                    <button data-id="<?php echo "$data_cablom[id_cablom]"; ?>" type="button" class="btn btn-sm btn-outline-primary btn-rounded" data-toggle="modal" data-target="#myModal1" data-toggle="tooltip" title="Tambah data Kontingen"><i class="fa fa-plus"></i></button>
                                                <?php } ?>
                                                </th>
                                                <th>
                                                    <?php  
                                                    $query3 = mysqli_query($koneksi,"SELECT count(official.nm_official) as Jumlah_official FROM `official` WHERE id_cablom = '$data_cablom[id_cablom]'");
                                                    $data3 = mysqli_fetch_array($query3);
                                                    $Jumlah_official = $data3['Jumlah_official'];
                                                    echo $Jumlah_official;
                                                    echo '/';
                                                    $official = 1;
                                                    echo $official;
                                                    if($Jumlah_official == $official){
                                                ?>
                                                    <button data-id="<?php echo "$data_cablom[id_cablom]"; ?>" type="button" class="btn btn-sm btn-outline-primary btn-rounded" data-toggle="modal" data-target="#myModal2" data-toggle="tooltip" title="Tambah data Oficial" disabled><i class="fa fa-plus"></i></button>
                                                <?php } else { ?>                                                
                                                    <button data-id="<?php echo "$data_cablom[id_cablom]"; ?>" type="button" class="btn btn-sm btn-outline-primary btn-rounded" data-toggle="modal" data-target="#myModal2" data-toggle="tooltip" title="Tambah data Oficial"><i class="fa fa-plus"></i></button>
                                                <?php } ?>
                                                </th>
                                                <th>
                                                    <button data-id="<?php echo "$data_cablom[id_cablom]"; ?>" type="button" class="btn btn-sm btn-outline-primary btn-rounded" data-toggle="modal" data-target="#hapus" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash-o" style="color: red"></i></button>
                                                    <!-- <a href="#" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash-o" style="color: red"></i></a> -->
                                                </th>
                                            </tr>
                                        </tbody>
                                        <?php 
                                            }
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

    <!-- The Modal -->
    <!-- Modal1 -->
    <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog" style="margin-top: 10%;">
            <div class="modal-content" style="border-radius: 5px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="margin-left: 10px;">&times;</button>
                    <h4 class="modal-title" style="margin-right: 80px;">Daftar Anggota Kontingen</h4>
                </div>
                <div class="modal-body" style="padding-bottom: 10px;">
                    <div class="row fetch-data1">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal2 -->
    <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog" style="margin-top: 10%;">
            <div class="modal-content" style="border-radius: 5px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="margin-left: 10px;">&times;</button>
                    <h4 class="modal-title" style="margin-right: 80px;">Daftar Official Kontingen</h4>
                </div>
                <div class="modal-body" style="padding-bottom: 10px;">
                    <div class="row fetch-data2">
                        
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

    <script src="../js/wizard/jquery-latest.js"></script>
    <script src="../js/wizard/jquery.bootstrap.wizard.js"></script>
    <script src="../js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/tether.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>    
    <script type="text/javascript" src="../js/app.min.js"></script>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <script>
       $(document).ready(function(){    
          $("#myModal1").on('show.bs.modal', function(e){        
                var id = $(e.relatedTarget).data('id');
                        $.ajax({
                        type: 'post',
                        url: "form_daftar.php",
                        data: 'id=' + id,
                        success: function(data){
                            $('.fetch-data1').html(data);
                        }
                        });
                });
             });

       $(document).ready(function(){    
          $("#myModal2").on('show.bs.modal', function(e){        
                var id = $(e.relatedTarget).data('id');
                        $.ajax({
                        type: 'post',
                        url: "daftar_official.php",
                        data: 'id=' + id,
                        success: function(data){
                            $('.fetch-data2').html(data);
                        }
                        });
                });
             });

       $(document).ready(function(){    
          $("#hapus").on('show.bs.modal', function(e){        
                var id = $(e.relatedTarget).data('id');
                        $.ajax({
                        type: 'post',
                        url: "hapus2.php",
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
            ?><script> alert("Maaf! Anda harus Input Ketua Kontingen terlebih dahulu"); window.location.href = "daftar_ketua.php";</script><?php
        }      
    } else {
        header("location: ../login.php");
    }
?>