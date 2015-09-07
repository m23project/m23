<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cipux-cat-web");

$elem["cipux-cat-web/reconfigure-webserver"]["type"]="multiselect";
$elem["cipux-cat-web/reconfigure-webserver"]["choices"][1]="apache2";
$elem["cipux-cat-web/reconfigure-webserver"]["choicesde"][1]="Apache2";
$elem["cipux-cat-web/reconfigure-webserver"]["choicesfr"][1]="Apache 2";
$elem["cipux-cat-web/reconfigure-webserver"]["description"]="Web server(s) to configure automatically:
 ${package} supports any web server with CGI enabled, however only
 Apache 2 and lighttpd can be configured automatically.
 .
 Please select the web server(s) that should be configured
 automatically for ${package}.
";
$elem["cipux-cat-web/reconfigure-webserver"]["descriptionde"]="Webserver, die automatisch konfiguriert werden sollen:
 ${package} unterstützt jeden Webserver, der CGI bietet. Allerdings kann nur Apache 2 und Lighttpd automatisch konfiguriert werden.
 .
 Bitte wählen Sie den/die Webserver aus, die für ${package} automatisch konfiguriert werden sollen.
";
$elem["cipux-cat-web/reconfigure-webserver"]["descriptionfr"]="Serveur(s) web à configurer automatiquement :
 ${package} fonctionne avec n'importe quel serveur web qui gère les CGI. Cependant, seuls Apache 2 et lighttpd peuvent être configurés automatiquement.
 .
 Veuillez choisir le(s) serveur(s) Web à configurer automatiquement pour ${package}.
";
$elem["cipux-cat-web/reconfigure-webserver"]["default"]="apache2, lighttpd";
$elem["cipux-cat-web/restart-webserver"]["type"]="boolean";
$elem["cipux-cat-web/restart-webserver"]["description"]="Should the webserver(s) be restarted now?
 In order to activate the new configuration, the reconfigured web
 server(s) have to be restarted.
";
$elem["cipux-cat-web/restart-webserver"]["descriptionde"]="Soll der/die Webserver jetzt automatisch neu gestartet werden?
 Um die neue Konfiguration zu aktivieren, müssen der/die rekonfigurierten Webserver neu gestartet werden.
";
$elem["cipux-cat-web/restart-webserver"]["descriptionfr"]="Faut-il redémarrer le(s) serveur(s) web maintenant ?
 Afin d'activer la nouvelle configuration, le(s) serveur(s) web reconfiguré(s) doi(ven)t être redémarré(s).
";
$elem["cipux-cat-web/restart-webserver"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
