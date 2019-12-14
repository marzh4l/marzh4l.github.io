<?php
	 $batas = 10;
	 echo '<table>';
	 	for ($i=0;$i<=$batas;$i++){
	 		echo '<tr>';
	 			for ($j=1;$j<=2;$j++){
		 			echo '<td>';
		 				echo $j+$i;
		 			echo '</td>';
	 			}
			 echo '</tr>';
	 	}
	echo '</table>';
?>