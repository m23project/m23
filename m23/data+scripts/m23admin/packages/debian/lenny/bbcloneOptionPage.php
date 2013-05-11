<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bbclone");

$elem["bbclone/reconfigure-webserver"]["type"]="multiselect";
$elem["bbclone/reconfigure-webserver"]["choices"][1]="apache";
$elem["bbclone/reconfigure-webserver"]["choices"][2]="apache-ssl";
$elem["bbclone/reconfigure-webserver"]["choices"][3]="apache-perl";
$elem["bbclone/reconfigure-webserver"]["description"]="Web server to be set automatically:
 BBClone supports any web server that php4 does, but this automatic
 configuration process only supports Apache.
";
$elem["bbclone/reconfigure-webserver"]["descriptionde"]="Webserver, der automatisch eingerichtet werden soll:
 BBClone unterstützt jeden Webserver, den auch PHP4 unterstützt, aber dieser automatische Konfigurationsprozess unterstützt nur Apache.
";
$elem["bbclone/reconfigure-webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 BBClone gère les mêmes serveurs web que PHP4, mais ce processus de configuration automatique ne concerne qu'Apache.
";
$elem["bbclone/reconfigure-webserver"]["default"]="apache, apache-ssl, apache-perl, apache2";
$elem["bbclone/restart-webserver"]["type"]="boolean";
$elem["bbclone/restart-webserver"]["description"]="Would you like to restart your webserver(s) now?
 Remember that in order to apply the changes your webserver(s) has/have to
 be restarted.
";
$elem["bbclone/restart-webserver"]["descriptionde"]="Möchten Sie Ihre(n) Webserver jetzt neu starten?
 Denken Sie daran, dass Ihr(e) Webserver neu gestartet werden müssen, damit Änderungen angewendet werden.
";
$elem["bbclone/restart-webserver"]["descriptionfr"]="Souhaitez-vous redémarrer le(s) serveur(s) web maintenant ?
 Veuillez noter que pour que les changements prennent effet, vous devez redémarrer le(s) serveur(s) web.
";
$elem["bbclone/restart-webserver"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
