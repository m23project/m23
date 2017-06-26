<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("darcsweb");

$elem["darcsweb/webserver"]["type"]="select";
$elem["darcsweb/webserver"]["choices"][1]="Apache2";
$elem["darcsweb/webserver"]["choicesde"][1]="Apache2";
$elem["darcsweb/webserver"]["choicesfr"][1]="Apache 2";
$elem["darcsweb/webserver"]["description"]="Web server to configure:
 Please choose the web server that should be configured automatically
 for use with darcsweb.
 .
 If you choose \"None\", the web server should be configured manually.
";
$elem["darcsweb/webserver"]["descriptionde"]="Webserver, der konfiguriert werden soll:
 Bitte wählen Sie den Webserver, der automatisch für die Benutzung mit Darcsweb konfiguriert werden soll.
 .
 Wenn Sie »Keiner« wählen, sollte der Webserver manuell konfiguriert werden.
";
$elem["darcsweb/webserver"]["descriptionfr"]="Serveur web à configurer :
 Veuillez choisir le serveur web à configurer automatiquement pour darcsweb.
 .
 Si vous choisissez « Aucun », vous devrez configurer le serveur web vous-même.
";
$elem["darcsweb/webserver"]["default"]="Apache2";
PKG_OptionPageTail2($elem);
?>
