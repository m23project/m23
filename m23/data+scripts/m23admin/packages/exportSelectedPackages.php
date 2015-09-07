<?php

//Include the files needed for getting the language of the interface only
include('/m23/inc/checks.php');
include('/m23/inc/db.php');
include('/m23/inc/capture.php');
include("/m23/inc/packages.php");

dbConnect();

if (isset($_GET['client']{0}))
	$fileName = "m23PackageList-$_GET[client].txt";
else
	$fileName = "m23PackageList.txt";

header('Content-type: text/plain');
header('Content-Disposition: attachment; filename="'.$fileName.'"');

echo(PKG_exportSelectedPackages($_GET['client']));

exit(0);

?>