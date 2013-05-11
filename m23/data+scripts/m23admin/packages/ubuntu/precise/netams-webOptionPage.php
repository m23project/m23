<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("netams-web");

$elem["netams-web/reconfigure-webserver"]["type"]="multiselect";
$elem["netams-web/reconfigure-webserver"]["choices"][1]="apache2";
$elem["netams-web/reconfigure-webserver"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 for NeTAMS.
";
$elem["netams-web/reconfigure-webserver"]["descriptionde"]="Webserver, der automatisch neu konfiguriert werden soll:
 Bitte wählen Sie den Webserver aus, der für NeTAMS automatisch neu konfiguriert werden soll.
";
$elem["netams-web/reconfigure-webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement:
 Veuillez choisir le serveur web qui sera automatiquement configuré pour NeTAMS.
";
$elem["netams-web/reconfigure-webserver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
