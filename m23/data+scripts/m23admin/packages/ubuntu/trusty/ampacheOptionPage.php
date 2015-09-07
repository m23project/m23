<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ampache");

$elem["ampache/restart_webserver"]["type"]="boolean";
$elem["ampache/restart_webserver"]["description"]="Configure and restart the web server?
 The web server needs to be reconfigured and restarted to enable Ampache.
 Please choose whether you want to restart it automatically now or do it
 yourself later.
 .
 To manually restart the web server, use one of the following commands:
 \"/etc/init.d/apache2 restart\" or \"/etc/init.d/lighttpd restart\"
";
$elem["ampache/restart_webserver"]["descriptionde"]="Webserver konfigurieren und neu starten?
 Der Webserver muss konfiguriert und neu gestartet werden, um Ampache zu aktivieren. Bitte wählen Sie aus, ob Sie ihn jetzt automatisch neu starten lassen wollen oder es selbst später durchführen möchten.
 .
 Um den Webserver manuell neu zu starten, verwenden Sie einen der folgenden Befehle: »/etc/init.d/apache2 restart« oder »/etc/init.d/lighttpd restart«.
";
$elem["ampache/restart_webserver"]["descriptionfr"]="Configurer et redémarrer le serveur web ?
 Le serveur web doit être reconfiguré et redémarré pour prendre en compte Ampache. Veuillez indiquer s'il doit être redémarré automatiquement maintenant ou s'il sera redémarré manuellement ultérieurement.
 .
 Pour redémarrer manuellement le serveur web, employer l'une des deux commandes suivantes : « /etc/init.d/apache2 reload » ou « /etc/init.d/lighttpd restart ».
";
$elem["ampache/restart_webserver"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
