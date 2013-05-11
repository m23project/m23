<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("textpattern");

$elem["textpattern/reconfigure-webserver"]["type"]="multiselect";
$elem["textpattern/reconfigure-webserver"]["choices"][1]="apache2";
$elem["textpattern/reconfigure-webserver"]["choicesde"][1]="Apache2";
$elem["textpattern/reconfigure-webserver"]["choicesfr"][1]="Apache 2";
$elem["textpattern/reconfigure-webserver"]["description"]="Web server(s) to configure automatically:
 Textpattern supports any web server supported by PHP, however only
 Apache can be configured automatically.
 .
 Please select the web server(s) that should be configured
 automatically for Textpattern.
";
$elem["textpattern/reconfigure-webserver"]["descriptionde"]="Web-Server, der/die automatisch konfiguriert werden sollen:
 Textpattern unterstützt alle Web-Server, die von PHP unterstützt werden. Allerdings kann nur Apache automatisch konfiguriert werden.
 .
 Bitte wählen Sie den/die Webserver aus, die automatisch für Textpattern konfiguriert werden sollen.
";
$elem["textpattern/reconfigure-webserver"]["descriptionfr"]="Serveur(s) web à configurer automatiquement :
 Textpattern fonctionne avec n'importe quel serveur web géré par PHP. Cependant, seul Apache peut être configuré automatiquement.
 .
 Veuillez choisir le(s) serveur(s) Web à configurer automatiquement pour Textpattern.
";
$elem["textpattern/reconfigure-webserver"]["default"]="apache2, lighttpd";
$elem["textpattern/restart-webserver"]["type"]="boolean";
$elem["textpattern/restart-webserver"]["description"]="Should the webserver(s) be restarted now?
 In order to activate the new configuration, the reconfigured web
 server(s) have to be restarted.
";
$elem["textpattern/restart-webserver"]["descriptionde"]="Sollen der/die Webserver jetzt automatisch neu gestartet werden?
 Um die neue Konfiguration zu aktivieren, müssen der/die rekonfigurierten Web-Server neu gestartet werden.
";
$elem["textpattern/restart-webserver"]["descriptionfr"]="Faut-il redémarrer le(s) serveur(s) web maintenant ?
 Afin d'activer la nouvelle configuration, le(s) serveur(s) web reconfiguré(s) doive(nt) être redémarré(s).
";
$elem["textpattern/restart-webserver"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
