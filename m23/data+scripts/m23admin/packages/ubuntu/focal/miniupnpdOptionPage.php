<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("miniupnpd");

$elem["miniupnpd/start_daemon"]["type"]="boolean";
$elem["miniupnpd/start_daemon"]["description"]="Start the MiniUPnP daemon automatically?
 Choose this option if the MiniUPnP daemon should start automatically,
 now and at boot time.
";
$elem["miniupnpd/start_daemon"]["descriptionde"]="Den MiniUPnP-Daemon automatisch starten?
 Wählen Sie diese Option, falls der MiniUPnP-Daemon jetzt und beim Hochfahren des Rechners automatisch gestartet werden soll.
";
$elem["miniupnpd/start_daemon"]["descriptionfr"]="Faut-il démarrer le démon MiniUPnP automatiquement ?
 Choisissez cette option si vous voulez que le démon MiniUPnP démarre automatiquement, maintenant et à chaque démarrage du système.
";
$elem["miniupnpd/start_daemon"]["default"]="false";
$elem["miniupnpd/listen"]["type"]="string";
$elem["miniupnpd/listen"]["description"]="Interfaces to listen on for UPnP queries:
 The MiniUPnP daemon will listen for requests on the local network. Please
 enter the interfaces or IP addresses it should listen on, separated by
 space.
 .
 Interface names are preferred, and required if you plan to enable IPv6 port
 forwarding.
";
$elem["miniupnpd/listen"]["descriptionde"]="Schnittstellen, an denen auf UPnP-Anfragen gewartet werden soll:
 Der MiniUPnP-Daemon wird auf Anfragen aus dem lokalen Netzwerk warten. Bitte geben Sie, durch Leerzeichen getrennt, die Schnittstellen oder IP-Adressen an, auf denen er Anfragen annehmen soll.
 .
 Schnittstellennamen werden bevorzugt und sind erforderlich, falls Sie IPv6-Portweiterleitung aktivieren möchten.
";
$elem["miniupnpd/listen"]["descriptionfr"]="Interfaces à écouter pour les requêtes UPnP :
 Le démon MiniUPnP sera à l'écoute de requêtes sur le réseau local. Veuillez indiquer les interfaces ou les adresses IP, séparées par des espaces, sur lesquelles il écoutera.
 .
 Il est préférable d'indiquer le nom des interfaces. Cela est même requis si vous projetez d'activer la redirection de port IPv6.
";
$elem["miniupnpd/listen"]["default"]="";
$elem["miniupnpd/iface"]["type"]="string";
$elem["miniupnpd/iface"]["description"]="External WAN network interface to open ports on:
 The MiniUPnP daemon will listen on a specific IP address on the local
 network, then open ports on the WAN interface. Please enter the name of
 the WAN network interface on which the MiniUPnP daemon should perform
 port forwarding.
";
$elem["miniupnpd/iface"]["descriptionde"]="Externe WAN-Netzwerkschnittstelle, auf der Ports geöffnet werden sollen:
 Der MiniUPnP-Daemon wird auf Anfragen auf einer bestimmten IP-Adresse im lokalen Netzwerk warten und dann Ports auf der WAN-Schnittstelle öffnen. Bitte geben Sie den Namen der WAN-Netzwerkschnittstelle an, auf die der MiniUPnP-Daemon Port-Weiterleitung durchführen soll.
";
$elem["miniupnpd/iface"]["descriptionfr"]="Interface réseau WAN sur laquelle il faut ouvrir des ports :
 Le démon MiniUPnP écoutera sur une adresse IP spécifique du réseau local, puis ouvrira certains ports sur l'interface WAN. Veuillez indiquer le nom de l'interface de réseau WAN sur laquelle le démon MiniUPnP mettra en place des redirections de ports.
";
$elem["miniupnpd/iface"]["default"]="";
$elem["miniupnpd/ip6script"]["type"]="boolean";
$elem["miniupnpd/ip6script"]["description"]="Enable IPv6 firewall chain?
 Please specify whether the MiniUPnP daemon should run its
 ip6tables script on startup to initialize the IPv6 firewall chain.
 .
 Note: This option is useless if you don't block any IPv6 forwarded traffic.
";
$elem["miniupnpd/ip6script"]["descriptionde"]="IPv6-Firewall-Regelkette aktivieren?
 Bitte geben Sie an, ob der MiniUPnP-Daemon beim Starten sein Skript »ip6tables« ausführen soll, um die IPv6-Firewall-Regelkette zu initialisieren.
 .
 Hinweis: Diese Option ist nutzlos, falls Sie keinen weitergeleiteten IPv6-Verkehr blockieren.
";
$elem["miniupnpd/ip6script"]["descriptionfr"]="Faut-il activer la chaîne de pare-feu IPv6 ?
 Veuillez indiquer si le démon MiniUPnP doit exécuter ses scripts ip6tables au démarrage pour initialiser la chaîne de pare-feu IPv6.
 .
 Note : cette option est inutile si la redirection de trafic IPv6 n'est pas bloquée.
";
$elem["miniupnpd/ip6script"]["default"]="false";
$elem["miniupnpd/force_igd_desc_v1"]["type"]="boolean";
$elem["miniupnpd/force_igd_desc_v1"]["description"]="Force reporting IGDv1 in rootDesc?
 Some IGD clients (most notably Microsoft® Windows® BITS) look for IGDv1 and do
 not recognize IGDv2 as a valid IGD service. This option will fool them by
 pretending itself to be IGDv1.
 .
 Of course you will lose IGDv2 functions (notably IPv6 support) by enabling
 this.
";
$elem["miniupnpd/force_igd_desc_v1"]["descriptionde"]="Soll das Melden von IGDv1 in rootDesc erzwungen werden?
 Einige IGD-Clients (insbesondere Microsoft® Windows® BITS) suchen nach IGDv1 und erkennen IGDv2 nicht als gültigen IGD-Dienst. Diese Option wird sie austricksen, indem sie sich selbst als IGDv1 ausgibt.
 .
 Durch Aktivieren dieser Option, werden Sie natürlich IGDv2-Funktionen einbüßen (insbesondere IPv6-Unterstützung).
";
$elem["miniupnpd/force_igd_desc_v1"]["descriptionfr"]="Forcer la déclaration IGDv1 dans rootDesc ?
 Certains clients IGD (principalement Microsoft® Windows® BITS) recherchent des service IGDv1 et ne reconnaissent pas IGDv2 comme un service IGD valide. Cette option les trompera en se présentant comme un service IGDv1.
 .
 Bien évidement, les fonctions de IGDv2 (en particulier la prise en charge de IPv6) seront perdues en activant cette option.
";
$elem["miniupnpd/force_igd_desc_v1"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
