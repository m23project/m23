<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("389-ds-base");

$elem["389-ds-base/setup"]["type"]="note";
$elem["389-ds-base/setup"]["description"]="";
$elem["389-ds-base/setup"]["descriptionde"]="";
$elem["389-ds-base/setup"]["descriptionfr"]="";
$elem["389-ds-base/setup"]["default"]="";
PKG_OptionPageTail2($elem);
?>
