<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cacti");

$elem["cacti/webserver"]["type"]="select";
$elem["cacti/webserver"]["choices"][1]="apache2";
$elem["cacti/webserver"]["choices"][2]="lighttpd";
$elem["cacti/webserver"]["choicesde"][1]="apache2";
$elem["cacti/webserver"]["choicesde"][2]="lighttpd";
$elem["cacti/webserver"]["choicesfr"][1]="apache2";
$elem["cacti/webserver"]["choicesfr"][2]="lighttpd";
$elem["cacti/webserver"]["description"]="Web server:
 Please select the web server for which Cacti should be automatically
 configured.
 .
 Select \"None\" if you would like to configure the web server manually.
";
$elem["cacti/webserver"]["descriptionde"]="Webserver:
 Bitte wählen Sie den Webserver aus, für den Cacti automatisch eingerichtet werden soll.
 .
 Wählen Sie »keiner«, falls Sie den Webserver manuell einrichten wollen.
";
$elem["cacti/webserver"]["descriptionfr"]="Serveur web :
 Veuillez choisir le serveur web à reconfigurer automatiquement pour l'utilisation de Cacti.
 .
 Choisissez « Aucun » si vous préférez configurer vous-même le serveur web.
";
$elem["cacti/webserver"]["default"]="apache2";
PKG_OptionPageTail2($elem);
?>
