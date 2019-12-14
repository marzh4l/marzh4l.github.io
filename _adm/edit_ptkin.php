<?php              
    include "../koneksi.php";
    $id = $_POST['id'];    
	$query_ptkin = mysqli_query($koneksi,"SELECT `id_ptkin`, `nm_ptki`, `kota`, `kode` FROM `ptkin_sumatera` WHERE `kode` = '$id'");
    $no = 1;
    while ($data_ptkin = mysqli_fetch_array($query_ptkin)) {
?>
                        <form method="POST" action="proses_editptki.php" style="margin-left: 5%; margin-right: 5%;">
                            <div class="form-group">
                                <!--<label class="control-label">ID PTKIN</label>-->
                                <input type="hidden" name="id_ptkin" class="form-control" placeholder="Masukan nama PTKIN" required="" value="<?php echo $data_ptkin['id_ptkin']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Kategori</label>
                                <select id="inputState" class="form-control" name="kategori">
                                    <option >-- Pilih --</option>
                                                <option value="UIN">UIN</option>
                                    <option value="IAIN">IAIN</option>
                                    <option value="STAIN">STAIN</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Nama Perguruan Tinggi Keagamaan Islam Negeri</label>
                                <input type="text" name="nm_ptki" class="form-control" placeholder="Masukan nama PTKIN" required="" value="<?php echo $data_ptkin['nm_ptki']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Kota</label>
                                <input type="text" name="kota" class="form-control" placeholder="Masukan Kota Daerah" required="" value="<?php echo $data_ptkin['kota']; ?>">
                            </div> 
                            
                            <div class="form-group">
                                <label class="control-label">Kode</label>
                                <input type="text" name="kode" class="form-control" placeholder="Masukan kode" required="" value="<?php echo $data_ptkin['kode']; ?>">
                            </div>                                         

                            <div class="pull-right">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Kirim<i class="fa fa-arrow-right position-right"></i></button>
                            </div>
                        </form>
<?php } ?>