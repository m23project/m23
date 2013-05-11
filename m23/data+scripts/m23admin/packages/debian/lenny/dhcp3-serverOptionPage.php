<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dhcp3-server");

$elem["dhcp3-server/config_warn"]["type"]="note";
$elem["dhcp3-server/config_warn"]["description"]="Manual configuration required after installation
 After the DHCP server is installed, you will need to manually configure it
 by editing the file /etc/dhcp3/dhcpd.conf. Please note that the dhcpd.conf
 supplied is just a sample, and must be adapted to the network environment.
 .
 Please configure the DHCP server as soon as the installation finishes.
";
$elem["dhcp3-server/config_warn"]["descriptionde"]="Manuelle Einstellungen nach der Installation erforderlich
 Nachdem der DHCP-Server installiert wurde, müssen Sie ihn manuell durch Anpassen der Datei /etc/dhcp3/dhcpd.conf einrichten. Bitte beachten Sie, dass die mitgelieferte Datei dhcpd.conf nur ein Beispiel ist und an die Netzwerkumgebung angepasst werden muss.
 .
 Bitte richten Sie den DHCP-Server sofort nach der Installation ein.
";
$elem["dhcp3-server/config_warn"]["descriptionfr"]="Configuration du serveur DHCP requise après l'installation
 Après l'installation du serveur DHCP, vous devrez le configurer vous-même en modifiant le fichier /etc/dhcp3/dhcpd.conf. Veuillez noter qu'un exemple de fichier dhcpd.conf est fourni, mais que cette configuration est partielle et qu'elle doit être adaptée à votre environnement réseau.
 .
 Veuillez configurer le serveur DHCP dès la fin de l'installation.
";
$elem["dhcp3-server/config_warn"]["default"]="";
$elem["dhcp3-server/interfaces"]["type"]="string";
$elem["dhcp3-server/interfaces"]["description"]="Network interfaces on which the DHCP server should listen:
 Please specify on which network interface(s) the DHCP server should
 listen for DHCP requests. Multiple interface names should be entered
 as a space-separated list.
 .
 The interfaces will be automatically detected if this field is left
 blank.
";
$elem["dhcp3-server/interfaces"]["descriptionde"]="Netzwerkschnittstelle, an der der DHCP-Server auf Anfragen warten soll:
 Bitte geben Sie die Netzwerkschnittstelle(n) ein, an der bzw. denen der DHCP-Server auf DHCP-Anfragen lauschen soll. Mehrere Schnittstellennamen sollten in einer Liste, durch Leerzeichen getrennt, eingegeben werden.
 .
 Die Schnittstellen werden automatisch erkannt, falls hier nichts eingegeben wird.
";
$elem["dhcp3-server/interfaces"]["descriptionfr"]="Interfaces réseau où le serveur DHCP sera à l'écoute :
 Veuillez indiquer, séparés par des espaces, les noms des interfaces réseaux que le relais DHCP doit tenter de configurer. 
 .
 Les interfaces seront automatiquement détectées si ce champ est vide.
";
$elem["dhcp3-server/interfaces"]["default"]="";
$elem["dhcp3-server/new_auth_behavior"]["type"]="note";
$elem["dhcp3-server/new_auth_behavior"]["description"]="Non-authoritative version of DHCP server
 The version 3 DHCP server is non-authoritative by default.
 .
 This means that if a client requests an address that the server knows
 nothing about and the address is incorrect for that network segment, the
 server will _not_ send a DHCPNAK (which tells the client it should stop
 using the address). If you want to change this behavior, you must
 explicitly state in dhcpd.conf what network segments your server is
 authoritative for using the 'authoritative' statement.
";
$elem["dhcp3-server/new_auth_behavior"]["descriptionde"]="Nichtautoritative Version eines DHCP-Servers
 Der DHCP-Server Version 3 ist standardmäßig nicht autoritativ.
 .
 Das bedeutet, falls ein Client eine Adresse anfordert, die der Server nicht kennt und die Adresse in diesem Netzwerksegment falsch ist, wird der Server _keine_ DHCPNAK-Meldung (die dem Client die Nutzung der Adresse untersagt) senden. Falls Sie das ändern wollen, müssen Sie in der Datei dhcpd.conf durch den Eintrag »authoritative« gezielt die Netzwerksegmente festlegen, für die Ihr Server verantwortlich ist.
";
$elem["dhcp3-server/new_auth_behavior"]["descriptionfr"]="Version non autoritative du serveur DHCP
 La version 3 du serveur DHCP ne fait maintenant plus autorité par défaut.
 .
 Cela signifie que si un client demande une adresse inconnue du serveur et que celle-ci est incorrecte pour le segment de réseau considéré, le serveur n'enverra pas de message DHCPNAK (pour demander au client de ne pas utiliser cette adresse). Si vous souhaitez modifier ce comportement, vous devez indiquer explicitement dans le fichier dhcpd.conf les segments de réseau pour lesquels votre serveur fait autorité en utilisant la mention « authoritative ».
";
$elem["dhcp3-server/new_auth_behavior"]["default"]="";
$elem["dhcp3-server/new_next-server_behaviour"]["type"]="note";
$elem["dhcp3-server/new_next-server_behaviour"]["description"]="Change in default behaviour of the next-server directive
 From version 3.0.3, the DHCP server's default value of the
 next-server directive has changed. If you are network booting clients, and
 your TFTP server is your DHCP server, you need to explicitly set a
 next-server directive to state this. Please see
 /usr/share/doc/dhcp3-server/NEWS.Debian.gz and
 /usr/share/doc/dhcp3-common/RELNOTES.gz for more information.
";
$elem["dhcp3-server/new_next-server_behaviour"]["descriptionde"]="Ändern der Standardeinstellung der Next-Server-Richtlinie
 Ab der Version 3.0.3 des DHCP-Servers wurde der Standardwert für die Next-Server-Richtlinie geändert. Falls Sie Clients haben, die über das Netzwerk booten und Ihr TFTP-Server der DHCP-Server ist, müssen Sie gezielt eine Next-Server-Richtlinie festlegen, die das berücksichtigt. Bitte lesen Sie dazu /usr/share/doc/dhcp3-server/NEWS.Debian.gz und /usr/share/doc/dhcp3-common/RELNOTES.gz.
";
$elem["dhcp3-server/new_next-server_behaviour"]["descriptionfr"]="Modification du comportement par défaut de la directive next-server
 Depuis la version 3.0.3, le serveur DHCP par défaut défini dans la directive next-server a changé. Si certains clients démarrent via le réseau, et que votre serveur de TFTP est identique à votre serveur DHCP, vous devez l'indiquer de manière explicite par une directive next-server. Veuillez consulter /usr/share/doc/dhcp3-server/NEWS.Debian.gz et /usr/share/doc/dhcp3-common/RELNOTES.gz pour plus d'informations.
";
$elem["dhcp3-server/new_next-server_behaviour"]["default"]="";
PKG_OptionPageTail2($elem);
?>
