<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("prometheus");

$elem["prometheus/remove-version1-database"]["type"]="boolean";
$elem["prometheus/remove-version1-database"]["description"]="";
$elem["prometheus/remove-version1-database"]["descriptionde"]="";
$elem["prometheus/remove-version1-database"]["descriptionfr"]="";
$elem["prometheus/remove-version1-database"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
