<?php
/*
Description: Erneuert den jeweiligen Benutzer (Benutzer und Home löschen + wieder anlegen) auf allen Rechnern.
*/

include('/m23/bin/cli-modules/DD_functions.php');

function run($argc, $argv)
{
	DD_alleBenutzerZuruecksetzen();
}
?>