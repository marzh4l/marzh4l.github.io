<?php              
    include "../koneksi.php";
    $id = $_POST['id'];    
	$query_kontingen = mysqli_query($koneksi,"SELECT `id_official`, `id_cablom`, `nm_official`, `nip`, `no_hp`, `jenis_kelamin`, `tgl`, `foto` FROM `official` WHERE `id_official` = '$id'");
    $no = 1;
    while ($data_official = mysqli_fetch_array($query_kontingen)) {
?>
        <div class="col-md-12">
            <img src="<?php echo $data_official['foto'] ?>" alt="" class="rounded-circle" width="55" height="55" style="margin-left: 85%">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab"><i class="fa fa-id-card-o" style="margin-right: 5px;"></i>Formulir</a></li>
                <li class="nav-item"><a class="nav-link " href="#tab2" data-toggle="tab"><i class="fa fa-file-pdf-o" style="margin-right: 5px;"></i>Berkas</a></li>
            </ul>
                <p align="right" style="font-size:12px">Tanda <i style="color:red">*</i> : Wajib di Isi</p>
        </div>
            <form action="edit_official.php" method="POST" enctype="multipart/form-data">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1" style="padding-bottom: 0px; padding-top: 0px">
                        <div class="col-md-12">
                            <fieldset class="content-group margin-top-10" style="margin-bottom: 0px !important;">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-7" >
                                            <label class="control-label">Nama <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="hidden" class="form-control" name="id_official" value="<?php echo $data_official["id_official"]; ?>" placeholder="Ketikan Nama Lengkap">
                                            <input type="hidden" class="form-control" name="id_cablom" value="<?php echo $data_official["id_cablom"]; ?>" placeholder="Ketikan Nama Lengkap">
                                            <input type="text" class="form-control" name="nm_official" value="<?php echo $data_official["nm_official"]; ?>" placeholder="Ketikan Nama Lengkap">
                                        </div>
                                        <div class="col-md-5" >
                                            <label class="control-label">NIP <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" class="form-control" name="nip" value="<?php echo $data_official["nip"]; ?>" placeholder="Ketikan Nomor NIP">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id_kontingen" value="<?php echo $hasil_kode ?>">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label class="control-label">Tanggal Lahir <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" class="form-control datepicker" name="tgl" value="<?php echo $data_official["tgl"]; ?>" placeholder="Masukkan Tanggal Lahir" style="background-color: white;" required>
                                        </div>
                                        <div class="col-md-5" style="padding-right: 0px">
                                            <label class="control-label">No HP <i style="font-size:20px; color:red"> *</i></label>
                                            <input type="text" name="no_hp" class="form-control" value="<?php echo $data_official["no_hp"]; ?>" placeholder="Ketikan Nomor Hp" required>
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
                                            <input type="text" class="form-control" name="jabatan" value="<?php echo $data_official["jabatan"]; ?>" placeholder="Ketikan Program Studi" required>-->
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
<?php 
    }  
?>
                    <div class="tab-pane fade" id="tab2" style="padding-bottom: 0px;">
                        <div class="col-md-12">
                            <fieldset class="content-group margin-top-10" style="margin-bottom: 0px !important;">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12" style="padding-right: 0px">
                                            <label class="control-label">Foto <i style="font-size:10px; font-size:10px; color:blue"> Format : .jpg/.jpeg/.png, Max: 550kb</i></label>
                                            <input type="file" name="foto" class="form-control" accept=".jpg, .jpeg, .png" value="<?php echo $data_official["foto"]; ?>">
                                        </div>
                                        <!-- <div class="col-md-6">
                                        </div> -->
                                </div>                                
                            </fieldset>
                        </div>
                                <button type="submit" class="btn btn-primary" style="margin-left: 100%">Update<i class="fa fa-arrow-right position-right"></i></button>
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
            min: [1993,7,1],
            max: [2018,7,31],
            selectYears: 26,
            selectMonths: true
        })

        var picker = $input.pickadate('picker');
    </script>