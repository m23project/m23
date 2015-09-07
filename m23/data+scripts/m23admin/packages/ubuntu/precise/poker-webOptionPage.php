<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("poker-web");

$elem["poker-web/reconfigure-webserver"]["type"]="multiselect";
$elem["poker-web/reconfigure-webserver"]["choices"][1]="apache";
$elem["poker-web/reconfigure-webserver"]["choices"][2]="apache-ssl";
$elem["poker-web/reconfigure-webserver"]["choices"][3]="apache-perl";
$elem["poker-web/reconfigure-webserver"]["description"]="Web server(s) to reconfigure automatically:
 poker-web supports any web server that PHP does, but this automatic
 configuration process only supports Apache.
";
$elem["poker-web/reconfigure-webserver"]["descriptionde"]="Automatisch zu rekonfigurierende(n) Webserver:
 Poker-Web unterstützt jeden von PHP unterstützen Webserver, aber dieser automatische Konfigurationsprozess unterstützt nur Apache.
";
$elem["poker-web/reconfigure-webserver"]["descriptionfr"]="Serveur(s) web à reconfigurer automatiquement :
 Poker-web peut gérer les mêmes serveurs web que PHP, mais la configuration automatique n'est possible qu'avec Apache.
";
$elem["poker-web/reconfigure-webserver"]["default"]="";
$elem["poker-web/restart-webserver"]["type"]="boolean";
$elem["poker-web/restart-webserver"]["description"]="Restart ${webserver} now?
 Remember that in order to activate the new configuration
 ${webserver} has to be restarted. You can also restart ${webserver}
 manually executing /etc/init.d/${webserver} restart
";
$elem["poker-web/restart-webserver"]["descriptionde"]="${webserver} jetzt neustarten?
 Denken Sie daran, dass für die Aktivierung der neuen Konfiguration ${webserver} neu gestartet werden muss. Sie können ${webserver} auch manuell mittels »/etc/init.d/${webserver} restart« neu starten.
";
$elem["poker-web/restart-webserver"]["descriptionfr"]="Faut-il redémarrer ${webserver} maintenant ?
 Pour activer la nouvelle configuration, ${webserver} doit être redémarré. Vous pouvez aussi redémarrer ${webserver} en utilisant la commande « /etc/init.d/${webserver} restart ».
";
$elem["poker-web/restart-webserver"]["default"]="false";
$elem["poker-web/host"]["type"]="string";
$elem["poker-web/host"]["description"]="Hostname or IP address of the poker-network server:
 The poker-network server for which poker-web provides a web
 based interface. It will be queried via its SOAP interface.
";
$elem["poker-web/host"]["descriptionde"]="Hostname oder IP-Adresse des Poker-Network-Servers:
 Der Poker-Network-Server, für den Poker-Web die webbasierte Schnittstelle bereitstellt. Es wird mittels seiner SOAP-Schnittstelle abgefragt.
";
$elem["poker-web/host"]["descriptionfr"]="Nom d'hôte ou adresse IP du serveur poker-network :
 Veuillez indiquer le serveur poker-network pour lequel poker-web fournira une interface web. Il sera interrogé via son interface SOAP.
";
$elem["poker-web/host"]["default"]="localhost";
PKG_OptionPageTail2($elem);
?>
