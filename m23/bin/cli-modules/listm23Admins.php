<?php
/*
Description: Lists the admin accounts of the m23 webinterface
*/

function run($argc, $argv)
{
	$admins = Cm23AdminLister::ListAdmins();

	foreach ($admins as $admin)
		echo("* $admin\n");
}
?>
