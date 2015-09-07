<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("isc-dhcp-server");

$elem["isc-dhcp-server/config_warn"]["type"]="note";
$elem["isc-dhcp-server/config_warn"]["description"]="Manual configuration required after installation
 After the DHCP server is installed, you will need to manually configure it
 by editing the file /etc/dhcp/dhcpd.conf. Please note that the dhcpd.conf
 supplied is just a sample, and must be adapted to the network environment.
 .
 Please configure the DHCP server as soon as the installation finishes.
";
$elem["isc-dhcp-server/config_warn"]["descriptionde"]="Manuelle Einstellungen nach der Installation erforderlich
 Nachdem der DHCP-Server installiert wurde, müssen Sie ihn manuell durch Anpassen der Datei /etc/dhcp/dhcpd.conf einrichten. Bitte beachten Sie, dass die mitgelieferte Datei dhcpd.conf nur ein Beispiel ist und an die Netzwerkumgebung angepasst werden muss.
 .
 Bitte richten Sie den DHCP-Server sofort nach der Installation ein.
";
$elem["isc-dhcp-server/config_warn"]["descriptionfr"]="Configuration du serveur DHCP requise après l'installation
 Après l'installation du serveur DHCP, vous devrez le configurer vous-même en modifiant le fichier /etc/dhcp/dhcpd.conf. Veuillez noter qu'un exemple de fichier dhcpd.conf est fourni, mais que cette configuration est partielle et qu'elle doit être adaptée à votre environnement réseau.
 .
 Veuillez configurer le serveur DHCP dès la fin de l'installation.
";
$elem["isc-dhcp-server/config_warn"]["default"]="";
$elem["isc-dhcp-server/interfaces"]["type"]="string";
$elem["isc-dhcp-server/interfaces"]["description"]="Network interfaces on which the DHCP server should listen:
 Please specify on which network interface(s) the DHCP server should
 listen for DHCP requests. Multiple interface names should be entered
 as a space-separated list.
 .
 The interfaces will be automatically detected if this field is left
 blank.
";
$elem["isc-dhcp-server/interfaces"]["descriptionde"]="Netzwerkschnittstelle, an der der DHCP-Server auf Anfragen warten soll:
 Bitte geben Sie die Netzwerkschnittstelle(n) ein, an der bzw. denen der DHCP-Server auf DHCP-Anfragen lauschen soll. Mehrere Schnittstellennamen sollten in einer Liste, durch Leerzeichen getrennt, eingegeben werden.
 .
 Die Schnittstellen werden automatisch erkannt, falls hier nichts eingegeben wird.
";
$elem["isc-dhcp-server/interfaces"]["descriptionfr"]="Interfaces réseau où le serveur DHCP sera à l'écoute :
 Veuillez indiquer, séparés par des espaces, les noms des interfaces réseaux que le relais DHCP doit tenter de configurer. 
 .
 Les interfaces seront automatiquement détectées si ce champ est vide.
";
$elem["isc-dhcp-server/interfaces"]["default"]="";
PKG_OptionPageTail2($elem);
?>
