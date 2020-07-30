<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ubuntu-advantage-tools");

$elem["ubuntu-advantage-tools/suggest_pro_pkg"]["type"]="note";
$elem["ubuntu-advantage-tools/suggest_pro_pkg"]["description"]="Ubuntu Pro support now requires ubuntu-advantage-pro
 To install run the following:
 .
 sudo apt-get install ubuntu-advantage-pro
";
$elem["ubuntu-advantage-tools/suggest_pro_pkg"]["descriptionde"]="";
$elem["ubuntu-advantage-tools/suggest_pro_pkg"]["descriptionfr"]="";
$elem["ubuntu-advantage-tools/suggest_pro_pkg"]["default"]="";
PKG_OptionPageTail2($elem);
?>
