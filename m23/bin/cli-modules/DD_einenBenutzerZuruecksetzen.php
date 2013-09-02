<?php
/*
Description: Erneuert einen Benutzer (Benutzer und Home löschen + wieder anlegen) auf einem Rechner aus der Liste.
Parameter: Rechnername
*/

include('/m23/bin/cli-modules/DD_functions.php');

function run($argc, $argv)
{
	if ($argc === 3)
		DD_einenBenutzerZuruecksetzen($argv[2]);
	else
		echo("Falsche Parameteranzahl\n");
}
?>