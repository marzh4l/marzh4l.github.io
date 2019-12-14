<?php  
    include "../koneksi.php";
    $id = $_POST['id'];
    $query_kontingen1 = mysqli_query($koneksi,"SELECT nm_lomba,peserta_lomba FROM cabang_lomba WHERE `id_cablom` = '$id'");
    // $no = 1;
    while ($data_kontingen = mysqli_fetch_array($query_kontingen1)) {
?>
        <div class="col-md-12">
                <h6 align="right"><?php echo $data_kontingen['nm_lomba']; ?> <span class="badge badge-default"><?php echo $data_kontingen['peserta_lomba']; ?></span></h6>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab"><i class="fa fa-id-card-o" style="margin-right: 5px;"></i>Formulir</a></li>
                <li class="nav-item"><a class="nav-link " href="#tab2" data-toggle="tab"><i class="fa fa-file-pdf-o" style="margin-right: 5px;"></i>Berkas</a></li>
            </ul>
                <p align="right" style="font-size:12px">Tanda <i style="color:red">*</i> : Wajib di Isi</p>
        </div>
            <form action="proses_kontingen.php" method="POST" enctype="multipart/form-data">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1" style="padding-bottom: 0px; padding-top: 0px;">
                        <div class="col-md-12">
                            <fieldset class="content-group margin-top-10" style="margin-bottom: 0px !important;">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-7" >
                                            <label class="control-label">Nama <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" class="form-control" name="nm_kontingen" placeholder="Ketikan Nama Lengkap">
                                            <input type="hidden" name="id_cablom" value="<?php echo $id ?>">
                                            <input type="hidden" name="nm_lomba" value="<?php echo $data_kontingen['nm_lomba'] ?>">
                                        </div>
                                        <div class="col-md-5" >
                                            <label class="control-label">NIM <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" class="form-control" name="nim" placeholder="Ketikan Nomor NIP">
                                        </div>
                                    </div>
                                </div>
<?php 
    } 
    //membuat kode
    $cari_kode = mysqli_query($koneksi, "SELECT max(id_kontingen) FROM kontingen"); //membuat variable query pada koneksi table
    $data_kode = mysqli_fetch_array($cari_kode); //membuat penampungan array data id_kontingen pada tableA
    if ($data_kode) { //kondisi, jika pada data array id_kontingen
        $nilai_kode = substr($data_kode[0],4); //pengurutan baris data awal (data kiri)yaitu 1L
        $kode = (int) $nilai_kode; //menampilakan data int pada nilai kode
        $kode = $kode + 1; //menambah nilai 1 pada data CBL0+1 = CBL1
        $hasil_kode = "2018".str_pad($kode, 3, "0", STR_PAD_LEFT); //menampilkan data CBL, nilai 3 itu baris data 
                                                                    //dari kanan dan 0 itu data penilaian dari 3 bari angka
    } else { //jika kondisi tidak pemenuhi data array kembali pada hasil ketetapan atau konstanta
        $hasil_kode = "2018001"; 
    }
    // echo $hasil_kode; 
?>
                                <div class="form-group">
                                    <input type="hidden" name="id_kontingen" value="<?php echo $hasil_kode ?>">
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
                                            <label class="control-label">Program Studi <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" class="form-control" name="jurusan" placeholder="Ketikan Program Studi" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" style="padding-bottom: 0px;">
                        <div class="col-md-12">
                            <fieldset class="content-group margin-top-10" style="margin-bottom: 0px !important;">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" style="padding-right: 0px">
                                            <label class="control-label">Foto <i style="font-size:20px; color:red"> *</i> <i style="font-size:10px; font-size:10px; color:blue"> Format : .jpg/.jpeg/.png, Max : 550kb</i></label>
                                            <input type="file" name="foto" class="form-control" accept=".jpg, .jpeg, .png" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">ScreenShot data DIKTI <i style="font-size:20px; color:red"> *</i><br><i style="font-size:10px; font-size:10px; color:blue"> Format : .jpg, Max : 550kb</i></label>
                                            <input type="file" name="ss" class="form-control" accept=".jpg, .jpeg, .png" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" style="padding-right: 0px">
                                            <label class="control-label">File Data <i style="font-size:20px; color:red"> *</i><p style="font-size:10px">(KTM/SURAT Keterangaan Sebagai Mahasiswa) <i style="font-size:10px; color:blue"> Format : .pdf, Max : 550kb</i></p></label>
                                            <input type="file" name="file_pdf" class="form-control" accept=".pdf" required>
                                        </div>
                                        <div class="col-md-6">
                                            <!--<label class="control-label">Fotocopy KTP</label>-->
                                            <!--<input type="file" name="ktp" class="form-control" accept=".pdf" required>-->
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="form-group">-->
                                <!--    <div class="row">-->
                                <!--        <div class="col-md-6" style="padding-right: 0px">-->
                                <!--            <label class="control-label">Fotocopy Ijazah SMA</label>-->
                                <!--            <input type="file" name="ijazah" class="form-control" accept=".pdf" required>-->
                                <!--        </div>-->
                                <!--        <div class="col-md-6">-->
                                <!--            <label class="control-label">Fotocopy Asuransi</label>-->
                                <!--            <input type="file" name="asuransi" class="form-control" accept=".pdf" required>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <!--<div class="form-group">-->
                                <!--    <div class="row">-->
                                <!--        <div class="col-md-6" style="padding-right: 0px">-->
                                <!--            <label class="control-label">Fotocopy Surat Keterangan Sehat</label>-->
                                <!--            <input type="file" name="sks" class="form-control" accept=".pdf" required>-->
                                <!--        </div>-->
                                <!--        <div class="col-md-6">-->
                                <!--            <label class="control-label">ScreenShot data DIKTI</label>-->
                                <!--            <input type="file" name="ss" class="form-control" accept=".jpg, .jpeg, .png" required>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </fieldset>
                        </div>
                                <button type="submit" class="btn btn-primary" style="margin-left: 80%">Kirim<i class="fa fa-arrow-right position-right"></i></button>
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
            min: [1993,8,1],
            max: [2018,8,31],
            selectYears: 26,
            selectMonths: true
        })

        var picker = $input.pickadate('picker');
    </script>