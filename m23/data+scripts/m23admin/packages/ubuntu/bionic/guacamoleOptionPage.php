<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("guacamole");

$elem["guacamole-tomcat/restart-server"]["type"]="boolean";
$elem["guacamole-tomcat/restart-server"]["description"]="Restart Tomcat server?
 The installation of Guacamole under Tomcat requires restarting the Tomcat
 server, as Tomcat will only read configuration files on startup.
 .
 You can also restart Tomcat manually by running
 \"invoke-rc.d tomcat8 restart\" as root.
";
$elem["guacamole-tomcat/restart-server"]["descriptionde"]="Tomcat-Server neu starten?
 Die Installation von Guacamole unter Tomcat erfordert einen Neustart des Tomcat-Servers, da Tomcat Konfigurationsdateien nur beim Start lesen wird.
 .
 Sie können Tomcat auch manuell neu starten, indem Sie »invoke-rc.d tomcat8 restart« ausführen.
";
$elem["guacamole-tomcat/restart-server"]["descriptionfr"]="Faut-il relancer le serveur Tomcat ?
 L'installation de Guacamole avec Tomcat requiert le redémarrage du serveur Tomcat, car celui-ci ne lit les fichiers de configuration qu'au lancement.
 .
 Vous pouvez également relancer Tomcat vous-même en exécutant la commande « invoke-rc.d tomcat8 restart » avec les privilèges du superutilisateur.
";
$elem["guacamole-tomcat/restart-server"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
