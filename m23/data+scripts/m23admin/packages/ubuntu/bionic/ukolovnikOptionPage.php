<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ukolovnik");

$elem["ukolovnik/reconfigure-webserver"]["type"]="multiselect";
$elem["ukolovnik/reconfigure-webserver"]["choices"][1]="apache2";
$elem["ukolovnik/reconfigure-webserver"]["choices"][2]="apache";
$elem["ukolovnik/reconfigure-webserver"]["choices"][3]="apache-ssl";
$elem["ukolovnik/reconfigure-webserver"]["choices"][4]="apache-perl";
$elem["ukolovnik/reconfigure-webserver"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 to run Ukolovnik.
";
$elem["ukolovnik/reconfigure-webserver"]["descriptionde"]="Webserver, die automatisch konfiguriert werden sollen:
 Bitte wählen Sie den Webserver aus, der automatisch zum Betrieb von Ukolovnik konfiguriert werden soll.
";
$elem["ukolovnik/reconfigure-webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Veuillez choisir le serveur web à reconfigurer automatiquement pour exécuter Ukolovnik.
";
$elem["ukolovnik/reconfigure-webserver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
