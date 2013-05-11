<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zabbix-agent");

$elem["zabbix-agent/server"]["type"]="string";
$elem["zabbix-agent/server"]["description"]="Zabbix server host address:
 Please enter the host name or the address of the Zabbix server you 
 want to connect to.
";
$elem["zabbix-agent/server"]["descriptionde"]="Zabbix-Server Host-Adresse:
 Bitte geben Sie den Hostnamen oder die Adresse des Zabbix-Servers an, zu dem Sie sich verbinden wollen.
";
$elem["zabbix-agent/server"]["descriptionfr"]="Adresse du serveur Zabbix :
 Veuillez entrer le nom ou l'adresse du serveur Zabbix que vous désirez utiliser.
";
$elem["zabbix-agent/server"]["default"]="";
PKG_OptionPageTail2($elem);
?>
