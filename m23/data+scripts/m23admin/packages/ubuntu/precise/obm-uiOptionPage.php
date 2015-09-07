<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("obm-ui");

$elem["obm-ui/configure-webserver"]["type"]="multiselect";
$elem["obm-ui/configure-webserver"]["description"]="";
$elem["obm-ui/configure-webserver"]["descriptionde"]="";
$elem["obm-ui/configure-webserver"]["descriptionfr"]="";
$elem["obm-ui/configure-webserver"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
