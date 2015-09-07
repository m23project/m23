<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wide-dhcpv6-relay");

$elem["wide-dhcpv6-relay/interfaces"]["type"]="string";
$elem["wide-dhcpv6-relay/interfaces"]["description"]="Interfaces on which the DHCPv6 relay operates:
 Network interfaces on which the DHCPv6 relay handles requests should be
 specified here. Multiple interfaces are separated with spaces. An empty
 line temporarily disables dhcp6relay.
";
$elem["wide-dhcpv6-relay/interfaces"]["descriptionde"]="Schnittstellen, auf denen der DHCPv6-Relay arbeitet:
 Netzschnittstellen, auf denen der DHCPv6-Relay Anfragen bearbeitet sollten hier angegeben werden. Mehrere Schnittstellen werden durch Leerzeichen getrennt. Eine leere Zeile deaktiviert dhcp6relay temporär.
";
$elem["wide-dhcpv6-relay/interfaces"]["descriptionfr"]="Interfaces sur lesquelles le relais DHCPv6 est actif :
 Veuillez indiquer les interfaces réseau sur lesquelles le relais DHCPv6 traitera les requêtes. Lorsque plusieurs interfaces sont indiquées, elles doivent être séparées par des espaces. Une ligne vide désactive temporairement dhcp6relay.
";
$elem["wide-dhcpv6-relay/interfaces"]["default"]="eth0";
PKG_OptionPageTail2($elem);
?>
