<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
echo "<table border='1' cellspacing='1' cellpadding='1'>";
$num_teams = 8;
$nRounds = floor(log($num_teams,2));
$max_rows = $num_teams*2;
for ($row = 0; $row <= $max_rows; $row++)
{
    echo "<tr>";
    if ($row == 0)
    {
        for ($i = 1; $i <= $nRounds+1; $i++)
        {
            if($i < $nRounds)
            {
                echo "<td width='120'><b>Round ".$i."</b></td>";
                echo "<td width='20'></td>";
            }
            elseif($i == $nRounds)
            {
                echo "<td width='120'><b>Final</b></td>";
                echo "<td width='20'></td>";
            }
            else
            {
                echo "<td width='120'><b>Winner</b></td>";
            }
        }       
    }
    elseif($row == 1)
    {
        $rowwhitespace = ($nRounds*2)+1;
        echo "<td colspan='".$rowwhitespace."'>&nbsp;</td>";
    }
    else
    {
        $rowwhitespace = ($nRounds*2);
        for ($i = 1; $i <= $num_teams; $i++)
        {
            if($i == $row/2)
            {
                echo "<td>Group ".$i."</td>";
                echo "<td colspan='".$rowwhitespace."'></td>";
            }
        }
    }
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>