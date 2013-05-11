<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("citadel-webcit");

$elem["citadel/WebcitApacheIntegration"]["type"]="select";
$elem["citadel/WebcitApacheIntegration"]["choices"][1]="Apache2";
$elem["citadel/WebcitApacheIntegration"]["choicesde"][1]="Apache2";
$elem["citadel/WebcitApacheIntegration"]["choicesfr"][1]="Apache2";
$elem["citadel/WebcitApacheIntegration"]["description"]="Integration with Apache webservers:
 If you want Webcit to run alongside with one of your other installed
 Apache webservers, select it from the list, else use Internal to make
 Webcit use its own HTTP server facilities.
";
$elem["citadel/WebcitApacheIntegration"]["descriptionde"]="Integration mit Apache Webservern:
 Falls Sie möchten, dass Webcit parallel zu einem Ihrer anderen installierten Apache-Webserver läuft, wählen Sie diesen von der Liste, andernfalls wählen Sie Internal, damit Webcit seine eigenen HTTP-Servereinrichtungen verwendet.
";
$elem["citadel/WebcitApacheIntegration"]["descriptionfr"]="Serveur Apache à configurer pour Webcit :
 Si vous désirez exécuter Webcit en même temps qu'un des serveurs webApache déjà installés, veuillez choisir celui-ci dans la liste.« Interne  » sélectionnera le serveur HTTP intégré à Webcit.
";
$elem["citadel/WebcitApacheIntegration"]["default"]="Internal";
$elem["citadel/WebcitHttpPort"]["type"]="string";
$elem["citadel/WebcitHttpPort"]["description"]="Webcit HTTP port:
 Select the port which the plain HTTP Webcit server should listen on.
 Use port 80 if you don't have another webserver running or enter -1 to disable
 it.
";
$elem["citadel/WebcitHttpPort"]["descriptionde"]="HTTP-Port von Webcit:
 Wählen Sie den Port, an dem der einfache HTTP-Webcit-Server auf Anfrageni warten soll. Benutzen Sie Port 80, falls Sie keinen anderen Webserverbetreiben oder -1 um ihn zu deaktivieren.
";
$elem["citadel/WebcitHttpPort"]["descriptionfr"]="Port HTTP pour Webcit :
 Veuillez choisir le port d'écoute HTTP pour Webcit. Ne choisissez le port 80 que si aucun serveur web n'est déjà en fonction. Indiquez -1 pour désactiver ce réglage.
";
$elem["citadel/WebcitHttpPort"]["default"]="8504";
$elem["citadel/WebcitHttpsPort"]["type"]="string";
$elem["citadel/WebcitHttpsPort"]["description"]="Webcit HTTPS port:
 Select the port which the SSL HTTP Webcit server should listen on or enter -1
 to disable it.
";
$elem["citadel/WebcitHttpsPort"]["descriptionde"]="HTTPS-Port von Webcit:
 Wählen Sie den Port, an dem der SSL-HTTP-Webcit-Server auf Anfragen warten soll oder -1 um ihn zu deaktivieren.
";
$elem["citadel/WebcitHttpsPort"]["descriptionfr"]="Port HTTP pour Webcit :
 Veuillez choisir le port d'écoute HTTPS pour Webcit. Indiquez -1 pour désactiver ce réglage.
";
$elem["citadel/WebcitHttpsPort"]["default"]="443";
PKG_OptionPageTail2($elem);
?>
