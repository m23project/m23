<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wide-dhcpv6-server");

$elem["wide-dhcpv6-server/config_warn"]["type"]="note";
$elem["wide-dhcpv6-server/config_warn"]["description"]="WIDE DHCPv6 server configuration
 The DHCPv6 server requires manual configuration after installation.
 .
 After the DHCPv6 server is installed it has to be manually configured
 by editing the file /etc/wide-dhcpv6/dhcp6s.conf. A sample dhcp6s.conf is
 available at /usr/share/doc/wide-dhcpv6-server/examples.
 .
 Please configure the DHCPv6 server as soon as the installation finishes.
";
$elem["wide-dhcpv6-server/config_warn"]["descriptionde"]="WIDE DHCPv6 Server-Konfiguration
 Der DHCPv6-Server benötigt nach der Installation eine manuelle Konfiguration.
 .
 Nachdem der DHCPv6-Server installiert wurde muss er manuell durch Bearbeiten der Datei /etc/wide-dhcpv6/dhcp6s.conf konfiguriert werden. Ein Beispiel für die dhcp6s.conf ist unter /usr/share/doc/wide-dhcpv6-server/examples verfügbar.
 .
 Bitte konfigurieren Sie den DHCPv6-Server sobald die Installation abgeschlossen ist.
";
$elem["wide-dhcpv6-server/config_warn"]["descriptionfr"]="Configuration du serveur DHCPv6 WIDE
 Le serveur DHCPv6 nécessite une configuration manuelle après installation.
 .
 Après l'installation du serveur DHCPv6, vous devrez le configurer vous-même en modifiant /etc/wide-dhcpv6/dhcp6s.conf. Un fichier d'exemple est disponible dans le répertoire /usr/share/doc/wide-dhcpv6-server/examples.
 .
 Veuillez configurer le serveur DHCPv6 dès que l'installation est terminée.
";
$elem["wide-dhcpv6-server/config_warn"]["default"]="";
$elem["wide-dhcpv6-server/interfaces"]["type"]="string";
$elem["wide-dhcpv6-server/interfaces"]["description"]="Interfaces on which the DHCPv6 server listens to requests:
 Network interfaces on which the DHCPv6 server listens to requests should be
 specified here. Multiple interfaces are separated with spaces. An empty
 line temporarily disables dhcp6s.
";
$elem["wide-dhcpv6-server/interfaces"]["descriptionde"]="Schnittstellen, auf denen der DHCPv6-Server auf Anfragen wartet:
 Netzschnittstellen, auf denen der DHCPv6-Server auf Anfragen wartet sollten hier angegeben werden. Mehrere Schnittstellen werden durch Leerzeichen getrennt. Eine leere Zeile deaktiviert dhcp6s temporär.
";
$elem["wide-dhcpv6-server/interfaces"]["descriptionfr"]="Interfaces sur lesquelles le serveur DHCPv6 écoute les requêtes :
 Veuillez indiquer les interfaces réseau sur lesquelles le serveur DHCPv6 écoutera les requêtes. Lorsque plusieurs interfaces sont indiquées, elles doivent être séparées par des espaces. Une ligne vide désactive temporairement dhcp6s.
";
$elem["wide-dhcpv6-server/interfaces"]["default"]="eth0";
PKG_OptionPageTail2($elem);
?>
