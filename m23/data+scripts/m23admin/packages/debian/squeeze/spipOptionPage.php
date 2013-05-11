<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("spip");

$elem["spip/webserver"]["type"]="multiselect";
$elem["spip/webserver"]["choices"][1]="apache";
$elem["spip/webserver"]["choices"][2]="apache-ssl";
$elem["spip/webserver"]["choices"][3]="apache2";
$elem["spip/webserver"]["description"]="";
$elem["spip/webserver"]["descriptionde"]="";
$elem["spip/webserver"]["descriptionfr"]="";
$elem["spip/webserver"]["default"]="apache2";
PKG_OptionPageTail2($elem);
?>
