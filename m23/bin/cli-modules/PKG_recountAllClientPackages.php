<?php
/*
Description: Updates the amount of packages on each client in the clients.trg_sum_clientpackages table.
*/

function run($argc, $argv)
{
	PKG_recountAllClientPackages();
}

?>
