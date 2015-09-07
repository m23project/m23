<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ampache");

$elem["ampache/webserver_type"]["type"]="multiselect";
$elem["ampache/webserver_type"]["choices"][1]="apache2";
$elem["ampache/webserver_type"]["choicesde"][1]="Apache2";
$elem["ampache/webserver_type"]["choicesfr"][1]="apache2";
$elem["ampache/webserver_type"]["description"]="Web server to configure automatically:
 Please select the web server to be configured automatically for Ampache.
 .
 Apache2 and Lighttpd are the only supported web servers for automatic
 configuration.
";
$elem["ampache/webserver_type"]["descriptionde"]="Webserver, der automatisch konfiguriert werden soll:
 Bitte wï¿œhlen Sie den Webserver, der fï¿œr Ampache automatisch konfiguriert werden soll.
 .
 Apache2 und Lighttpd sind die einzigen fï¿œr automatische Konfiguration unterstï¿œtzten Webserver.
";
$elem["ampache/webserver_type"]["descriptionfr"]="Serveur web à configurer automatiquement :
 Sélectionner le serveur web à configurer automatiquement pour Ampache.
 .
 Apache2 et Lighttpd sont les seuls serveurs web disposant d'une configuration automatique.
";
$elem["ampache/webserver_type"]["default"]="apache2";
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
 Der Webserver muss rekonfiguriert und neu gestartet werden, um Ampache zu aktivieren. Bitte wï¿œhlen Sie aus, ob Sie ihn jetzt automatisch neu starten lassen wollen oder es selbst spï¿œter durchfï¿œhren mï¿œchten.
 .
 Um den Webserver manuell neu zu starten, verwenden Sie einer der folgenden Befehle: ï¿œ/etc/init.d/apache2 restartï¿œ oder ï¿œ/etc/init.d/lighttpd restartï¿œ
";
$elem["ampache/restart_webserver"]["descriptionfr"]="Configurer et redémarrer le serveur web ?
 Le serveur web doit être reconfiguré et redémarré pour prendre en compte Ampache. Veuillez indiquer s'il doit être redémarré automatiquement maintenant ou s'il sera redémarré manuellement ultérieurement.
 .
 Pour redémarrer manuellement le serveur web, employer l'une des deux commandes suivantes : « /etc/init.d/apache2 reload » ou « /etc/init.d/lighttpd restart ».
";
$elem["ampache/restart_webserver"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
