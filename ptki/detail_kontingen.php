<?php              
    include "../koneksi.php";
    $id = $_POST['id'];    
	$query_kontingen = mysqli_query($koneksi,"SELECT kontingen.`id_kontingen`,kontingen.`id_cablom`,kontingen.`nm_kontingen`,kontingen.`nim`,kontingen.`no_hp`,kontingen.`jenis_kelamin`,kontingen.`jurusan`,kontingen.`tgl`,berkas.`foto`,berkas.`file_data`,berkas.`ss` FROM kontingen JOIN berkas ON kontingen.`id_kontingen` = berkas.`id_kontingen` WHERE kontingen.`id_kontingen` = '$id'");
    $no = 1;
    while ($data_kontingen = mysqli_fetch_array($query_kontingen)) {
?>
        <div class="col-md-12">
            <img src="<?php echo $data_kontingen['foto'] ?>" alt="" class="rounded-circle" width="55" height="55" style="margin-left: 85%">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab"><i class="fa fa-id-card-o" style="margin-right: 5px;"></i>Formulir</a></li>
                <li class="nav-item"><a class="nav-link " href="#tab2" data-toggle="tab"><i class="fa fa-user" style="margin-right: 5px;"></i>Berkas</a></li>
            </ul>
                <p align="right" style="font-size:12px">Tanda <i style="color:red">*</i> : Wajib di Isi</p>
        </div>
            <form action="edit_kontingen.php" method="POST" enctype="multipart/form-data">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1" style="padding-bottom: 0px; padding-top: 0px">
                        <div class="col-md-12">
                            <fieldset class="content-group margin-top-10" style="margin-bottom: 0px !important;">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-7" >
                                            <label class="control-label">Nama <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="hidden" class="form-control" name="id_kontingen" value="<?php echo $data_kontingen["id_kontingen"]; ?>" placeholder="Ketikan Nama Lengkap">
                                            <input type="hidden" class="form-control" name="id_cablom" value="<?php echo $data_kontingen["id_cablom"]; ?>" placeholder="Ketikan Nama Lengkap">
                                            <input type="text" class="form-control" name="nm_kontingen" value="<?php echo $data_kontingen["nm_kontingen"]; ?>" placeholder="Ketikan Nama Lengkap">
                                        </div>
                                        <div class="col-md-5" >
                                            <label class="control-label">NIM <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" class="form-control" name="nim" value="<?php echo $data_kontingen["nim"]; ?>" placeholder="Ketikan Nomor NIP">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label class="control-label">Tanggal Lahir <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" class="form-control datepicker" name="tgl" value="<?php echo $data_kontingen["tgl"]; ?>" placeholder="Masukkan Tanggal Lahir" style="background-color: white;" required>
                                        </div>
                                        <div class="col-md-5" style="padding-right: 0px">
                                            <label class="control-label">No HP <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" name="no_hp" class="form-control" value="<?php echo $data_kontingen["no_hp"]; ?>" placeholder="Ketikan Nomor Hp" required>
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
                                            <input type="text" class="form-control" name="jurusan" value="<?php echo $data_kontingen["jurusan"]; ?>" placeholder="Ketikan Program Studi" required>
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
                                            <label class="control-label">Foto <i style="font-size:20px; color:red"> *</i> <i style="font-size:10px; font-size:10px; color:blue"> Format : .jpg/.jpeg/.png, Max : 550kb <br> <a href="<?php echo $data_kontingen['foto']; ?>" target="_blank">Berkas</a></i></label>
                                            <input type="file" name="foto" class="form-control" accept=".jpg, .jpeg, .png" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">ScreenShot data DIKTI <i style="font-size:20px; color:red"> *</i><br><i style="font-size:10px; font-size:10px; color:blue"> Format : .jpg, Max : 550kb <br> <a href="<?php echo $data_kontingen['ss']; ?>" target="_blank">Berkas</a></i></label>
                                            <input type="file" name="ss" class="form-control" accept=".jpg, .jpeg, .png" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" style="padding-right: 0px">
                                            <label class="control-label">File Data <i style="font-size:20px; color:red"> *</i><p style="font-size:10px">(KTM/SURAT KETERANGAN MAHASISWA) <i style="font-size:10px; color:blue"> Format : .pdf, Max : 550kb</i> <br> <a href="<?php echo $data_kontingen['file_data']; ?>" target="_blank">Berkas</a></p></label>
                                            <input type="file" name="file_pdf" class="form-control" accept=".pdf" required>
                                        </div>
                                        <div class="col-md-6">
                                            <!--<label class="control-label">Fotocopy KTP</label>-->
                                            <!--<input type="file" name="ktp" class="form-control" accept=".pdf" required>-->
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" style="padding-right: 0px">
                                            <label class="control-label">Fotocopy KTM</label>
                                            <input type="file" name="ktm" class="form-control" accept=".pdf" required>
                                            </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Fotocopy KTP</label>
                                            <input type="file" name="ktp" class="form-control" accept=".pdf" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" style="padding-right: 0px">
                                            <label class="control-label">Fotocopy Ijazah SMA</label>
                                            <input type="file" name="ijazah" class="form-control" accept=".pdf" required>
                                            </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Fotocopy Asuransi</label>
                                            <input type="file" name="asuransi" class="form-control" accept=".pdf" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Fotocopy Surat Keterangan Sehat</label>
                                    <input type="file" name="sks" class="form-control" accept=".pdf" required>
                                </div> -->
                            
                                    <button type="submit" class="btn btn-primary" style="margin-left: 85%;">Update<i class="fa fa-arrow-right position-right"></i></button>
                            </fieldset>
                        </div>
                    </div>
<?php 
    }  
?>
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
            min: [1993,7,1],
            max: [2018,7,31],
            selectYears: 26,
            selectMonths: true
        })

        var picker = $input.pickadate('picker');
    </script>