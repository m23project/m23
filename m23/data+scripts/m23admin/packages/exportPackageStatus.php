<?php

if (isset($_GET['client']{0}))
	$fileName = "m23PackageStatus-$_GET[client].txt";
else
	$fileName = "m23PackageStatus.txt";

header('Content-type: text/plain');
header('Content-Disposition: attachment; filename="'.$fileName.'"');

ob_clean();
echo(PKG_getPackageStatusCSV($_GET['client']));
ob_end_flush();

exit(0);

?>