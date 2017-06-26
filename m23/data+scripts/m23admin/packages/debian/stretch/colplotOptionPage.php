<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("colplot");

$elem["colplot/webserver"]["type"]="select";
$elem["colplot/webserver"]["choices"][1]="apache2";
$elem["colplot/webserver"]["choices"][2]="lighttpd";
$elem["colplot/webserver"]["choicesfr"][1]="Apache 2";
$elem["colplot/webserver"]["choicesfr"][2]="Lighttpd";
$elem["colplot/webserver"]["description"]="Web server:
 Please select the web server for which Colplot should be automatically
 configured.
 .
 Select \"None\" if you would like to configure the web server manually.
";
$elem["colplot/webserver"]["descriptionde"]="";
$elem["colplot/webserver"]["descriptionfr"]="Serveur web :
 Veuillez choisir le serveur web à reconfigurer automatiquement pour l'utilisation de Colplot.
 .
 Choisissez « Aucun » si vous préférez configurer vous-même le serveur web.
";
$elem["colplot/webserver"]["default"]="apache2";
PKG_OptionPageTail2($elem);
?>
