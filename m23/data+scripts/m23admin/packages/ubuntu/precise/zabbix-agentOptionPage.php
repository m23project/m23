<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zabbix-agent");

$elem["zabbix-agent/server"]["type"]="string";
$elem["zabbix-agent/server"]["description"]="Zabbix server host address:
 Please enter the host name or IP address of the Zabbix server you
 want to connect to.
";
$elem["zabbix-agent/server"]["descriptionde"]="Host-Adresse des Zabbix-Server:
 Bitte geben Sie den Hostnamen oder die IP-Adresse des Zabbix-Servers an, zu dem Sie sich verbinden wollen.
";
$elem["zabbix-agent/server"]["descriptionfr"]="Adresse du serveur Zabbix :
 Veuillez indiquer le nom ou l'adresse du serveur Zabbix à utiliser.
";
$elem["zabbix-agent/server"]["default"]="";
PKG_OptionPageTail2($elem);
?>
