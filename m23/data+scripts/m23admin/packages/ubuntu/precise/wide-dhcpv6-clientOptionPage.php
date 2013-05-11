<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wide-dhcpv6-client");

$elem["wide-dhcpv6-client/interfaces"]["type"]="string";
$elem["wide-dhcpv6-client/interfaces"]["description"]="Interfaces on which the DHCPv6 client sends requests:
 Network interfaces on which the DHCPv6 client sends requests should be
 specified here. Multiple interfaces are separated with spaces. An empty
 line temporarily disables dhcp6c.
";
$elem["wide-dhcpv6-client/interfaces"]["descriptionde"]="Schnittstellen, auf denen der DHCPv6-Client Anfragen versendet:
 Netzschnittstellen, auf denen der DHCPv6-Client Anfragen sendet sollten hier angegeben werden. Mehrere Schnittstellen werden durch Leerzeichen getrennt. Eine leere Zeile deaktiviert dhcp6c temporär.
";
$elem["wide-dhcpv6-client/interfaces"]["descriptionfr"]="Interfaces sur lesquelles le client DHCPv6 envoie ses requêtes :
 Veuillez indiquer les interfaces réseau sur lesquelles le client DHCPv6 enverra les requêtes. Lorsque plusieurs interfaces sont indiquées, elles doivent être séparées par des espaces. Une ligne vide désactive temporairement dhcp6c.
";
$elem["wide-dhcpv6-client/interfaces"]["default"]="eth0";
PKG_OptionPageTail2($elem);
?>
