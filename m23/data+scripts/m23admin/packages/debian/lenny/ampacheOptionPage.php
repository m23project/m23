<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ampache");

$elem["ampache/configure-webserver"]["type"]="boolean";
$elem["ampache/configure-webserver"]["description"]="Configure Apache 2 web server for use with Ampache?
";
$elem["ampache/configure-webserver"]["descriptionde"]="Konfiguriere Apache 2 Webserver für die Verwendung mit Ampache?
";
$elem["ampache/configure-webserver"]["descriptionfr"]="Faut-il configurer le serveur web Apache 2 pour utiliser Ampache ?
";
$elem["ampache/configure-webserver"]["default"]="true";
$elem["ampache/restart-webserver"]["type"]="boolean";
$elem["ampache/restart-webserver"]["description"]="Restart Apache 2 web server?
 The Apache 2 web server needs to be restarted to enable Ampache. Please
 choose whether you want to restart it automatically now or do it yourself
 later.
";
$elem["ampache/restart-webserver"]["descriptionde"]="Webserver Apache 2 neu starten?
 Der Apache 2 Webserver muss neu gestartet werden, um Ampache zu aktivieren. Bitte wählen Sie aus, ob Sie ihn jetzt automatisch neu starten lassen wollen oder es selbst später durchführen möchten.
";
$elem["ampache/restart-webserver"]["descriptionfr"]="Faut-il redémarrer le serveur web Apache 2 ?
 Le serveur web Apache 2 doit être redémarré pour prendre en compte Ampache. Veuillez choisir s'il doit être redémarré maintenant. Dans le cas contraire, vous devrez le relancer vous-même plus tard.
";
$elem["ampache/restart-webserver"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
