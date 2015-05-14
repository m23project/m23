<?php
/*
Description: Lists all clients that have a package installed.
Parameter: Name of the package.
*/

function run($argc, $argv)
{
	array_shift($argv);
	array_shift($argv);

	echo(implode("\n", PKG_getClientsByPackages($argv)));
}

?>