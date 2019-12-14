<?php  
    include "../koneksi.php";
    $id = $_POST['id'];
    $query_kontingen = mysqli_query($koneksi,"SELECT nm_lomba,peserta_lomba FROM cabang_lomba WHERE `id_cablom` = '$id'");
    // $no = 1;
    while ($data_kontingen = mysqli_fetch_array($query_kontingen)) {
?>
        <div class="col-md-12">
                <h6 align="right"><?php echo $data_kontingen['nm_lomba']; ?> <span class="badge badge-default"><?php echo $data_kontingen['peserta_lomba']; ?></span></h6>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#tab3" data-toggle="tab"><i class="fa fa-id-card-o" style="margin-right: 5px;"></i>Formulir</a></li>
                <li class="nav-item"><a class="nav-link " href="#tab4" data-toggle="tab"><i class="fa fa-file-pdf-o" style="margin-right: 5px;"></i>Berkas</a></li>
            </ul>
                <p align="right" style="font-size:12px">Tanda <i style="color:red">*</i> : Wajib di Isi</p>
        </div>
            <form action="proses_official.php" method="POST" enctype="multipart/form-data">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab3" style="padding-bottom: 0px; padding-top: 0px">
                        <div class="col-md-12">
                            <fieldset class="content-group margin-top-10" style="margin-bottom: 0px !important;">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-7" >
                                            <label class="control-label">Nama <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" class="form-control" name="nm_official" placeholder="Ketikan Nama Lengkap">
                                            <input type="hidden" name="id_cablom" value="<?php echo $id ?>">
                                        </div>
                                        <div class="col-md-5" >
                                            <label class="control-label">NIP <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" class="form-control" name="nip" placeholder="Ketikan Nomor NIP">
                                        </div>
                                    </div>
                                </div>
<?php 
    } 
    //membuat kode
    $cari_kode = mysqli_query($koneksi, "SELECT max(id_official) FROM official"); //membuat variable query pada koneksi table
    $data_kode = mysqli_fetch_array($cari_kode); //membuat penampungan array data id_kontingen pada tableA
    if ($data_kode) { //kondisi, jika pada data array id_kontingen
        $nilai_kode = substr($data_kode[0],4); //pengurutan baris data awal (data kiri)yaitu 1L
        $kode = (int) $nilai_kode; //menampilakan data int pada nilai kode
        $kode = $kode + 1; //menambah nilai 1 pada data CBL0+1 = CBL1
        $hasil_kode = "OFC".str_pad($kode, 3, "0", STR_PAD_LEFT); //menampilkan data CBL, nilai 3 itu baris data 
                                                                    //dari kanan dan 0 itu data penilaian dari 3 bari angka
    } else { //jika kondisi tidak pemenuhi data array kembali pada hasil ketetapan atau konstanta
        $hasil_kode = "OFC001"; 
    }
    // echo $hasil_kode; 
?>
                                <div class="form-group">
                                    <input type="hidden" name="id_official" value="<?php echo $hasil_kode ?>">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label class="control-label">Tanggal Lahir <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" class="form-control datepicker" name="tgl" placeholder="Masukkan Tanggal Lahir" style="background-color: white;" required>
                                        </div>
                                        <div class="col-md-5" style="padding-right: 0px">
                                            <label class="control-label">No HP <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" name="no_hp" class="form-control" placeholder="Ketikan Nomor Hp" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <label class="control-label display-block">Jenis Kelamin <i style="font-size:20px; color:red"> *</i></label>
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
                                        <div class="col-md-6" >
                                            <!-- <label class="control-label">Jabatan <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" class="form-control" name="jabatan" placeholder="Ketikan Jabatan" required> -->
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab4" style="padding-bottom: 0px;">
                        <div class="col-md-10">
                            <!-- <fieldset class="content-group margin-top-10" style="margin-bottom: 0px !important;"> -->
                                <div class="row">                                    
                                    <div class="col-md-12">                                    
                                        <div class="form-group">
                                            <label class="control-label">Foto <i style="font-size:20px; color:red"> *</i><i style="font-size:10px; font-size:10px; color:blue"> Format : .jpg/.jpeg/.png, Max: 550kb</i></label>
                                            <input type="file" name="foto" class="form-control" accept=".jpg, .jpeg, .png" required>
                                        </div>
                                    </div>
                                    <div class="col-md-11">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary">Kirim<i class="fa fa-arrow-right position-right"></i></button>
                                    </div>
                                </div>
                            <!-- </fieldset> -->
                        </div>
                    </div>
                </div>
            </form>

                <!-- PAGE LEVEL SCRIPTS -->
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
            min: [1950,7,1],
            max: [2018,7,31],
            selectYears: 60,
            selectMonths: true
        })

        var picker = $input.pickadate('picker');
    </script>