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
		table{
			height: 1000px;
		}
		.bg{background-image: url(../img/bg.jpg); width: 370px; height: 500px;}
		/*.logo{border-radius: 100%;}*/
	</style>
</head>
<body>
	<?php
		$id = @$_GET['id'];
		$query = mysqli_query($koneksi,"SELECT ketua_kon.`id_ptki`,ketua_kon.`nm_ketua`,ketua_kon.`foto`,ptki.`nm_ptki`,ptki.`nm_ptki` FROM ketua_kon JOIN ptki ON ketua_kon.`id_ptki` = ptki.`id_ptki` WHERE ketua_kon.`id_ptki` = '$id'");
		$data = mysqli_fetch_array($query);
		$foto = $data['foto']; 
	?>
	<br>
	<br>
	<br>
	<table border="1" cellspacing="0" cellpadding="0">
		<tr>
			<td align="center" class="bg">
				<table border="0" cellspacing="5" cellpadding="0" align="center">
					<tr>
						<td align="center">
							<img src="../img/logoPKM.png" width="60" height="60" class="logo">
							<img src="../img/uin.png" width="60" height="60" class="logo">
							<img src="../img/kemenag.png" width="60" height="60" class="logo">
						</td>
					</tr>
					<tr>
						<td align="center">
							<h3>PEKAN KREATIVITAS MAHASISWA <br> UIN RADEN FATAH PALEMBANG <br> Tanggal xx Oktober 2018</h3>
						</td>
					</tr>
					<tr>
						<td align="center" width="50">
							<img src="<?php echo $data['foto']; ?>" width="110" height="110">
						</td>
					</tr>
					<h5>
					<tr>
						<td align="center">Nama. <?php echo $data['nm_ketua']; ?></td>
					</tr>
					<tr>
						<td align="center"><?php echo ' KETUA KONTINGEN '; ?></td>
					</tr>
					<tr>
						<td align="center">Utusan <?php echo $data['nm_ptki']; ?></td>
					</tr>
					</h5>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
<?php  
	$filename="Ketua Kontingen ".$data['nm_ptki'].".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya  
	//==========================================================================================================  
	//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF  
	//==========================================================================================================  
	$content = ob_get_clean();  
	$content = '<page style="font-family: freeserif">'.($content).'</page>';  
	require_once(dirname(__FILE__).'./../html2pdf/html2pdf.class.php');  
	try {  
	 	$html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(1,0));  
	 	$html2pdf->setDefaultFont('arial','2');  
	 	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));  
	 	$html2pdf->Output($filename);  
	} catch(HTML2PDF_exception $e) { 
		echo $e; 
 	}  
?>  