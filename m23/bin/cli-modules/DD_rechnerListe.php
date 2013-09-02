<?php
/*
Description: Listet alle Rechner im "zenity --list"-Format auf.
*/

include('/m23/bin/cli-modules/DD_functions.php');

function run($argc, $argv)
{
	echo(DD_alleRechnerAuflisten());
}

?>