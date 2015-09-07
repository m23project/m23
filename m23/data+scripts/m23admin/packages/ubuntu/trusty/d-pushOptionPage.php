<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("d-push");

$elem["d-push/reconfigure-webserver"]["type"]="multiselect";
$elem["d-push/reconfigure-webserver"]["choices"][1]="apache2";
$elem["d-push/reconfigure-webserver"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 to run d-push.
";
$elem["d-push/reconfigure-webserver"]["descriptionde"]="Webserver, der automatisch neu konfiguriert werden soll:
 Bitte wählen Sie den Web-Server, der automatisch konfiguriert werden soll, um d-push auszuführen.
";
$elem["d-push/reconfigure-webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Veuillez choisir le serveur web à reconfigurer automatiquement pour l'utilisation de d-push.
";
$elem["d-push/reconfigure-webserver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
