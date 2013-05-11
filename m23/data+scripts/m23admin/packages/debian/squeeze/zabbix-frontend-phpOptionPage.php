<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zabbix-frontend-php");

$elem["zabbix-frontend-php/reconfigure-webserver"]["type"]="multiselect";
$elem["zabbix-frontend-php/reconfigure-webserver"]["choices"][1]="apache";
$elem["zabbix-frontend-php/reconfigure-webserver"]["choices"][2]="apache-ssl";
$elem["zabbix-frontend-php/reconfigure-webserver"]["choices"][3]="apache-perl";
$elem["zabbix-frontend-php/reconfigure-webserver"]["description"]="Web server to reconfigure for Zabbix:
 Zabbix supports any web server supported by PHP5, however only
 Apache can be configured automatically. 
 .
 Please select which Apache version you want to configure the Zabbix
 frontend for.
";
$elem["zabbix-frontend-php/reconfigure-webserver"]["descriptionde"]="Webserver, der fÃŒr Zabbix neu konfiguriert werden soll:
 Zabbix unterstÃŒtzt jeden Webserver, der auch von PHP5 unterstÃŒtzt wird, allerdings kann nur Apache automatisch konfiguriert werden.
 .
 Bitte wÃ€hlen Sie die Version von Apache aus, fÃŒr die die Zabbix-OberflÃ€che konfiguriert werden soll.
";
$elem["zabbix-frontend-php/reconfigure-webserver"]["descriptionfr"]="Serveur(s) web ?? reconfigurer??pour Zabbix??:
 Zabbix g??re n'importe quel serveur web g??r?? par PHP5, cependant seul Apache sera configur?? automatiquement.
 .
 Veuillez choisir la version d'Apache ?? configurer pour le frontal Zabbix.
";
$elem["zabbix-frontend-php/reconfigure-webserver"]["default"]="apache, apache-ssl, apache-perl, apache2";
$elem["zabbix-frontend-php/restart-webserver"]["type"]="boolean";
$elem["zabbix-frontend-php/restart-webserver"]["description"]="Restart the web server(s) now?
 In order to apply the changes needed for Zabbix configuration, the
 web server needs to be restarted.
 .
 Please choose whether you prefer doing it automatically now
 or manually later.
";
$elem["zabbix-frontend-php/restart-webserver"]["descriptionde"]="Den/Die Webserver jetzt neu starten?
 Damit die Ãnderungen an der Konfiguration von Zabbix aktiviert werden, muÃ der Webserver neu gestartet werden.
 .
 Bitte wÃ€hlen Sie aus, ob dies jetzt automatisch erfolgen soll oder spÃ€ter manuell.
";
$elem["zabbix-frontend-php/restart-webserver"]["descriptionfr"]="Faut-il red??marrer le(s) serveur(s) web??maintenant???
 Les changements ne seront pris en compte qu'apr??s le red??marrage du serveur web.
 .
 Veuillez choisir si vous souhaitez le red??marrer automatiquement maintenant ou vous-m??me plus tard.
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
 Dieser wird fÃŒr bestimmte Funktionen der fortgeschrittenen OberflÃ€che benÃ¶tigt.
";
$elem["zabbix-frontend-php/zabbix-server"]["descriptionfr"]="Adresse du serveur Zabbix??:
 Veuillez entrer le nom ou l'adresse du serveur Zabbix auquel vous voulez vous connecter.
 .
 Cela est requis pour certaines fonctionnalit??s avanc??es du frontal.
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
 Dieser wird fÃŒr bestimmte Funktionen der fortgeschrittenen OberflÃ€che benÃ¶tigt.
";
$elem["zabbix-frontend-php/zabbix-server-port"]["descriptionfr"]="Port du serveur Zabbix??:
 Veuillez entrer le port utilis?? par le serveur Zabbix.
 .
 Cela est requis pour certaines fonctionnalit??s avanc??es du frontal.
";
$elem["zabbix-frontend-php/zabbix-server-port"]["default"]="10051";
PKG_OptionPageTail2($elem);
?>
