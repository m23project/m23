<?php
/*
Description: Lists all clients that have waiting jobs.
*/

function run($argc, $argv)
{
	echo(implode("\n", PKG_getClientsWithWaitingJobs()));
}

?>
