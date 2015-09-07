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
$elem["miniupnpd/listen"]["description"]="LAN IP address to listen on for UPnP queries:
 The MiniUPnP daemon will listen for requests on the local network. Please
 enter the IP address it should listen on.
";
$elem["miniupnpd/listen"]["descriptionde"]="LAN-IP-Adresse, an der auf UPnP-Anfragen gewartet werden soll:
 Der MiniUPnP-Daemon wird auf Anfragen aus dem lokalen Netzwerk warten. Bitte geben Sie die IP-Adresse an, auf der er Anfragen annehmen soll.
";
$elem["miniupnpd/listen"]["descriptionfr"]="Adresse IP à écouter pour les requêtes UPnP :
 Le démon MiniUPnp sera à l'écoute de requêtes sur le réseau local. Veuillez indiquer l'adresse IP sur laquelle il écoutera.
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
";
$elem["miniupnpd/ip6script"]["descriptionde"]="IPv6-Firewall-Regelkette aktivieren?
 Bitte geben Sie an, ob der MiniUPnP-Daemon beim Starten sein Skript »ip6tables« ausführen soll, um die IPv6-Firewall-Regelkette zu aktivieren.
";
$elem["miniupnpd/ip6script"]["descriptionfr"]="Faut-il activer la chaîne de pare-feu IPv6 ?
 Veuillez indiquer si le démon MiniUPnP doit exécuter ses scripts ip6tables au démarrage pour initialiser la chaîne de pare-feu IPv6.
";
$elem["miniupnpd/ip6script"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
