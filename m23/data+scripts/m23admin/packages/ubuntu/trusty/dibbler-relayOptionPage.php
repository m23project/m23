<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dibbler-relay");

$elem["dibbler-relay/title"]["type"]="title";
$elem["dibbler-relay/title"]["description"]="dibbler-relay: DHCPv6 relay
";
$elem["dibbler-relay/title"]["descriptionde"]="DHCPv6-Weiterleitung
";
$elem["dibbler-relay/title"]["descriptionfr"]="relais DHCPv6
";
$elem["dibbler-relay/title"]["default"]="";
$elem["dibbler-relay/start"]["type"]="boolean";
$elem["dibbler-relay/start"]["description"]="Should the Dibbler relay be launched when the system starts?
 The Dibbler relay can be configured to be launched when the system is
 started. If you choose this option, this node will forward
 DHCPv6 messages between clients, servers and other relays.
";
$elem["dibbler-relay/start"]["descriptionde"]="Soll beim Systemstart auch Dibbler-Relay starten?
 Der Dibbler-Relay kann so konfiguriert werden, dass es beim Systemstart auch startet. Falls Sie diese Option wählen, wird dieser Knoten wird DHCPv6-Nachrichten zwischen Clients, Servern und anderen Relays (Weiterleitern) weitergeben.
";
$elem["dibbler-relay/start"]["descriptionfr"]="Faut-il lancer automatiquement le relais Dibbler au démarrage du système ?
 Le relais Dibbler peut être configuré pour être lancé automatiquement au démarrage du système. Si vous choisissez cette option, ce nœud transmettra alors les messages DHCPv6 entre les clients, les serveurs et les autres relais.
";
$elem["dibbler-relay/start"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
