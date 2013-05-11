<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("semanticscuttle");

$elem["semanticscuttle/webserver"]["type"]="boolean";
$elem["semanticscuttle/webserver"]["description"]="Do you want to configure apache2?
";
$elem["semanticscuttle/webserver"]["descriptionde"]="MÃ¶chten Sie Apache2 konfigurieren?
";
$elem["semanticscuttle/webserver"]["descriptionfr"]="Voulez-vous configurer Apache 2 ?
";
$elem["semanticscuttle/webserver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
