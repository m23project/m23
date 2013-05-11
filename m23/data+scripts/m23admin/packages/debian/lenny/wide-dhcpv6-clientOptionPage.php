<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wide-dhcpv6-client");

$elem["wide-dhcpv6-client/config_warn"]["type"]="note";
$elem["wide-dhcpv6-client/config_warn"]["description"]="WIDE DHCPv6 client configuration
 The DHCPv6 client requires manual configuration after installation.
 .
 After the DHCPv6 client is installed it has to be manually configured
 by editing the file /etc/wide-dhcpv6/dhcp6c.conf. A sample dhcp6c.conf is
 available at /usr/share/doc/wide-dhcpv6-client/examples.
 .
 Please configure the DHCPv6 client as soon as the installation finishes.
";
$elem["wide-dhcpv6-client/config_warn"]["descriptionde"]="WIDE DHCPv6 Client-Konfiguration
 Der DHCPv6-Client benötigt nach der Installation eine manuelle Konfiguration.
 .
 Nachdem der DHCPv6-Client installiert wurde muss er manuell durch Bearbeiten der Datei /etc/wide-dhcpv6/dhcp6c.conf konfiguriert werden. Ein Beispiel für die dhcp6c.conf ist unter /usr/share/doc/wide-dhcpv6-client/examples verfügbar.
 .
 Bitte konfigurieren Sie den DHCPv6-Client sobald die Installation abgeschlossen ist.
";
$elem["wide-dhcpv6-client/config_warn"]["descriptionfr"]="Configuration du client DHCPv6 WIDE
 Le client DHCPv6 nécessite une configuration manuelle après installation.
 .
 Après l'installation du client DHCPv6, vous devrez le configurer vous-même en modifiant /etc/wide-dhcpv6/dhcp6c.conf. Un fichier d'exemple est disponible dans le répertoire /usr/share/doc/wide-dhcpv6-client/examples.
 .
 Veuillez configurer le client DHCPv6 dès que l'installation est terminée.
";
$elem["wide-dhcpv6-client/config_warn"]["default"]="";
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
