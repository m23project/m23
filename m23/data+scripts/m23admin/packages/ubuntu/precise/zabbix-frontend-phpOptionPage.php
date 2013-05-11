<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zabbix-frontend-php");

$elem["zabbix-frontend-php/configure-apache"]["type"]="boolean";
$elem["zabbix-frontend-php/configure-apache"]["description"]="Configure Apache?
 The Zabbix web frontend runs on any web server that supportes PHP5.
 However only Apache (2.x) can be configured automatically at this point.
 .
 Please choose whether you want to reconfigure Apache so that the Zabbix web
 frontend is made available at the URL http://.../zabbix
";
$elem["zabbix-frontend-php/configure-apache"]["descriptionde"]="Apache konfigurieren?
 Zabbix unterstützt jeden Webserver, der auch von PHP5 unterstützt wird, allerdings kann nur Apache automatisch konfiguriert werden.
 .
 Bitte wählen Sie aus, ob den Apache so konfigurieren möchten, dass das Zabbix Web-Frontend unter der URL http://.../zabbix erreichbar ist.
";
$elem["zabbix-frontend-php/configure-apache"]["descriptionfr"]="Faut-il configurer Apache ?
 L'interface web de Zabbix fonctionne avec tout serveur web géré par PHP5. Cependant, seul Apache (version 2.x) peut être configuré automatiquement.
 .
 Veuillez indiquer si vous souhaitez reconfigurer Apache afin que l'interface web de Zabbix soit disponible à l'adresse http://.../zabbix.
";
$elem["zabbix-frontend-php/configure-apache"]["default"]="true";
$elem["zabbix-frontend-php/restart-webserver"]["type"]="boolean";
$elem["zabbix-frontend-php/restart-webserver"]["description"]="Restart Apache now?
 In order to apply the changes needed for Zabbix configuration, the
 web server needs to be restarted.
 .
 Please choose whether you prefer doing it automatically now
 or manually later.
";
$elem["zabbix-frontend-php/restart-webserver"]["descriptionde"]="Apache neu starten?
 Damit die Änderungen an der Konfiguration von Zabbix aktiviert werden, muss der Webserver neu gestartet werden.
 .
 Bitte wählen Sie aus, ob dies jetzt automatisch erfolgen soll oder später manuell.
";
$elem["zabbix-frontend-php/restart-webserver"]["descriptionfr"]="Faut-il redémarrer Apache maintenant ?
 Les changements ne seront pris en compte qu'après le redémarrage du serveur web.
 .
 Veuillez choisir si vous souhaitez le redémarrer automatiquement maintenant ou le faire vous-même plus tard.
";
$elem["zabbix-frontend-php/restart-webserver"]["default"]="true";
$elem["zabbix-frontend-php/zabbix-server"]["type"]="string";
$elem["zabbix-frontend-php/zabbix-server"]["description"]="Zabbix server host address:
 Please enter the host name or IP address of the Zabbix server you
 want to connect to.
 .
 This is needed for some advanced frontend functionalities.
";
$elem["zabbix-frontend-php/zabbix-server"]["descriptionde"]="Host-Adresse des Zabbix-Server:
 Bitte geben Sie den Hostnamen oder die IP-Adresse des Zabbix-Servers an, zu dem Sie sich verbinden wollen.
 .
 Dieser wird für bestimmte Funktionen der fortgeschrittenen Oberfläche benötigt..
";
$elem["zabbix-frontend-php/zabbix-server"]["descriptionfr"]="Adresse du serveur Zabbix :
 Veuillez indiquer le nom ou l'adresse du serveur Zabbix à utiliser.
 .
 Cela est requis pour certaines fonctionnalités avancées du frontal.
";
$elem["zabbix-frontend-php/zabbix-server"]["default"]="127.0.0.1";
$elem["zabbix-frontend-php/zabbix-server-port"]["type"]="string";
$elem["zabbix-frontend-php/zabbix-server-port"]["description"]="Zabbix server port:
 Please enter the port used by the Zabbix server.
 .
 This is needed for some advanced frontend functionalities.
";
$elem["zabbix-frontend-php/zabbix-server-port"]["descriptionde"]="Port des Zabbix-Servers:
 Bitte geben Sie den Port Ihres Zabbix-Servers an.
 .
 Dieser wird für bestimmte Funktionen der fortgeschrittenen Oberfläche benötigt..
";
$elem["zabbix-frontend-php/zabbix-server-port"]["descriptionfr"]="Port du serveur Zabbix :
 Veuillez indiquer le port utilisé par le serveur Zabbix.
 .
 Cela est requis pour certaines fonctionnalités avancées du frontal.
";
$elem["zabbix-frontend-php/zabbix-server-port"]["default"]="10051";
PKG_OptionPageTail2($elem);
?>
