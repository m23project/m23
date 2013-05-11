<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tcpd");

$elem["tcpd/paranoid-mode"]["type"]="boolean";
$elem["tcpd/paranoid-mode"]["description"]="";
$elem["tcpd/paranoid-mode"]["descriptionde"]="";
$elem["tcpd/paranoid-mode"]["descriptionfr"]="";
$elem["tcpd/paranoid-mode"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
