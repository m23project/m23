<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("postfixadmin");

$elem["postfixadmin/reconfigure-webserver"]["type"]="multiselect";
$elem["postfixadmin/reconfigure-webserver"]["choices"][1]="apache2";
$elem["postfixadmin/reconfigure-webserver"]["choices"][2]="apache";
$elem["postfixadmin/reconfigure-webserver"]["choices"][3]="apache-ssl";
$elem["postfixadmin/reconfigure-webserver"]["choices"][4]="apache-perl";
$elem["postfixadmin/reconfigure-webserver"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 to run postfixadmin.
";
$elem["postfixadmin/reconfigure-webserver"]["descriptionde"]="Webserver, der automatisch neu konfiguriert werden soll:
 Bitte wählen Sie den Webserver, der automatisch konfiguriert werden soll, um Postfixadmin auszuführen.
";
$elem["postfixadmin/reconfigure-webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Veuillez choisir le serveur web qui doit être configuré automatiquement pour exécuter postfixadmin.
";
$elem["postfixadmin/reconfigure-webserver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
