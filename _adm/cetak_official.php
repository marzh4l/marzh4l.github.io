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
		.bg{background-image: url(../img/cocard.png);}
		.ukuran{width: 363px; height: 493px;}
		.logo{border-radius: 100%;}
	</style>
</head>
<body>
	<?php
		$id = @$_POST['selector'];
		$N = count($id);
		for($i=0; $i < $N; $i++)
		{
			$query = mysqli_query($koneksi,"SELECT official.`id_official`,official.`nm_official`,cabang_lomba.`nm_lomba`,official.`foto`,ptki.`nm_ptki` FROM official JOIN cabang_lomba ON official.`id_cablom` = cabang_lomba.`id_cablom` JOIN ptki ON cabang_lomba.`id_ptki` = ptki.`id_ptki` WHERE official.`id_official` = '$id[$i]'");
	?>
	<table cellspacing="4">
		<tr>
			<?php
				while($data = mysqli_fetch_array($query)) {
				$foto = $data['foto']; 
			?>
			<td>
				<table border="1" cellspacing="0" cellpadding="0" class="bg">
					<tr>
						<td align="center" class="ukuran">
							<table border="0" cellspacing="5" cellpadding="0" align="center">
								<tr>
									<td align="center">
										<!-- <img src="../img/logoPKM.png" width="60" height="60" class="logo">
										<img src="../img/uin.png" width="60" height="60" class="logo">
										<img src="../img/kemenag.png" width="60" height="60" class="logo"> -->
									</td>
								</tr>
								<tr>
									<td align="center">
										<h3>PEKAN KREATIVITAS MAHASISWA <br> UIN RADEN FATAH PALEMBANG <br> Tanggal xx Oktober 2018</h3>
									</td>
								</tr>
								<tr>
									<td align="center" width="50">
										<img src="<?php echo '../ptki/'.$foto; ?>" width="110" height="110">
									</td>
								</tr>
								<h4>
								<tr>
									<td align="center"><?php echo $data['nm_official']; ?></td>
								</tr>
								<tr>
									<td align="center"><?php echo ' OFFICIAL '; ?></td>
								</tr>
								<tr>
									<td align="center"><?php echo $data['nm_lomba']; ?></td>
								</tr>
								<tr>
									<td align="center"><?php echo $data['nm_ptki']; ?></td>
								</tr>
								</h4>
							</table>
						</td>
					</tr>
				</table>
			</td>
		<?php } ?>
		</tr>
	</table>
	<?php 
		} 
	?>
</body>
</html>
<?php  
	$filename="Kartu Official ".".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya  
	//==========================================================================================================  
	//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF  
	//==========================================================================================================  
	$content = ob_get_clean();  
	$content = '<page style="font-family: freeserif">'.($content).'</page>';  
	require_once(dirname(__FILE__).'./../html2pdf/html2pdf.class.php');  
	try {  
	 	$html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(4,10));  
	 	$html2pdf->setDefaultFont('arial','2');  
	 	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));  
	 	$html2pdf->Output($filename);  
	} catch(HTML2PDF_exception $e) { 
		echo $e; 
 	}  
?>  