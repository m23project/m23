<?PHP

function HELPER_showBAfH()
{
	include_once('/m23/data+scripts/m23admin/misc/bafh_ausreden.php');
	$numExcuse = count($ausredenSammlung);
	$firstTime = 1335045600;
	$oneDay = 60 * 60 * 24;
	$now = time();
	$daysPassed = intval(($now - $firstTime) / $oneDay);
	$index = $daysPassed % $numExcuse;

	echo("
	<br>
	<table style=\"max-width:100%; border-width:9px; border-color:orange; border-style:double; padding:5px;\">
		<tr>
			<td width=105px>
				<img src=\"/gfx/rabe_links100.png\" alt = \"Rabe links\">
			</td>
			<td style=\"vertical-align:middle\">
				<i>Die BAfH (Bastard Administrator from Hell)-Ausrede des Tages lautet:</i><br>
				<p><span style=\"font-size:larger\"><i><b>".$ausredenSammlung[$index]."</b></i></span></p>
				<p align=\"right\"><span style=\"font-size:x-small\">CC-BY Florian Schiel<p>
			</td>
			<td width=105px>
				<img src=\"/gfx/rabe_rechts100.png\" alt = \"Rabe rechts\">
			</td>
		</tr>
	</table>
	");
}
?>