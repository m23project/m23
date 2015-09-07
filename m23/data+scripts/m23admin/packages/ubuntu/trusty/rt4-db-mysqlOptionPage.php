<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rt4-db-mysql");

$elem["rt4-db-mysql/available"]["type"]="boolean";
$elem["rt4-db-mysql/available"]["description"]="for internal use only
 The package stores information about its availability here for the
 interval between the config script is run and the package is unpacked.
";
$elem["rt4-db-mysql/available"]["descriptionde"]="";
$elem["rt4-db-mysql/available"]["descriptionfr"]="";
$elem["rt4-db-mysql/available"]["default"]="";
PKG_OptionPageTail2($elem);
?>
