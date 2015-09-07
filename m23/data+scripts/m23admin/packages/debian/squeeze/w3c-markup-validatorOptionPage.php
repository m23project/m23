<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("w3c-markup-validator");

$elem["w3c-markup-validator/webserver"]["type"]="multiselect";
$elem["w3c-markup-validator/webserver"]["choices"][1]="Apache2";
$elem["w3c-markup-validator/webserver"]["choices"][2]="Apache";
$elem["w3c-markup-validator/webserver"]["choices"][3]="Apache-Perl";
$elem["w3c-markup-validator/webserver"]["choicesde"][1]="Apache2";
$elem["w3c-markup-validator/webserver"]["choicesde"][2]="Apache";
$elem["w3c-markup-validator/webserver"]["choicesde"][3]="Apache-Perl";
$elem["w3c-markup-validator/webserver"]["choicesfr"][1]="Apache2";
$elem["w3c-markup-validator/webserver"]["choicesfr"][2]="Apache";
$elem["w3c-markup-validator/webserver"]["choicesfr"][3]="Apache-Perl";
$elem["w3c-markup-validator/webserver"]["description"]="Web server(s) which will be reconfigured automatically:
 w3c-markup-validator needs to check if your webserver is configured
 properly.
 .
 w3c-markup-validator supports any web server that can call CGI scripts and
 allows Server Side Includes (SSI), but this automatic configuration
 process only supports Apache 2, Apache, Apache-Perl and Apache-SSL. If you
 use another server, you will have to configure it manually before being able
 to use the package.
";
$elem["w3c-markup-validator/webserver"]["descriptionde"]="Webserver, der automatisch rekonfiguriert wird:
 w3c-markup-validator muss überprüfen, ob Ihr Webserver richtig konfiguriert ist.
 .
 w3c-markup-validator unterstützt jeden Web-Server, der CGI-Skripts aufrufen kann und Server Side Includes (SSI) erlaubt; aber dieser automatische Konfigurationsvorgang unterstützt nur Apache 2, Apache, Apache-Perl und Apache-SSL. Falls Sie einen anderen Webserver verwenden, werden Sie ihn manuell konfigurieren müssen, bevor Sie in der Lage sind, dieses Paket zu nutzen.
";
$elem["w3c-markup-validator/webserver"]["descriptionfr"]="Serveur(s) web à reconfigurer automatiquement :
 W3c-markup-validator doit vérifier si votre serveur web est correctement configuré.
 .
 W3c-markup-validator gère tout serveur capable d'appeler des scripts CGI et de faire des inclusions côté serveur (SSI), mais ce système de configuration automatique ne gère qu'Apache2, Apache, Apache-Perl et Apache-SSL. Si vous utilisez un autre serveur, vous devrez le configurer vous-même avant de pouvoir utiliser le paquet.
";
$elem["w3c-markup-validator/webserver"]["default"]="Apache2";
PKG_OptionPageTail2($elem);
?>
