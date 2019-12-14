<?php  
    require_once("../koneksi.php");
    session_start();  
	ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		h4{margin-bottom: 0px;}
		h6{margin-top: 10px;}
		table{font-size: 10pt; width: 50%;}
		p{font-size: 9pt; margin-left: 500px;}
	</style>
</head>
<body>
	<table align="center">
		<tr>
			<td align="left" width="95"><img src="../img/uin.png" alt="uin.png" width="75" height="75"></td>
			<td>
				<h4 align="center">KEMENTERIAN AGAMA REPUBLIK INDONESIA<br>UNIVERSITAS ISLAM NEGERI RADEN FATAH PALEMBANG<br>PEKAN KREATIVITAS MAHASISWA PTKIN 2018</h4>
				<h6 align="center">Jln. Prof K. H. Zainal Abidin Fikry No. 1 KM. 3.5 Palembang 30126<br>Telp. (0711) 353360 Website: www.radenfatah.ac.id<br>pkm.radenfatah.ac.id</h6>				
			</td>
			<td align="right" width="95"><img src="../img/logoPKM.png" alt="logoPKM.png" width="75" height="75"></td>
		</tr>
	</table>
	<hr>
	<h5 align="center">DATA OFFICIAL PEKAN KREATIVITAS MAHASISWA UIN RADEN FATAH 2018<br>OFFICIAL : <?php echo $_POST['nm_ptki']; ?></h5>
	<table align="center" border="1" cellspacing="0" >

		
            <tr align="center" bgcolor="#5974FA">
                <th width="30" height="20">No</th>
                <th width="200">Nama</th>
                <th width="300">Cabang Perlombaan</th>
                <th width="100">Peserta</th>
            </tr>
        
        
			<?php
				$id_ptki = $_POST['id_ptki'];
				$query = mysqli_query($koneksi,"SELECT official.`id_official`,official.`nm_official`,cabang_lomba.`nm_lomba`,cabang_lomba.`peserta_lomba`,ketua_kon.`nm_ketua`,ptkin_sumatera.`kota` FROM official JOIN cabang_lomba ON official.`id_cablom` = cabang_lomba.`id_cablom` JOIN ketua_kon ON cabang_lomba.`id_ptki` = ketua_kon.`id_ptki`JOIN ptkin_sumatera ON cabang_lomba.`id_ptki` = ptkin_sumatera.`kode` WHERE cabang_lomba.`id_ptki` = '$id_ptki'");
				$no = 1;
				while($data = mysqli_fetch_array($query)) {
				$ketua = $data['nm_ketua'];
				$kota = $data['kota'];
			?>
			<tr>
            	<td align="center" height="15"><?php echo $no++; ?></td>
            	<td><?php echo $data['nm_official']; ?></td>
            	<td><?php echo $data['nm_lomba']; ?></td>
            	<td align="center"><?php echo $data['peserta_lomba']; ?></td>
            </tr>
			<?php 
				}				
			?>        	
	</table>
	<br><br><br><br>
	<p align="center">
	    <?php
	        $tgl=date('d-m-Y');
            echo $kota.', '.$tgl.'<br>';
	    ?>
	    Ketua Kontingen<br><br><br><br><br><br><b><?php echo @$ketua; ?></b>
	</p>
</body>
</html>
<?php  
	$filename="Daftar Official.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya  
	//==========================================================================================================  
	//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF  
	//==========================================================================================================  
	$content = ob_get_clean();  
	$content = '<page style="font-family: freeserif">'.($content).'</page>';  
	require_once(dirname(__FILE__).'./../html2pdf/html2pdf.class.php');  
	try {  
	 	$html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(15,9));  
	 	$html2pdf->setDefaultFont('arial','10');  
	 	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));  
	 	$html2pdf->Output($filename);  
	} catch(HTML2PDF_exception $e) { 
		echo $e; 
 	}  
?>  