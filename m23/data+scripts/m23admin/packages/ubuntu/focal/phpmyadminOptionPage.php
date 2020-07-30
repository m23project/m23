<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phpmyadmin");

$elem["phpmyadmin/reconfigure-webserver"]["type"]="multiselect";
$elem["phpmyadmin/reconfigure-webserver"]["choices"][1]="apache2";
$elem["phpmyadmin/reconfigure-webserver"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 to run phpMyAdmin.
";
$elem["phpmyadmin/reconfigure-webserver"]["descriptionde"]="Webserver, die automatisch konfiguriert werden sollen:
 Bitte wählen Sie den Webserver aus, der automatisch zum Betrieb von phpMyAdmin konfiguriert werden soll.
";
$elem["phpmyadmin/reconfigure-webserver"]["descriptionfr"]="Serveur Web à reconfigurer automatiquement :
 Merci de choisir le serveur Web à reconfigurer automatiquement pour exécuter phpMyAdmin.
";
$elem["phpmyadmin/reconfigure-webserver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
