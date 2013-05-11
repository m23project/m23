<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dibbler-server");

$elem["dibbler-server/title"]["type"]="title";
$elem["dibbler-server/title"]["description"]="dibbler-server: DHCPv6 server
";
$elem["dibbler-server/title"]["descriptionde"]="DHCPv6-Server
";
$elem["dibbler-server/title"]["descriptionfr"]="serveur DHCPv6
";
$elem["dibbler-server/title"]["default"]="";
$elem["dibbler-server/start"]["type"]="boolean";
$elem["dibbler-server/start"]["description"]="Should the Dibbler server be launched when the system starts?
 The Dibbler server can be configured to be launched when the system
 is started. If you choose this option, this node will act as a
 DHCPv6 server. It will provide IPv6 addresses and additional
 configuration options to other nodes in the network.
";
$elem["dibbler-server/start"]["descriptionde"]="Soll beim Systemstart auch Dibbler-Server starten?
 Der Dibbler-Server kann so konfiguriert werden, dass er beim Systemstart auch startet. Falls Sie diese Option wählen, wird dieser Knoten dann als DHCPv6-Server agieren. Er wird IPv6-Adressen und zusätzliche Konfigurationsoptionen für andere Knoten im Netz bereitstellen.
";
$elem["dibbler-server/start"]["descriptionfr"]="Faut-il lancer automatiquement le serveur Dibbler au démarrage du système ?
 Le serveur Dibbler peut être configuré pour être lancé automatiquement au démarrage du système. Si vous choisissez cette option, ce nœud servira alors de serveur DHCPv6. Il fournira des adresses IPv6 et des options supplémentaires de configuration aux autres nœuds du réseau.
";
$elem["dibbler-server/start"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
