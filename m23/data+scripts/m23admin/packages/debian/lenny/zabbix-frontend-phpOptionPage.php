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
$elem["zabbix-frontend-php/reconfigure-webserver"]["choicesde"][1]="Apache";
$elem["zabbix-frontend-php/reconfigure-webserver"]["choicesde"][2]="Apache-ssl";
$elem["zabbix-frontend-php/reconfigure-webserver"]["choicesde"][3]="Apache-perl";
$elem["zabbix-frontend-php/reconfigure-webserver"]["choicesfr"][1]="apache";
$elem["zabbix-frontend-php/reconfigure-webserver"]["choicesfr"][2]="apache-ssl";
$elem["zabbix-frontend-php/reconfigure-webserver"]["choicesfr"][3]="apache-perl";
$elem["zabbix-frontend-php/reconfigure-webserver"]["description"]="Webserver Reconfiguration:
 Zabbix supports any web server that php4 does, but this automatic
 configuration process only supports Apache. Please select which 
 apache version you want to configure the Zabbix frontend for.
";
$elem["zabbix-frontend-php/reconfigure-webserver"]["descriptionde"]="Webserver-Rekonfiguration:
 Zabbix unterstützt jeden Webserver, den auch Php4 unterstützt, aber dieser automatische Konfigurationsprozess unterstützt nur Apache. Bitte wählen Sie aus, für welche Apache-Version Sie die Zabbix-Oberfläche konfigurieren wollen.
";
$elem["zabbix-frontend-php/reconfigure-webserver"]["descriptionfr"]="Serveur(s) web à reconfigurer :
 Zabbix gère les mêmes serveurs Web que php4, mais ce processus de configuration automatique ne fonctionne qu'avec Apache. Veuillez sélectionner la version d'Apache pour laquelle vous désirez configurer le frontal de Zabbix.
";
$elem["zabbix-frontend-php/reconfigure-webserver"]["default"]="apache, apache-ssl, apache-perl, apache2";
$elem["zabbix-frontend-php/restart-webserver"]["type"]="boolean";
$elem["zabbix-frontend-php/restart-webserver"]["description"]="Would you like to restart your webserver(s) now?
 Remember that in order to apply the changes your webserver(s) has/have to
 be restarted. 
";
$elem["zabbix-frontend-php/restart-webserver"]["descriptionde"]="Möchten Sie Ihre(n) Webserver jetzt neu starten?
 Denken Sie daran, dass Ihr(e) Webserver neu gestartet werden müssen, damit die Änderungen angewandt werden.
";
$elem["zabbix-frontend-php/restart-webserver"]["descriptionfr"]="Faut-il redémarrer le(s) serveur(s) web ?
 Les changements ne seront pris en compte qu'après le redémarrage des serveurs.
";
$elem["zabbix-frontend-php/restart-webserver"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
