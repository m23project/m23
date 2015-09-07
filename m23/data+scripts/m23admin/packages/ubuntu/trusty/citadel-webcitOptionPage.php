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
$elem["citadel/WebcitApacheIntegration"]["descriptionde"]="Integration mit Apache-Webservern:
 Falls Sie möchten, dass Webcit parallel zu einem Ihrer anderen installierten Apache-Webserver läuft, wählen Sie diesen von der Liste, andernfalls wählen Sie Intern, damit Webcit seine eigenen HTTP-Servereinrichtungen verwendet.
";
$elem["citadel/WebcitApacheIntegration"]["descriptionfr"]="Serveur Apache à configurer pour Webcit :
 Si vous désirez exécuter Webcit en même temps qu'un des serveurs web Apache déjà installés, veuillez choisir celui-ci dans la liste. « Interne » sélectionnera le serveur HTTP intégré à Webcit.
";
$elem["citadel/WebcitApacheIntegration"]["default"]="Internal";
$elem["citadel/WebcitHttpPort"]["type"]="string";
$elem["citadel/WebcitHttpPort"]["description"]="Webcit HTTP port:
 Select the port which the plain HTTP Webcit server should listen on.
 Use port 80 if you don't have another webserver running or enter -1 to disable
 it.
";
$elem["citadel/WebcitHttpPort"]["descriptionde"]="HTTP-Port von Webcit:
 Wählen Sie den Port, an dem der einfache HTTP-Webcit-Server auf Anfragen warten soll. Benutzen Sie Port 80, falls Sie keinen anderen Webserver betreiben oder -1, um ihn zu deaktivieren.
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
 Wählen Sie den Port, an dem der SSL-HTTP-Webcit-Server auf Anfragen warten soll oder -1, um ihn zu deaktivieren.
";
$elem["citadel/WebcitHttpsPort"]["descriptionfr"]="Port HTTP pour Webcit :
 Veuillez choisir le port d'écoute HTTPS pour Webcit. Indiquez -1 pour désactiver ce réglage.
";
$elem["citadel/WebcitHttpsPort"]["default"]="443";
$elem["citadel/WebcitOfferLang"]["type"]="select";
$elem["citadel/WebcitOfferLang"]["choices"][1]="User-defined";
$elem["citadel/WebcitOfferLang"]["choices"][2]="Danish";
$elem["citadel/WebcitOfferLang"]["choices"][3]="German";
$elem["citadel/WebcitOfferLang"]["choices"][4]="English";
$elem["citadel/WebcitOfferLang"]["choices"][5]="Spanish";
$elem["citadel/WebcitOfferLang"]["choices"][6]="French";
$elem["citadel/WebcitOfferLang"]["choices"][7]="Italian";
$elem["citadel/WebcitOfferLang"]["choices"][8]="Dutch";
$elem["citadel/WebcitOfferLang"]["choicesde"][1]="Benutzerdefiniert";
$elem["citadel/WebcitOfferLang"]["choicesde"][2]="Dänisch";
$elem["citadel/WebcitOfferLang"]["choicesde"][3]="Deutsch";
$elem["citadel/WebcitOfferLang"]["choicesde"][4]="Englisch";
$elem["citadel/WebcitOfferLang"]["choicesde"][5]="Spanisch";
$elem["citadel/WebcitOfferLang"]["choicesde"][6]="Französisch";
$elem["citadel/WebcitOfferLang"]["choicesde"][7]="Italienisch";
$elem["citadel/WebcitOfferLang"]["choicesde"][8]="Niederländisch";
$elem["citadel/WebcitOfferLang"]["choicesfr"][1]="Choix par l'utilisateur";
$elem["citadel/WebcitOfferLang"]["choicesfr"][2]="Danois";
$elem["citadel/WebcitOfferLang"]["choicesfr"][3]="Allemand";
$elem["citadel/WebcitOfferLang"]["choicesfr"][4]="Anglais";
$elem["citadel/WebcitOfferLang"]["choicesfr"][5]="Espagnol";
$elem["citadel/WebcitOfferLang"]["choicesfr"][6]="Français";
$elem["citadel/WebcitOfferLang"]["choicesfr"][7]="Italien";
$elem["citadel/WebcitOfferLang"]["choicesfr"][8]="Néerlandais";
$elem["citadel/WebcitOfferLang"]["description"]="Limit Webcit's login language selection
 Select language the Webcit server should run in. User-defined leaves this choice
 to the user at the login prompt. 
";
$elem["citadel/WebcitOfferLang"]["descriptionde"]="Sprachauswahl bei der Anmeldung bei Webcit einschränken
 Wählen Sie die Sprache, unter der der Webcit-Server laufen soll. Benutzerdefiniert überlässt dem Benutzer bei der Anmeldung die Wahl.
";
$elem["citadel/WebcitOfferLang"]["descriptionfr"]="Choix de la langue à la connexion :
 Veuillez choisir la langue affichée par le serveur Webcit. \"Choix par l'utilisateur\" laisse la possibilité à l'utilisateur de choisir la langue à la connexion.
";
$elem["citadel/WebcitOfferLang"]["default"]="UNLIMITED";
PKG_OptionPageTail2($elem);
?>
